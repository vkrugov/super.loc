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
Route::get('/genders', 'UserController@getGenders');
Route::get('/user/get-all', 'UserController@getAll')->middleware('checkAdmin');;
Route::post('/user/delete', 'UserController@deleteUser')->middleware('checkAdmin');;
Route::get('/heroes', 'HeroController@getHeroes');
Route::get('/powers', 'PowerController@getPowers');
Route::get('/update-hero', 'HeroController@getUpdateHero');
Route::post('/hero/edit', 'HeroController@editHero')->middleware(['checkAdmin', 'checkNewHero']);
Route::post('/hero/delete', 'HeroController@deleteHero')->middleware('checkAdmin');
Route::post('/hero/upload-img', 'HeroController@uploadImg')->middleware(['checkAdmin', 'checkImage']);
Route::post('/hero/delete-img', 'HeroController@deleteImg')->middleware('checkAdmin');
Route::get('/hero/get-gallery', 'HeroController@getGallery');

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthApiController@login');
    Route::post('register', 'AuthApiController@registration')->middleware(['checkAdmin','checkApiRegister']);
    Route::post('logout', 'AuthApiController@logout');
    Route::post('refresh', 'AuthApiController@refresh');
    Route::post('me', 'AuthApiController@me');
});
