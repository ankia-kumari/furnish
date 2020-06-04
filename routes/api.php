<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('admin')->name('api.admin.')->namespace('Admin\Api')->group(function (){
Route::post('app-config','AppConfigurationController@appConfigurationAdd')->name('app-config.add');
Route::post('app-config/edit/{id}','AppConfigurationController@appConfigurationEdit')->name('app-config.edit');
Route::get('app-config/delete/{id}','AppConfigurationController@appConfigurationDelete')->name('app-config.delete');
Route::post('category/add','CategoryController@categoryAdd')->name('category.add');
Route::post('category/edit{id}','CategoryController@categoryEdit')->name('category.edit');
Route::post('team/add','TeamController@teamAdd')->name('team.add');

// File upload via DropeZone
    Route::post('dropezone-file-upload','CommonController@dropZoneFileUpload')->name('dropezone.file-upload');
    Route::post('ckeditor-file-upload','CommonController@ckEditorFileUpload')->name('ckeditor.file-upload');

});




