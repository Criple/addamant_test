<?php

namespace App\Imports;

use App\Models\Tires;
use App\Models\TiresManufacturers;
use App\Models\TiresModels;
use Maatwebsite\Excel\Concerns\ToModel;

class TiresImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if (preg_match("/А\/шина/i", $row[1])){
            preg_match("/[0-9]+/i", $row[2], $quantity);
            $importData = array(
                'name' => $row[1],
                'quantity' => (!is_null($quantity[0])) ? $quantity[0] : 0,
                'price' => $row[3],
            );
            if ($tire = Tires::firstWhere('name', $row[1])){
                $tire->update($importData);
                return $tire;
            }else{
                $tireParts = explode(' ', $row[1]);
                foreach ($tireParts as $k => $match){
                    switch ($k){
                        case 0:
                            unset($tireParts[$k]);
                            break;
                        case 1:
                            if (preg_match("/[0-9]+\/[0-9]+/i", $match)){
                                $widthProfile = explode('/', $match);
                                $importData['width'] = $widthProfile[0];
                                $importData['profile'] = $widthProfile[1];
                            }else{
                                $importData['width'] = $match;
                            }
                            unset($tireParts[$k]);
                            break;
                        case 2:
                            $importData['diameter'] = substr($match, 1);
                            unset($tireParts[$k]);
                            break;
                        case 3:
                            preg_match("/([0-9]+)([A-Z])/i", $match, $indexes);
                            if (count($indexes) > 2){
                                $importData['load_index'] = $indexes[1];
                                $importData['speed_index'] = $indexes[2];
                            }
                            unset($tireParts[$k]);
                            break;
                    }

                }
                if ($model = TiresModels::firstWhere('name', array_pop($tireParts))){
                    $importData['model_id'] = $model->id;
                }
                $manufacturer_name = implode(' ', $tireParts);
                if ($manufacturer = TiresManufacturers::firstWhere('name', $manufacturer_name)){
                    $importData['manufacturer_id'] = $manufacturer->id;
                }
                if (!isset($importData['width']) || !isset($importData['name']) || !isset($importData['diameter']) || !isset($importData['load_index']) || !isset($importData['speed_index']) || !isset($importData['quantity']) || !isset($importData['price'])|| !isset($importData['manufacturer_id'])|| !isset($importData['model_id'])){
                    $importData['parsed_valid'] = 0;
                }else{
                    $importData['parsed_valid'] = 1;
                }
                return Tires::create($importData);
            }
        }
        return null;
    }
}
