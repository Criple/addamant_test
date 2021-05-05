<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use App\Models\TiresModels;
use App\Http\Requests\StoreTireModelsRequest;

class TiresModelsController extends Controller
{
    /**
     * Show list of all Tires.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showAll()
    {
        $models = TiresModels::all();
        return view('tiresModels.index', compact('models'));
    }

    /**
     * Create a tire.
     *
     * @param StoreTireModelsRequest $request
     * @return RedirectResponse
     */
    public function create(StoreTireModelsRequest $request){

        $validatedData = $request->validated();
        $model = TiresModels::create($validatedData);
        return redirect('/');
    }

    /**
     * Update a tire.
     *
     * @param StoreTireModelsRequest $request
     * @return RedirectResponse
     */
    public function update(StoreTireModelsRequest $request){

        $validatedData = $request->validated();
        $modelId = $validatedData['model_id'];
        unset($validatedData['model_id']);
        TiresModels::where('id', $modelId)
            ->update($validatedData);
        return redirect('/');
    }

}
