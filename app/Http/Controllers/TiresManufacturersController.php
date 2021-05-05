<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use App\Models\TiresManufacturers;
use App\Http\Requests\StoreTireManufacturersRequest;

class TiresManufacturersController extends Controller
{
    /**
     * Show list of all Tires.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showAll()
    {
        $manufacturers = TiresManufacturers::all();
        return view('manufacturers.index', compact('manufacturers'));
    }

    /**
     * Create a tire.
     *
     * @param StoreTireManufacturersRequest $request
     * @return RedirectResponse
     */
    public function create(StoreTireManufacturersRequest $request){

        $validatedData = $request->validated();
        $manufacturer = TiresManufacturers::create($validatedData);
        return redirect('/');
    }

    /**
     * Update a tire.
     *
     * @param StoreTireManufacturersRequest $request
     * @return RedirectResponse
     */
    public function update(StoreTireManufacturersRequest $request){

        $validatedData = $request->validated();
        $manufacturerId = $validatedData['manufacturer_id'];
        unset($validatedData['manufacturer_id']);
        TiresManufacturers::where('id', $manufacturerId)
            ->update($validatedData);
        return redirect('/');
    }

}
