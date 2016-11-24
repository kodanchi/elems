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








Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
    Route::auth();

    // Password reset link request routes...
    Route::get('password/email', 'Auth\PasswordController@getEmail');
    Route::post('password/email', 'Auth\PasswordController@postEmail');

    // Password reset routes...
    Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
    Route::post('password/reset', 'Auth\PasswordController@postReset');


    /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
    Route::get('/', 'HomeController@index');



    //Route::get('/home', 'HomeController@index');
    Route::get('/home', 'RegFormController@index');

    Route::get('/form', 'FormsController@index');
    Route::get('/form/emr', 'RegFormController@index');
    Route::get('/form/emr/pin', 'RegFormController@pinPage');
    Route::post('/form/emr/validate', 'RegFormController@emailValidate');
    Route::post('/form/emr/pinValidate', 'RegFormController@pinEmailValidate');
    Route::get('/form/emr/new', 'RegFormController@create');
    Route::post('/form/emr/add', 'RegFormController@add');
    Route::get('/form/emr/{id}/view', 'RegFormController@view');


    Route::get('/cp'  ,'CPController@index');
    Route::get('/cp/users'  ,'CPController@users');
    Route::get('/cp/users/{id}/edit'  ,'CPController@userEdit');
    Route::post('/cp/users/{id}/update'  ,'CPController@userUpdate');
    Route::get('/cp/users/{id}/delete'  ,'CPController@delUpdate');
    Route::get('/cp/form/emr'  ,'CPController@emrForms');
    Route::get('/cp/form/emr/{id}/view'  ,'CPController@view');
    Route::post('/cp/form/emr/search'  ,'CPController@search');
    Route::get('/cp/form/emr/search'  ,'CPController@emrForms');

    //Route::resource('students/conflict', 'ConflictFormController');

    Route::get('/students', 'FormsController@students');
    //Route::post('/students/conflict/new', 'ConflictFormController@newF');
    Route::get('/students/conflict', 'ConflictFormController@index');
    Route::get('/students/conflict/agree', 'ConflictFormController@newF');
    Route::post('/students/conflict/new', 'ConflictFormController@storeF');
    //Route::get('/students/conflict/view', 'ConflictFormController@view');
    Route::get('/students/conflict/view/{id}/{sid}', 'ConflictFormController@show');
    Route::post('/students/conflict/view', 'ConflictFormController@view');

    Route::group(['middleware' => 'auth','conflictAuth'], function () {
        Route::get('/cp/students/conflict', 'ConflictFormController@CPindex');
        Route::get('/cp/students/conflict/view/{id}', 'ConflictFormController@CPview');
        Route::post('/cp/students/conflict/update', 'ConflictFormController@CPupdate');
        Route::post('/cp/students/conflict/search'  ,'ConflictFormController@search');


    });
    //Route::get('/ar', 'HomeController@toArabic');


   /* Route::get('test',function(){
        return View::make('test');
    });*/
});



