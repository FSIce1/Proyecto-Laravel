<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['web']], function () {


    // ! PRACTICANDO
    
    route::get('inicio', 'Area\AreaController@index');

    
    // TODO: MARCAS
    route::resource('marca','Marca\MarcaController');
    route::get('listall','Marca\MarcaController@listall');
    

    // TODO: PRODUCTOS
    
    //route::get('Producto/listarProductos','Producto\ProductoController@listar');

    //? ->middleware('autorizacion); ---> DA PERMISOS DE ENTRADA
    route::resource('producto','Producto\ProductoController');
    Route::get('/producto/{id}/edit', 'Producto\ProductoController@edit')->name('EditarRegistro');
    Route::put('/producto/{id}', 'Producto\ProductoController@update')->name('producto.update');


    // TODO: PARA EL ADMIN

    
    Route::group(['prefix' => 'admin','middleware' => ['auth','admin']], function () {
        route::get('demo', ['as' => 'demo', 'uses' => 'DemoController@index']);
    });


    Route::get('prueba', function(){
        //$usuarios = Inicio\User::all();
        //return view('index',compact('usuarios'));
        return view('index');
    });

    Route::get('prueba1', function(){
        $usuarios = Inicio\User::all();
        return view('index_1',compact('usuarios'));
        //return view('index');
    });

    Route::resource('users', 'UserController');


    //! LO QUE PIDIERON

        // TODO: ÁREAS
        // ORDEN
        route::get('area/graficos','Area\AreaController@graficosArea');
        route::resource('area', 'Area\AreaController');
        

        route::get('area','Area\AreaController@listarAreaAJAX')->name('area.listar');
        
        
        //TODO: DOCUMENTOS
        // ORDEN
        route::get('documento/graficos','Documento\DocumentoController@graficosDocumento');
        route::resource('documento', 'Documento\DocumentoController');
        
        route::get('documento','Documento\DocumentoController@listarDocumentoAJAX')->name('documento.listar');
        

        

    //route::get('listall','Area\AreaController@listall');



    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');



});

