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

Route::get('/actions', [
    'uses' => 'Api\ActionsController@all',
    'as' => 'api.actions.all',
]);

Route::get('/collaborators', [
    'uses' => 'Api\CollaboratorController@all',
    'as' => 'api.collaborator.all',
]);

Route::get('/collaborators/grades', [
    'uses' => 'Api\CollaboratorController@grades',
    'as' => 'api.collaborator.grades',
]);

Route::post('/video', [
    'uses' => 'Api\VideoController@upload',
    'as' => 'api.video.upload',
]);
