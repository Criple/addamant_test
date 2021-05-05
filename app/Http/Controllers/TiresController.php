<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Imports\TiresImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Tires;
use App\Models\TiresManufacturers;
use App\Models\TiresModels;
use App\Http\Requests\StoreTireRequest;

class TiresController extends Controller
{
    /**
     * Show list of all Tires.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showAll()
    {
        $validTires = Tires::where('parsed_valid', 1)->orderBy('id')->get();
        $notValidTires = Tires::where('parsed_valid', 0)->orderBy('id')->get();
        $manufacturers = TiresManufacturers::all();
        $models = TiresModels::all();
        return view('tires.index', compact('validTires', 'notValidTires'));
    }

    /**
     * Create a tire.
     *
     * @param StoreTireRequest $request
     * @return RedirectResponse
     */
    public function create(StoreTireRequest $request){

        $validatedData = $request->validated();
        if ($validatedData['manufacturer_id'] == 0)
            $validatedData['manufacturer_id'] = null;
        if ($validatedData['model_id'] == 0)
            $validatedData['model_id'] = null;
        $tire = Tires::create($validatedData);
        return redirect('/');
    }

    /**
     * Update a tire.
     *
     * @param StoreTireRequest $request
     * @return RedirectResponse
     */
    public function update(StoreTireRequest $request){

        $validatedData = $request->validated();
        $tireId = $validatedData['tire_id'];
        unset($validatedData['tire_id']);
        if ($validatedData['manufacturer_id'] == 0)
            $validatedData['manufacturer_id'] = null;
        if ($validatedData['model_id'] == 0)
            $validatedData['model_id'] = null;
        Tires::where('id', $tireId)
            ->update($validatedData);
        return redirect('/');
    }

    /**
     * Import tires.
     *
     * @param Request $request
     * @return RedirectResponse
     */

    public function import(Request $request){
        if ($request->file('xlsx-file')->isValid()) {
            Excel::import(new TiresImport, $request->file('xlsx-file'));
        }
        //return redirect('/');
    }

}
