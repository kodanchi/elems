<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::auth();




Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
    /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
    Route::get('/', function () {
        return view('welcome');
    });


    Route::get('/home', 'HomeController@index');
    Route::get('/form', 'RegFormController@index');

    Route::get('/form/new', 'RegFormController@create');
    Route::post('/form/add', 'RegFormController@add');

    Route::get('/form/{id}', 'RegFormController@view');


    //Route::get('/ar', 'HomeController@toArabic');


    Route::get('test',function(){
        return View::make('test');
    });
});



