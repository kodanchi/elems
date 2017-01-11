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
    //Route::auth();


    // Authentication Routes...
    $this->get('login', 'Auth\AuthController@showLoginForm');
    $this->post('login', 'Auth\AuthController@login');
    $this->get('logout', 'Auth\AuthController@logout');

    Route::group(['middleware' => 'auth'], function () {
        // Registration Routes...

    });
    $this->get('register', 'Auth\AuthController@showRegistrationForm');
    $this->post('register', 'Auth\AuthController@register');


    // Password Reset Routes...
    $this->get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
    $this->post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
    $this->post('password/reset', 'Auth\PasswordController@reset');


    // Password reset link request routes...
    //Route::get('password/email', 'Auth\PasswordController@getEmail');
    //Route::post('password/email', 'Auth\PasswordController@postEmail');

    // Password reset routes...
    //Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
    //Route::post('password/reset', 'Auth\PasswordController@postReset');


    /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
    Route::get('/', 'HomeController@index');



    //Route::get('/home', 'HomeController@index');
    Route::get('/home', 'RegFormController@index');

    /*Route::get('/form', 'FormsController@closed');
    Route::get('/form/emr', 'RegFormController@closed');
    Route::get('/form/emr/pin', 'RegFormController@closed');
    Route::post('/form/emr/validate', 'RegFormController@closed');
    Route::post('/form/emr/pinValidate', 'RegFormController@closed');
    Route::get('/form/emr/new', 'RegFormController@closed');
    Route::post('/form/emr/add', 'RegFormController@closed');
    Route::get('/form/emr/{id}/view', 'RegFormController@view');*/

    // routes up are closed original routes are below

    Route::get('/form', 'FormsController@index');
    Route::get('/form/emr', 'RegFormController@index');
    Route::get('/form/emr/pin', 'RegFormController@pinPage');
    Route::post('/form/emr/validate', 'RegFormController@emailValidate');
    Route::post('/form/emr/pinValidate', 'RegFormController@pinEmailValidate');
    Route::get('/form/emr/new', 'RegFormController@create');
    Route::post('/form/emr/add', 'RegFormController@add');
    Route::get('/form/emr/{id}/view', 'RegFormController@view');


    Route::get('/form/facultyform', 'FacultyFormController@index');
    Route::get('/form/facultyform/pin', 'FacultyFormController@pinPage');
    Route::post('/form/facultyform/validate', 'FacultyFormController@emailValidate');
    Route::post('/form/facultyform/pinValidate', 'FacultyFormController@pinEmailValidate');
    Route::get('/form/facultyform/new', 'FacultyFormController@create');
    Route::post('/form/facultyform/add', 'FacultyFormController@add');
    Route::get('/form/facultyform/{id}/view', 'FacultyFormController@view');

    //for admin to check the requested applications
    Route::get('/cp/students/sp/requested'  ,'CPController@SPRequested');
    Route::post('/cp/students/sp/validate'  ,'CPController@SPValidate');
    //for admin to enter new emr form
    Route::get('/cp/form/emr/new'  ,'CPController@regFormNew');

    //Route::get('/cp/updateBatch'  ,'CPController@updateBatch');


    Route::get('/cp'  ,'CPController@index');
    Route::get('/cp/users'  ,'CPController@users');
    Route::get('/cp/users/{id}/edit'  ,'CPController@userEdit');
    Route::post('/cp/users/{id}/update'  ,'CPController@userUpdate');
    Route::get('/cp/users/{id}/delete'  ,'CPController@delUpdate');
    Route::get('/cp/form/ff'  ,'CPController@facultyForms');
    Route::get('/cp/form/ff/{id}/view'  ,'CPController@viewFF');
    Route::post('/cp/form/ff/search'  ,'CPController@searchFF');
    Route::get('/cp/form/ff/approved'  ,'CPController@FFApproved');
    Route::get('/cp/form/ff/rejected'  ,'CPController@FFRejected');
    Route::get('/cp/form/ff/pending'  ,'CPController@FFPending');
    Route::get('/cp/form/ff/{id}/approve'  ,'CPController@approveFF');
    Route::get('/cp/form/ff/{id}/reject'  ,'CPController@rejectFF');
    Route::post('/cp/form/ff/{id}/update'  ,'CPController@updateFF');


    Route::get('/cp/form/emr'  ,'CPController@emrForms');
    Route::get('/cp/form/emr/approved'  ,'CPController@emrFormsApproved');
    Route::get('/cp/form/emr/rejected'  ,'CPController@emrFormsRejected');
    Route::get('/cp/form/emr/pending'  ,'CPController@emrFormsPending');
    Route::get('/cp/form/emr/{id}/view'  ,'CPController@viewRegForm');
    Route::get('/cp/form/emr/{id}/edit'  ,'CPController@editRegForm');
    Route::post('/cp/form/emr/{id}/update'  ,'CPController@updateRegForm');
    Route::get('/cp/form/emr/search'  ,'CPController@emrForms');
    Route::post('/cp/form/emr/search'  ,'CPController@search');
    Route::get('/cp/form/emr/{id}/edit'  ,'CPController@editRegForm');
    Route::get('/cp/form/emr/{id}/approve'  ,'CPController@approveRegForm');
    Route::get('/cp/form/emr/{id}/reject'  ,'CPController@rejectRegForm');
    Route::post('/cp/form/emr/{id}/update'  ,'CPController@updateRegForm');

    Route::get('/cp/form/emr/export'  ,'CPController@excelExport');

    Route::get('/cp/form/emr/evaluation'  ,'CPController@evaIndex');
    Route::post('/cp/form/emr/evaluation'  ,'CPController@evaView');
    Route::post('/cp/form/emr/evaluation/rate'  ,'CPController@rateUpdate');


    //Route::resource('students/conflict', 'ConflictFormController');

    Route::get('/students', 'FormsController@students');
    //Route::post('/students/conflict/new', 'ConflictFormController@newF');
    Route::get('/students/conflict', 'ConflictFormController@index');
    Route::get('/students/conflict/agree', 'ConflictFormController@newF');
    Route::get('/students/conflict/pin', 'ConflictFormController@getValidate');
    Route::post('/students/conflict/pin', 'ConflictFormController@pin');
    Route::get('/students/conflict/validate', 'ConflictFormController@getValidate');
    Route::post('/students/conflict/validate', 'ConflictFormController@pinValidate');
    //Route::get('/students/conflict/new', 'ConflictFormController@getNewF');
    Route::post('/students/conflict/new', 'ConflictFormController@storeF');
    Route::get('/students/conflict/search', 'ConflictFormController@getSearchDate');
    Route::post('/students/conflict/search', 'ConflictFormController@searchDate');
    //Route::get('/students/conflict/search', 'ConflictFormController@getSearch');
    //Route::get('/students/conflict/view', 'ConflictFormController@view');
    Route::get('/students/conflict/view/{id}/{sid}', 'ConflictFormController@show');
    Route::post('/students/conflict/view', 'ConflictFormController@view');

    Route::get('/students/sp', 'SPController@index');
    Route::get('/students/sp/agree', 'SPController@newF');
    Route::get('/students/sp/pin', 'SPController@getValidate');
    Route::post('/students/sp/pin', 'SPController@pin');
    Route::get('/students/sp/validate', 'SPController@getValidate');
    Route::post('/students/sp/validate', 'SPController@pinValidate');
    //Route::get('/students/conflict/new', 'ConflictFormController@getNewF');
    Route::post('/students/sp/new', 'SPController@storeF');
    Route::get('/students/sp/search', 'SPController@getSearchDate');
    Route::post('/students/sp/search', 'SPController@searchDate');
    //Route::get('/students/sp/search', 'SPController@getSearch');
    //Route::get('/students/sp/view', 'SPController@view');
    Route::get('/students/sp/view/{id}/{sid}', 'SPController@show');
    Route::post('/students/sp/view', 'SPController@view');
    
    
    Route::get('/students/objection', 'ObjectionController@index');
    Route::get('/students/objection/agree', 'ObjectionController@newF');
    Route::get('/students/objection/pin', 'ObjectionController@getValidate');
    Route::post('/students/objection/pin', 'ObjectionController@pin');
    Route::get('/students/objection/validate', 'ObjectionController@getValidate');
    Route::post('/students/objection/validate', 'ObjectionController@pinValidate');
    //Route::get('/students/conflict/new', 'ConflictFormController@getNewF');
    Route::post('/students/objection/new', 'ObjectionController@storeF');
    Route::get('/students/objection/search', 'ObjectionController@getSearchDate');
    Route::post('/students/objection/search', 'ObjectionController@searchDate');
    //Route::get('/students/objection/search', 'ObjectionController@getSearch');
    //Route::get('/students/objection/view', 'ObjectionController@view');
    Route::get('/students/objection/view/{id}/{sid}', 'ObjectionController@show');
    Route::post('/students/objection/view', 'ObjectionController@view');

    Route::get('/students/exams/lookup', 'ExamsController@getExamLookup');
    Route::post('/students/exams/lookup', 'ExamsController@examLookup');

    Route::group(['middleware' => ['conflictCP']], function () {
        Route::get('/cp/students/conflict', 'ConflictFormController@CPindex');
        Route::get('/cp/students/conflict/view/{id}', 'ConflictFormController@CPview');
        Route::post('/cp/students/conflict/update', 'ConflictFormController@CPupdate');
        Route::post('/cp/students/conflict/search'  ,'ConflictFormController@search');

        Route::get('/cp/students/conflict/approved'  ,'ConflictFormController@CPApproved');
        Route::get('/cp/students/conflict/rejected'  ,'ConflictFormController@CPRejected');
        Route::get('/cp/students/conflict/pending'  ,'ConflictFormController@CPPending');
    });
    Route::group(['middleware' => ['conflictCP']], function () {
        Route::get('/cp/students/sp', 'SPController@CPindex');
        Route::get('/cp/students/sp/view/{id}', 'SPController@CPview');
        Route::post('/cp/students/sp/update', 'SPController@CPupdate');
        Route::post('/cp/students/sp/search'  ,'SPController@search');

        Route::get('/cp/students/sp/approved'  ,'SPController@CPApproved');
        Route::get('/cp/students/sp/rejected'  ,'SPController@CPRejected');
        Route::get('/cp/students/sp/pending'  ,'SPController@CPPending');


    });
    Route::group(['middleware' => ['conflictCP']], function () {
        Route::get('/cp/students/objection', 'ObjectionController@CPindex');
        Route::get('/cp/students/objection/view/{id}', 'ObjectionController@CPview');
        Route::post('/cp/students/objection/update', 'ObjectionController@CPupdate');
        Route::post('/cp/students/objection/search'  ,'ObjectionController@search');

        Route::get('/cp/students/objection/approved'  ,'ObjectionController@CPApproved');
        Route::get('/cp/students/objection/rejected'  ,'ObjectionController@CPRejected');
        Route::get('/cp/students/objection/pending'  ,'ObjectionController@CPPending');

    });
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/cp/exams'  ,'ExamsController@index');
        Route::get('/cp/exams/new'  ,'ExamsController@add');
        Route::get('/cp/exams/major/{id}'  ,'ExamsController@showExam');
        Route::get('/cp/exams/delete/{id}'  ,'ExamsController@delete');
        Route::post('/cp/exams'  ,'ExamsController@create');

    });
    //warehouse
    Route::group(['middleware' => 'warehouse'], function () {
        Route::get('/cp/warehouse'  ,'WarehouseController@index');
        Route::get('/cp/warehouse/list'  ,'WarehouseController@WHlist');
        Route::get('/cp/warehouse/new'  ,'WarehouseController@WHnew');
        Route::get('/cp/warehouse/view/{id}'  ,'WarehouseController@WHview');
        Route::get('/cp/warehouse/edit/{id}'  ,'WarehouseController@WHedit');
        Route::post('/cp/warehouse/update/{id}'  ,'WarehouseController@WHupdate');
        Route::post('/cp/warehouse/search'  ,'WarehouseController@WHsearch');
        Route::post('/cp/warehouse/'  ,'WarehouseController@create');


    });
    Route::get('/cp/exams/conflict'  ,'ExamsController@conflictView');
    Route::get('/cp/exams/centers'  ,'ExamsController@showCentersCourses');

    //Route::get('/ar', 'HomeController@toArabic');


   /* Route::get('test',function(){
        return View::make('test');
    });*/
});



