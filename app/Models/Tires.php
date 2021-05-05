<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Tires extends Model
{
    use HasFactory, Notifiable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tires';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'width',
        'profile',
        'diameter',
        'load_index',
        'speed_index',
        'quantity',
        'price',
        'parsed_valid',
        'manufacturer_id',
        'model_id'
    ];

    /**
     * Get tire manufacturer.
     */
    public function manufacturer()
    {
        return $this->belongsTo(TiresManufacturers::class, 'manufacturer_id', 'id');
    }

    /**
     * Get tire model.
     */
    public function tireModel()
    {
        return $this->belongsTo(TiresModels::class, 'model_id', 'id');
    }

}
