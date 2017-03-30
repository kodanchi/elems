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








Route::group(['prefix' => LaravelLocalization::setLocale()], function() {
    //Route::auth();


    // Authentication Routes...
    $this->get('login', 'Auth\AuthController@showLoginForm');
    $this->post('login', 'Auth\AuthController@login');
    $this->get('logout', 'Auth\AuthController@logout');

    Route::group(['middleware' => 'auth'], function () {
        // Registration Routes...

    });
    /*$this->get('register', 'Auth\AuthController@showRegistrationForm');
    $this->post('register', 'Auth\AuthController@register');*/


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

    //Rooms Reservations
    Route::get('/reservation/new', 'ScheduleController@index');
    Route::post('/reservation/pin', 'ScheduleController@pin');
    Route::post('/reservation/validate', 'ScheduleController@pinValidate');
    Route::get('/reservation/pin', 'ScheduleController@getValidate');
    Route::get('/reservation/validate', 'ScheduleController@getValidate');
    Route::get('/reservation/newGuest', 'ScheduleController@regNew');
    Route::get('/reservation/check/{id}', 'ScheduleController@regEdit');
    Route::get('/reservation/schedule', 'ScheduleController@RoomSchedule');

    Route::post('/reservation/check', 'ScheduleController@regCheck');
    Route::patch('/reservation/guest/update/{id}', 'ScheduleController@regUpdate');

    Route::post('/reservation/guest/', 'ScheduleController@regCreate');
    Route::post('/reservation/schedule', 'ScheduleController@schedule');


    //Surveys for students
    Route::get('/survey/study', 'SurveysController@index');
    Route::get('/survey/study/new', 'SurveysController@createStudySurv');
    Route::get('/survey/study/error', 'SurveysController@error');

    Route::post('/survey/study/', 'SurveysController@submitStudySurv');


    //Info route 3/14/2017

    Route::get('students/Info', 'Std_updates@index');
    Route::get('students/Info/edit/{id}', 'Std_updates@EditIndex');
    Route::get('cp/students/Info/exportindex', 'Std_updates@ExcelExportIndex');
    Route::get('cp/students/Info/export', 'Std_updates@linksExcelExport');
    Route::get('cp/students/Info/export2', 'Std_updates@ResultExcelExport');
    Route::any('students/Info/update/{id}', 'Std_updates@UpdateIndex');

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

    Route::get('/cp/students/sp/requested', 'CPController@SPRequested');
    Route::get('/cp/students/objection/requested', 'CPController@ObjRequested');
    Route::post('/cp/students/sp/validate', 'CPController@SPValidate');
    Route::post('/cp/students/objection/validate', 'CPController@ObjValidate');
    //for college admin and super admin to enter new emr form
    Route::get('/cp/form/emr/new', 'CPController@regFormNew');
    Route::post('/cp/form/emr/add', 'CPController@regFormAdd');
    Route::post('/cp/students/sp/requested/search', 'SPController@requestedsearch');


    //Route::get('/cp/updateBatch'  ,'CPController@updateBatch');
    //for admin to get export the emr/evaluation
    Route::get('/cp/form/emr/evaluation/export', 'CPController@EmrEvaluationExcelExport');
    Route::get('/cp/survey/export', 'SurveysController@surveyExcelExport');


    Route::get('/cp', 'CPController@index');
    Route::get('/cp/users', 'CPController@users');
    Route::get('/cp/users/{id}/edit', 'CPController@userEdit');
    Route::post('/cp/users/{id}/update', 'CPController@userUpdate');
    Route::get('/cp/users/{id}/delete', 'CPController@delUpdate');
    Route::get('/cp/form/ff', 'CPController@facultyForms');
    Route::get('/cp/form/ff/{id}/view', 'CPController@viewFF');
    Route::post('/cp/form/ff/search', 'CPController@searchFF');
    Route::get('/cp/form/ff/approved', 'CPController@FFApproved');
    Route::get('/cp/form/ff/rejected', 'CPController@FFRejected');
    Route::get('/cp/form/ff/pending', 'CPController@FFPending');
    Route::get('/cp/form/ff/{id}/approve', 'CPController@approveFF');
    Route::get('/cp/form/ff/{id}/reject', 'CPController@rejectFF');
    Route::post('/cp/form/ff/{id}/update', 'CPController@updateFF');


    Route::get('/cp/form/emr', 'CPController@emrForms');
    Route::get('/cp/form/emr/approved', 'CPController@emrFormsApproved');
    Route::get('/cp/form/emr/rejected', 'CPController@emrFormsRejected');
    Route::get('/cp/form/emr/pending', 'CPController@emrFormsPending');
    Route::get('/cp/form/emr/{id}/view', 'CPController@viewRegForm');
    Route::get('/cp/form/emr/{id}/edit', 'CPController@editRegForm');
    Route::post('/cp/form/emr/{id}/update', 'CPController@updateRegForm');
    Route::get('/cp/form/emr/search', 'CPController@emrForms');
    Route::post('/cp/form/emr/search', 'CPController@search');
    Route::get('/cp/form/emr/{id}/edit', 'CPController@editRegForm');
    Route::get('/cp/form/emr/{id}/approve', 'CPController@approveRegForm');
    Route::get('/cp/form/emr/{id}/reject', 'CPController@rejectRegForm');
    Route::post('/cp/form/emr/{id}/update', 'CPController@updateRegForm');

    Route::get('/cp/form/emr/export', 'CPController@excelExport');


    Route::get('/cp/survey/', 'CPController@surveyList');
    Route::get('/cp/survey/fillSidHash', 'CPController@SIDHashAll');

    Route::post('/cp/survey/search', 'CPController@surveySearch');


    //helpdesk route
    Route::get('/helpdesk', 'TecsController@index');
    Route::post('/helpdesk/pin', 'TecsController@pin');
    Route::post('/helpdesk/validate', 'TecsController@pinValidate');
    Route::get('/helpdesk/pin', 'TecsController@getValidate');
    Route::get('/helpdesk/validate', 'TecsController@getValidate');
    Route::get('/helpdesk/agree', 'TecsController@newF');
    Route::post('/helpdesk/new', 'TecsController@storeF');
    Route::post('/helpdesk/view', 'TecsController@view');
    Route::get('/helpdesk/view/{id}/{sid}', 'TecsController@show');


    //finance route
    Route::get('/finance', 'FinanceController@index');
    Route::post('/finance/pin', 'FinanceController@pin');
    Route::post('/finance/validate', 'FinanceController@pinValidate');
    Route::get('/finance/pin', 'FinanceController@getValidate');
    Route::get('/finance/validate', 'FinanceController@getValidate');
    Route::get('/finance/agree', 'FinanceController@newF');
    Route::post('/finance/new', 'FinanceController@storeF');
    Route::post('c', 'TecsController@view');
    Route::get('/finance/view/{id}/{sid}', 'TecsController@show');


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
        Route::post('/cp/students/conflict/search', 'ConflictFormController@search');

        Route::get('/cp/students/conflict/approved', 'ConflictFormController@CPApproved');
        Route::get('/cp/students/conflict/rejected', 'ConflictFormController@CPRejected');
        Route::get('/cp/students/conflict/pending', 'ConflictFormController@CPPending');
        Route::get('/cp/students/conflict/export', 'ConflictFormController@conflictExcelExport');


    });

    Route::group(['middleware' => ['helpdeskCP']], function () {

        Route::get('/cp/students/helpdesk', 'TecsController@CPindex');
        Route::get('/cp/students/helpdesk/view/{id}', 'TecsController@CPview');
        Route::post('/cp/students/helpdesk/update', array('uses' => 'TecsController@CPupdateOrCPtrans'));
        Route::get('/cp/students/helpdesk/assign/{id}', 'TecsController@AssignToMe');
        Route::post('/cp/students/helpdesk/search', 'TecsController@search');
        Route::get('/cp/students/helpdesk/search', 'TecsController@search2');

        Route::get('/cp/students/helpdesk/approved', 'TecsController@CPApproved');
        Route::get('/cp/students/helpdesk/closed', 'TecsController@CPClosed');
        Route::get('/cp/students/helpdesk/pending', 'TecsController@CPPending');
        Route::get('/cp/students/helpdesk/requested', 'TecsController@HdRequested');
        Route::get('/cp/students/helpdesk/myRequests', 'TecsController@CPMyRequests');
        Route::get('/cp/students/helpdesk/export', 'TecsController@excelExport');

        Route::post('/cp/students/helpdesk/requested', 'TecsController@search');
        Route::post('/cp/students/helpdesk/requested/search', 'TecsController@requestedsearch');

    });

    Route::group(['middleware' => ['CPfinance']], function () {
        Route::get('/cp/students/finance', 'FinanceController@CPindex');
        Route::get('/cp/students/finance/voucher', 'FinanceController@ViewVoucher');
        Route::get('/cp/students/finance/NewVoucher', 'FinanceController@NewVoucherindex');
        Route::post('/cp/students/finance/NewVoucher/add', 'FinanceController@AddNewVoucher');
        Route::get('/cp/students/finance/view/{id}', 'FinanceController@CPview');
        Route::get('/cp/students/finance/edit/{id}', 'FinanceController@EditIndex');
        Route::post('/cp/students/finance/update/{id}', 'FinanceController@UpdateIndex');
        //Route::post('/cp/students/helpdesk/update', array('uses' => 'TecsController@CPupdateOrCPtrans'));
        //Route::post('/cp/students/finance/import/update', 'FinanceController@importExcel');
        Route::post('/cp/students/finance/import/update', 'FinanceController@importExcelNew');
        Route::get('/cp/students/finance/import', 'FinanceController@importIndex');
        Route::get('/cp/students/finance/create', 'FinanceController@AddNewStudentsIndex');
        Route::post('/cp/students/finance/create/AddNew', 'FinanceController@AddNewsStudents');
        Route::get('/cp/students/finance/export', 'FinanceController@excelExport');
        Route::get('/cp/students/finance/term', 'FinanceController@ViewTerm');
        Route::get('/cp/students/finance/term/add', 'FinanceController@AddNewTermIndex');
        Route::post('/cp/students/finance/term/AddNew', 'FinanceController@CPAddNewTerm');
        Route::get('/cp/students/finance/account', 'FinanceController@ViewAccount');
        Route::get('/cp/students/finance/account/add', 'FinanceController@AddNewAccountIndex');
        Route::post('/cp/students/finance/account/AddNew', 'FinanceController@CPAddNewAccount');

        /*Route::post('/cp/students/helpdesk/search'  ,'TecsController@search');
        Route::get('/cp/students/helpdesk/search'  ,'TecsController@search2');

        Route::get('/cp/students/helpdesk/approved'  ,'TecsController@CPApproved');
        Route::get('/cp/students/helpdesk/closed'  ,'TecsController@CPClosed');
        Route::get('/cp/students/helpdesk/pending'  ,'TecsController@CPPending');
        Route::get('/cp/students/helpdesk/requested'  ,'TecsController@HdRequested');
        Route::get('/cp/students/helpdesk/myRequests'  ,'TecsController@CPMyRequests');
        Route::get('/cp/students/helpdesk/export'  ,'TecsController@excelExport');

        Route::post('/cp/students/helpdesk/requested'  ,'TecsController@search');
        Route::post('/cp/students/helpdesk/requested/search'  ,'TecsController@requestedsearch');*/

    });


    Route::group(['middleware' => ['conflictCP']], function () {
        Route::get('/cp/students/sp', 'SPController@CPindex');
        Route::get('/cp/students/sp/view/{id}', 'SPController@CPview');
        Route::post('/cp/students/sp/update', 'SPController@CPupdate');
        Route::post('/cp/students/sp/search', 'SPController@search');

        Route::get('/cp/students/sp/approved', 'SPController@CPApproved');
        Route::get('/cp/students/sp/rejected', 'SPController@CPRejected');
        Route::get('/cp/students/sp/pending', 'SPController@CPPending');
        Route::get('/cp/students/sp/export', 'SPController@excelExport');


    });
    Route::group(['middleware' => ['objection']], function () {
        Route::get('/cp/students/objection', 'ObjectionController@CPindex');
        Route::get('/cp/students/objection/view/{id}', 'ObjectionController@CPview');
        Route::post('/cp/students/objection/update', 'ObjectionController@CPupdate');
        Route::get('/cp/students/objection/search', 'ObjectionController@CPindex');
        Route::post('/cp/students/objection/search', 'ObjectionController@search');
        Route::post('/cp/students/objection/requested', 'ObjectionController@search');
        Route::post('/cp/students/objection/requested/search', 'ObjectionController@requestedsearch');

        Route::get('/cp/students/objection/approved', 'ObjectionController@CPApproved');
        Route::get('/cp/students/objection/rejected', 'ObjectionController@CPRejected');
        Route::get('/cp/students/objection/pending', 'ObjectionController@CPPending');
        Route::get('/cp/students/objection/export', 'ObjectionController@objectionExcelExport');
    });
    Route::group(['middleware' => ['evaluation']], function () {
        Route::get('/cp/form/emr/evaluation', 'RegFormController@evaIndex');
        Route::post('/cp/form/emr/evaluation', 'RegFormController@evaView');
        Route::post('/cp/form/emr/evaluation/rate', 'RegFormController@rateUpdate');

    });
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/cp/exams', 'ExamsController@index');
        Route::get('/cp/exams/new', 'ExamsController@add');
        Route::get('/cp/exams/major/{id}', 'ExamsController@showExam');
        Route::get('/cp/exams/delete/{id}', 'ExamsController@delete');
        Route::post('/cp/exams', 'ExamsController@create');

    });
    //warehouse
    Route::group(['middleware' => 'warehouse'], function () {

        Route::get('/cp/warehouse', 'WarehouseController@index');
        Route::get('/cp/warehouse/list', 'WarehouseController@WHlist');
        Route::get('/cp/warehouse/list/uptodate', 'WarehouseController@WHlistUptodate');
        Route::get('/cp/warehouse/list/outdated', 'WarehouseController@WHlistOutdated');
        Route::get('/cp/warehouse/new', 'WarehouseController@WHnew');
        Route::get('/cp/warehouse/view/{id}', 'WarehouseController@WHview');
        Route::get('/cp/warehouse/edit/{id}', 'WarehouseController@WHedit');

        //warranty
        Route::get('/cp/warehouse/warranty', 'WarehouseController@warrantyList');
        Route::get('/cp/warehouse/warranty/new', 'WarehouseController@warrantyNew');
        Route::get('/cp/warehouse/warranty/edit/{id}', 'WarehouseController@warrantyEdit');
        Route::get('/cp/warehouse/warranty/view/{id}', 'WarehouseController@warrantyView');

        Route::post('/cp/warehouse/warranty', 'WarehouseController@warrantyCreate');
        Route::post('/cp/warehouse/warranty/update/{id}', 'WarehouseController@warrantyUpdate');
        Route::post('/cp/warehouse/warranty/search', 'WarehouseController@warrantySearch');


        //employees -get
        Route::get('/cp/warehouse/employees', 'WarehouseController@EmpList');
        Route::get('/cp/warehouse/employees/new', 'WarehouseController@EmpNew');
        Route::get('/cp/warehouse/employees/edit/{id}', 'WarehouseController@EmpEdit');
        Route::get('/cp/warehouse/employees/view/{id}', 'WarehouseController@EmpView');
        Route::get('/cp/warehouse/employees/link/new/{id}', 'WarehouseController@EmpNewLink');
        Route::get('/cp/warehouse/employees/link/edit/{id}/{link}', 'WarehouseController@EmpEditLink');
        Route::get('/cp/warehouse/employees/link/delete/{link}', 'WarehouseController@EmpDelLink');

        //rooms -get
        Route::get('/cp/warehouse/rooms/', 'ScheduleController@RoomList');
        Route::get('/cp/warehouse/rooms/new', 'ScheduleController@RoomNew');
        Route::get('/cp/warehouse/rooms/edit/{id}', 'ScheduleController@RoomEdit');
        Route::get('/cp/warehouse/rooms/view/{id}', 'ScheduleController@RoomView');
        Route::get('/cp/warehouse/rooms/link/new/{id}', 'ScheduleController@RoomNewLink');
        Route::get('/cp/warehouse/rooms/link/edit/{id}/{link}', 'ScheduleController@RoomEditLink');
        Route::get('/cp/warehouse/rooms/link/delete/{link}', 'ScheduleController@RoomDelLink');

        //reservations -get
        Route::get('/cp/warehouse/reservations/', 'ScheduleController@resvView');
        Route::get('/cp/warehouse/reservation/approve/', 'ScheduleController@resvApproveView');
        Route::get('/cp/warehouse/reservation/approve/accept/{id}', 'ScheduleController@resvApproveAccept');
        Route::get('/cp/warehouse/reservation/approve/reject/{id}/{reason}', 'ScheduleController@resvApproveReject');
        Route::get('/cp/warehouse/reservation/approved/', 'ScheduleController@resvApprovedView');
        Route::get('/cp/warehouse/reservation/approved/delete/{id}', 'ScheduleController@resvApprovedDelete');


        //employees -post
        Route::patch('/cp/warehouse/employees/update/{id}', 'WarehouseController@EmpUpdate');
        Route::post('/cp/warehouse/employees/search', 'WarehouseController@EmpSearch');
        Route::post('/cp/warehouse/employees/link', 'WarehouseController@EmpCreateLink');
        Route::patch('/cp/warehouse/employees/link/update/{id}', 'WarehouseController@EmpUpdateLink');

        Route::post('/cp/warehouse/employees/', 'WarehouseController@empCreate');

        //rooms -post
        Route::patch('/cp/warehouse/rooms/update/{id}', 'ScheduleController@RoomUpdate');
        Route::post('/cp/warehouse/rooms/link', 'ScheduleController@RoomCreateLink');
        Route::patch('/cp/warehouse/rooms/link/update/{id}', 'ScheduleController@RoomUpdateLink');

        Route::post('/cp/warehouse/rooms/', 'ScheduleController@RoomCreate');


        Route::post('/cp/warehouse/update/{id}', 'WarehouseController@WHupdate');
        Route::post('/cp/warehouse/search', 'WarehouseController@WHsearch');
        Route::get('/cp/warehouse/search', 'WarehouseController@WHsearch2');
        Route::post('/cp/warehouse/', 'WarehouseController@create');

        //report

        Route::get('/cp/warehouse/reports/', 'WarehouseController@reportsindex');
        Route::post('/cp/warehouse/reports/new', 'WarehouseController@ExcelExport');


    });
    Route::get('/cp/exams/conflict', 'ExamsController@conflictView');
    Route::get('/cp/exams/centers', 'ExamsController@showCentersCourses');

    //Route::get('/ar', 'HomeController@toArabic');

});

   /* Route: