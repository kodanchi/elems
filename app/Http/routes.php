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

    Route::get('/form', 'FormsController@index');
    Route::get('/form/emr', 'RegFormController@index');
    Route::get('/form/emr/new', ['middleware'=>'auth','formSubmitCheck:emr','uses' => 'RegFormController@create']);
    Route::post('/form/emr/add', 'RegFormController@add');
    Route::get('/form/emr/{id}/view', 'RegFormController@view');


    Route::get('/cp'  ,'CPController@index');
    Route::get('/cp/users'  ,'CPController@users');
    Route::get('/cp/users/{id}/edit'  ,'CPController@userEdit');
    Route::post('/cp/users/{id}/update'  ,'CPController@userUpdate');
    Route::get('/cp/users/{id}/delete'  ,'CPController@delUpdate');
    Route::get('/cp/form/emr'  ,'CPController@emrForms');
    Route::get('/cp/form/emr/{id}/view'  ,'CPController@view');

    //Route::get('/ar', 'HomeController@toArabic');


    Route::get('test',function(){
        return View::make('test');
    });
});



