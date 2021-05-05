<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TiresController;
use App\Http\Controllers\TiresManufacturersController;
use App\Http\Controllers\TiresModelsController;
use App\Models\Tires;
use App\Models\TiresManufacturers;
use App\Models\TiresModels;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [TiresController::class, 'showAll'])->name('tires_index');


Route::prefix('tires')->group(function () {
    Route::get('/', [TiresController::class, 'showAll']);

    Route::post('/import', [TiresController::class, 'import'])->name('tires_import');

    Route::get('/create', function(){
        return view('tires.create', [
            'manufacturers' => TiresManufacturers::all(),
            'models' => TiresModels::all(),
        ]);
    })->name('create_tire');
    Route::post('/create_tire', [TiresController::class, 'create'])->name('create_tire_action');

    Route::get('/update/{id}', function($id){
       return view('tires.update', [
           'tire' => Tires::find($id),
           'manufacturers' => TiresManufacturers::all(),
           'models' => TiresModels::all(),
       ]);
    })->name('update_tire');
    Route::post('/update', [TiresController::class, 'update'])->name('update_tire_action');

    Route::get('/delete/{id}', function($id){
        Tires::find($id)->delete();
        return redirect('/');
    })->name('delete_tire');

});

Route::prefix('tires_manufacturers')->group(function () {

    Route::get('/', [TiresManufacturersController::class, 'showAll'])->name('manufacturer_index');

    Route::view('/create', 'manufacturers.create')->name('create_manufacturer');
    Route::post('/create_manufacturer', [TiresManufacturersController::class, 'create'])->name('create_manufacturer_action');

    Route::get('/update/{id}', function($id){
        return view('manufacturers.update', [
            'manufacturer' => TiresManufacturers::find($id)
        ]);
    })->name('update_manufacturer');
    Route::post('/update', [TiresManufacturersController::class, 'update'])->name('update_manufacturer_action');

    Route::get('/delete/{id}', function($id){
        TiresManufacturers::find($id)->delete();
        return redirect('/');
    })->name('delete_manufacturer');

});

Route::prefix('tires_models')->group(function () {

    Route::get('/', [TiresModelsController::class, 'showAll'])->name('model_index');

    Route::view('/create', 'tiresModels.create')->name('create_model');
    Route::post('/create_model', [TiresModelsController::class, 'create'])->name('create_model_action');

    Route::get('/update/{id}', function($id){
        return view('tiresModels.update', [
            'model' => TiresModels::find($id)
        ]);
    })->name('update_model');
    Route::post('/update', [TiresModelsController::class, 'update'])->name('update_model_action');

    Route::get('/delete/{id}', function($id){
        TiresModels::find($id)->delete();
        return redirect('/');
    })->name('delete_model');

});



