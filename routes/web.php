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


Route::get('/edit_menu/{id}',[
    'uses' => 'TesteController@EditMenu',
    'as'   => 'edit_menu'
]);

Route::get('/delete/{id}',[
    'uses' => 'TesteController@DeleteMenu',
    'as'   => 'delete'
]);

Route::post('/editar_menu',[
    'uses' => 'TesteController@EditarMenu',
    'as'   => 'editar_menu'
]);

Route::get('/add_item', [
    'uses' => 'PageController@getAddItem',
    'as' => 'add_item',
]);

Route::get('/manage_menu', [
    'uses' => 'PageController@getManageMenu',
    'as' => 'manage_menu',
]);

Route::get('/', [
    'uses' => 'PageController@getManageMenu',
    'as' => 'manage_menu',
]);

Route::post('/addmenu', [
    'uses' => 'PageController@AddMenuItem',
    'as' => 'addmenu'
]);


Route::post('/reorder', array('as' => 'reorder', 'uses' => 'TesteController@reorder'));

