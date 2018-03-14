<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();


});

Route::namespace('Api')->group(function (){
       Route::get('/lists','ApiList@getAllList');
       Route::get('/lists/{id}','ApiList@getListById');
       Route::get('/lists/delete/{id}','ApiList@deleteList');
       Route::post('/lists/add','ApiList@addList');
       Route::post('/lists/item/add/{listId}','ApiList@addItem');
       Route::post('/lists/item/edit/{listId}/{itemId}','ApiList@editItem');
       Route::get('/lists/item/delete/{listId}/{itemId}','ApiList@deleteItem');

});





/*getAllList()  all list header and id*/
/*getListById($id)  list header and date and content*/
/*deleteItem($listId,$itemId)  void*/
/*editItem($listId,$itemId,content)  void*/
/*addItem($listId,content)  void*/
/*deleteList($listId)  void*/
/*addList($header,$date,$array)  void*/
