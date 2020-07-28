<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inicio\Models\Area\AreaModel;
use Yajra\DataTables\Facades\DataTables;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::get('users',function(){
    //$users = Inicio\User::all();
    
    /*
    return datatables()
    ->eloquent(Inicio\User::query())
    ->toJson();
    */

    return datatables()
    ->eloquent(Inicio\User::query())
    ->toJson();

});

Route::get('listall',function(){

    
    return datatables()
    ->eloquent(AreaModel::query())
    ->toJson();

    //return DataTables::eloquent(AreaModel::query())->make(true);

    //return AreaModel::select('tb_area.id_area','tb_area.nombre_area','tb_area.condicion_area')->toJson();

});


