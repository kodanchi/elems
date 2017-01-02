@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">


                @include('errors.errors')


                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('regform.title')}}</div>

                    <div class="panel-body">

                        {!! Form::open(['url' => LaravelLocalization::getLocalizedURL(null,'form/emr/add'), 'method' => 'post', 'files' => true,'id'=>'newRegForm','class' => 'newsletter-form']) !!}
                        <h4>{{trans('regform.general_details')}}</h4>
                        <hr>
                        <div class="row">
                            @include('forms.regform.fname')
                            @include('forms.regform.faname')
                            @include('forms.regform.gfaname')
                            @include('forms.regform.lname')

                        </div>
                            <div class="row">
                                <div class="col col-md-6 ">
                                    <!--- NID Field --->
                                    <div class="form-group">
                                        {!! Form::label('NID', trans('regform.NID').':') !!}
                                        {!! Form::number('NID', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col col-md-6">
                                    <!--- Gender Field --->
                                    <div class="form-group">
                                        {!! Form::label('gender', trans('regform.gender').':') !!}
                                        {!! Form::select('gender', $gender, null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col col-md-6">

                                    <!--- Birth date Field --->
                                    <div class="form-group">
                                        {!! Form::label('date', trans('regform.birth_date').':') !!}
                                        {!! Form::select('selectCalendar', ['h' =>  trans('regform.hijri'),'g'=>  trans('regform.miladi')] , 'ummalqura' ,
                                     ['class' => 'form-control', 'id'=> 'selectCalendar']) !!}
                                        {!! Form::text('date', null, ['class' => 'form-control','onclick'=>'showCal();']) !!}
                                        {!! Form::hidden('birth_date', '',['id'=>'birth_date']) !!}
                                    </div>
                                        <div id="cal"></div>
                                </div>
                                <div class="col col-md-6">
                                    <!--- Nationality Field --->
                                    <div class="form-group">
                                        {!! Form::label('nationality', trans('regform.nationality').':') !!}
                                        {!! Form::select('nationality', $nationality, null, ['class' => 'form-control']) !!}
                                    </div>
                                    <div id="div_other_nationality" class="form-group">
                                        <!--- other_nationality Field --->
                                        <div class="form-group">
                                            {!! Form::label('other_nationality', trans('regform.specify').':') !!}
                                            {!! Form::text('other_nationality', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <!--- Cellphone Field --->
                                    <div class="form-group">
                                        {!! Form::label('cellphone', trans('regform.cellphone').':') !!}
                                        {!! Form::text('cellphone', null, ['class' => 'cellphone form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-md-6">
                                    <!--- Email Field --->
                                    <div class="form-group">
                                        {!! Form::label('email', trans('regform.email').':') !!}
                                        <p>{!! Session::get('email','NULL')!!}</p>

                                    </div>
                                </div>
                                <div class="col col-md-6">
                                    <!--- Phone Field --->
                                    <div class="form-group">
                                        {!! Form::label('phone', trans('regform.phone').':') !!}
                                        {!! Form::text('phone', null, ['class' => 'phone form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-md-6">
                                    <!--- Qualification Field --->
                                    <div class="form-group">
                                        {!! Form::label('qualification', trans('regform.qualification').':') !!}

                                        {!! Form::select('qualification', $qualification, null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col col-md-6">
                                    <!--- Upload Field --->
                                    <div class="form-group">
                                        {!! Form::label('qualification_identity_attach', trans('regform.qia').':') !!}
                                        {!! Form::file('qualification_identity_attach', ['class' => 'form-control','accept'=>'.pdf']) !!}
                                        <small>يرفق ملف pdf </small>
                                        <small class="red">الحجم المسموح: 4MB أو أقل</small>
                                    </div>
                                </div>
                                <div class="col col-md-6">
                                    <!--- Major Field --->
                                    <div class="form-group">
                                        {!! Form::label('major', trans('regform.major').':') !!}
                                        {!! Form::text('major', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-md-6">
                                    <!--- College/Department Field --->
                                    <div class="form-group">
                                        {!! Form::label('department', trans('regform.department').':') !!}
                                        {!! Form::text('department', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col col-md-6">
                                    <!--- Section Field --->
                                    <div class="form-group">
                                        {!! Form::label('section', trans('regform.section').':') !!}
                                        {!! Form::text('section', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col col-md-6">
                                    <!--- Employee ID Field --->
                                    <div class="form-group">
                                        {!! Form::label('employee_ID', trans('regform.employee_ID').':') !!}
                                        <label>
                                            {!! Form::checkbox('is_contract', '1', null,  ['id' => 'is_contract']) !!}
                                            {{trans('regform.is_contract')}}
                                        </label>
                                        {!! Form::text('employee_ID', null, ['class' => 'form-control','placeholder'=>trans('regform.job_placeholder')]) !!}
                                    </div>

                                </div>
                                <div class="col col-md-6">
                                    <!--- Job Title Field --->
                                    <div class="form-group">
                                        {!! Form::label('job_title', trans('regform.job_title').':') !!}
                                        {!! Form::select('job_title', $jobTitles ,null, ['class' => 'form-control']) !!}
                                    </div>
                                    <div id="div_other_job_title" class="form-group">
                                        <!--- other_job_title Field --->
                                        <div class="form-group">
                                            {!! Form::label('other_job_title', trans('regform.specify').':') !!}
                                            {!! Form::text('other_job_title', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-md-6">
                                    <!--- Supervisor Field --->
                                    <div class="form-group">
                                        {!! Form::label('supervisor', trans('regform.supervisor').':') !!}
                                        {!! Form::text('supervisor', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col col-md-6">
                                    <!--- Supervisor Phone Field --->
                                    <div class="form-group">
                                        {!! Form::label('su_phone', trans('regform.su_phone').':') !!}
                                        {!! Form::text('su_phone', null, ['class' => 'phone form-control']) !!}
                                    </div>
                                </div>



                            </div>
                            <div class="row">
                                <div class="col col-md-6">
                                    <!--- Supervisor Cellphone Field --->
                                    <div class="form-group">
                                        {!! Form::label('su_cellphone', trans('regform.su_cellphone').':') !!}
                                        {!! Form::text('su_cellphone', null, ['class' => 'cellphone form-control']) !!}
                                    </div>
                                </div>
                                <div class="col col-md-6">
                                    <!--- Supervisor Email Field --->
                                    <div class="form-group">
                                        {!! Form::label('su_email', trans('regform.su_email').':') !!}
                                        {!! Form::email('su_email', null, ['class' => 'form-control']) !!}
                                        <small>{{trans('regform.example')}}: username@uod.edu.sa {{trans('regform.or')}} username@uohb.edu.sa</small>
                                    </div>
                                </div>
                            </div>

                            <h4>{{trans('regform.bank_details')}}</h4>
                            <hr>

                            <div class="row">

                                <div class="col col-md-6">

                                        <!--- Account holder name Field --->
                                        <div class="form-group">

                                            {!! Form::label('account_holder_name', trans('regform.account_holder_name').':') !!}

                                            {!! Form::text('account_holder_name', null, ['class' => 'form-control']) !!}
                                            <label>{!! Form::checkbox('sameName', '1', null,  ['id' => 'sameName']) !!}
                                                {{trans('regform.same_name')}}</label>
                                        </div>


                                </div>
                                <div class="col col-md-6">
                                    <!--- Bank Name Field --->
                                    <div class="form-group">
                                        {!! Form::label('bank_name', trans('regform.bank_name').':') !!}
                                        {!! Form::select('bank_name', $banks , null , ['class' => 'form-control']) !!}
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col col-md-12">
                                    <!--- IBAN Field --->
                                    <div class="form-group" >
                                        {!! Form::label('IBAN', trans('regform.IBAN').':') !!}
                                        {!! Form::text('IBAN', null, ['class' => 'form-control','dir' => 'ltr']) !!}
                                    </div>
                                </div>
                            </div>

                            <h4>{{trans('regform.emergency_contacts_details')}}</h4>
                            <hr>
                            <div class="row">
                                <div class="col col-md-6">
                                    <!--- Person Name Field --->
                                    <div class="form-group">
                                        {!! Form::label('emergency_name', trans('regform.emergency_name').':') !!}
                                        {!! Form::text('emergency_name', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col col-md-6">
                                    <!--- Relation Field --->
                                    <div class="form-group">
                                        {!! Form::label('emer_relation', trans('regform.emer_relation').':') !!}
                                        {!! Form::select('emer_relation', $relation , null , ['class' => 'form-control']) !!}
                                    </div>

                                    <div id="div_other_emer_relation" class="form-group">
                                        <!--- other_emer_relation Field --->
                                        <div class="form-group">
                                            {!! Form::label('other_emer_relation', trans('regform.specify').':') !!}
                                            {!! Form::text('other_emer_relation', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                </div>




                                <div class="col col-md-6">
                                    <!--- Person Cellphone Field --->
                                    <div class="form-group">
                                        {!! Form::label('emer_cellphone', trans('regform.emer_cellphone').':') !!}
                                        {!! Form::text('emer_cellphone', null, ['class' => 'cellphone form-control']) !!}
                                    </div>
                                </div>
                            </div>
                        <h4>{{trans('regform.other_details')}}</h4>
                        <hr>
                        <div class="row">
                            <div class="col col-md-6">
                                <!--- El Exams before Field --->
                                <div class="form-group">
                                    {!! Form::label('el_exams_Before', trans('regform.el_exams_Before').':') !!}
                                    {!! Form::select('el_exams_Before', $boolean , null , ['class' => 'form-control']) !!}
                                </div>
                                <!--- El Exams number Field --->
                                <div id="div_el_exams_num" class="form-group">
                                    <!--- El Exams number Field --->
                                    <div class="form-group">
                                        {!! Form::label('el_exams_num', trans('regform.howMany').':') !!}
                                        {!! Form::selectRange('el_exams_num', 1, 9 , null , ['class' => 'form-control']) !!}
                                        فصل/فصول

                                    </div>
                                    <p><label>{{trans('regform.selectRoles')}}:</label></p>
                                    <label>
                                    	{!! Form::checkbox('isSV', '1', null,  ['id' => 'isSV']) !!}
                                    	{{trans('regform.isSV')}}
                                    </label>
                                    <label>
                                    	{!! Form::checkbox('isInspector', '1', null,  ['id' => 'isInspector']) !!}
                                    	{{trans('regform.isIns')}}
                                    </label>
                                    <label>
                                    	{!! Form::checkbox('isController', '1', null,  ['id' => 'isController']) !!}
                                    	{{trans('regform.isCont')}}
                                    </label>
                                </div>

                            </div>
                            <div class="col col-md-6">
                                <!--- Exams before Field --->
                                <div class="form-group">
                                    {!! Form::label('other_exams_Before', trans('regform.other_exams_Before').':') !!}
                                    {!! Form::select('other_exams_Before', $boolean , null , ['class' => 'form-control']) !!}
                                </div>
                                <!--- Exams number Field --->
                                <div id="div_other_exams" class="form-group">
                                    <!--- Exams number Field --->
                                    <div class="form-group">
                                        {!! Form::label('other_exams', trans('regform.specifyExams').':') !!}
                                        {!! Form::textarea('other_exams', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>




                        </div>
                        <div class="row">
                            <div id="div_center" class="col col-md-6">
                                <div id="center_div">
                                    <!--- Center Field --->
                                    <div class="form-group">
                                        {!! Form::label('center_first', trans('regform.center_first').':') !!}
                                        {!! Form::select('center_first', [] , null , ['class' => 'form-control']) !!}
                                    </div>
                                    <!--- Second Center Field --->
                                    <div class="form-group">
                                        {!! Form::label('center_second', trans('regform.center_second').':') !!}
                                        {!! Form::select('center_second', [] , null , ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div id="div_center_select">
                                    {!! Form::select('center_m', $centers_male , null , ['class' => 'form-control','id'=>'center_m']) !!}
                                    {!! Form::select('center_f', $centers_female , null , ['class' => 'form-control','id'=>'center_f']) !!}
                                </div>
                            </div>
                        </div>
                        <h4>{{trans('regform.job_identification')}}</h4>
                        <div class="row">
                            <div class="col col-md-12">
                                <div class="form-group">
                                    {!! Form::file('job_identity_attach', ['class' => 'form-control','accept'=>'.pdf']) !!}
                                    <small>يرفق ملف pdf حجم المسموح: 4MB أو أقل، ويمكن الحصول عليه من شؤون الموظفين أو من خلال الخدمات الإلكترونية</small>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                        </div>
                        <div class="row">
                            {!! Form::hidden('email', Session::get('email'), ['id' => 'email']) !!}
                                {!! Form::submit(trans('regform.submit'), ['class' => ' col-md-3']) !!}
                                <a href="{{LaravelLocalization::getLocalizedURL(null,'/form')}}" class="button">{{trans('regform.cancel')}}</a>

                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">


        $('input[type=checkbox][name=sameName]').change(nameCheck);

        $('input[type=checkbox][name=is_contract]').change(contractCheck);

        $('#nationality').change(function () {
            nationalityOther();
            $('#other_nationality').focus();

        });
        $('#job_title').change(function () {
            jobTitleOther();
            $('#other_job_title').focus();
        });
        $('#emer_relation').change(function () {
            EmerRelationOther();
            $('#other_emer_relation').focus();
        });
        $('#el_exams_Before').change(function () {
            el_exams();
            $('#el_exams_num').focus();
        });
        $('#other_exams_Before').change(function () {
            exams();
            $('#other_exams').focus();
        });
        $('#gender').change(function () {
            centers();
            //$('#other_exams').focus();
        });

        function nameCheck() {
            if($('#sameName').is(':checked')){
                var name = $('#fname').val() +" "+ $('#faname').val() +" "+ $('#gfaname').val() +
                        " "+ $('#lname').val();
                $('#account_holder_name').val(name);
                //$('#account_holder_name').prop('disabled',true);
            }else {
                //$('#account_holder_name').prop('disabled',false);
            }
        }

        function contractCheck() {
            if($('#is_contract').is(':checked')){
                $('#employee_ID').val('');
                $('#employee_ID').prop('disabled',true);
            }else {
                $('#employee_ID').prop('disabled',false);
            }
        }



        function nationalityOther() {
            if($('#nationality').val() === 'other'){
                if($('#other_nationality').val() === 'other') $('#other_nationality').val('');
                $('#div_other_nationality').show();
            }else {
                $('#other_nationality').val('other');
                $('#div_other_nationality').hide();
            }
        }


        function jobTitleOther() {

            if($('#job_title').val() === 'other'){
                if($('#other_job_title').val() === 'other') $('#other_job_title').val('');
                $('#div_other_job_title').show();
            }else {
                $('#other_job_title').val('other');
                $('#div_other_job_title').hide();
            }
        }

        function EmerRelationOther() {
            if($('#emer_relation').val() === 'other'){
                if($('#other_emer_relation').val() === 'other') $('#other_emer_relation').val('');
                $('#div_other_emer_relation').show();
            }else {
                $('#other_emer_relation').val('other');
                $('#div_other_emer_relation').hide();
            }
        }


        function el_exams() {
            if($('#el_exams_Before').val() === '1'){
                if($('#el_exams_num').val() === '0') $('#el_exams_num').val('');
                $('#div_el_exams_num').show();
            }else {
                $('#el_exams_num').val('0');
                $('#div_el_exams_num').hide();
            }
        }


        function exams() {
            if($('#other_exams_Before').val() === '1'){
                if($('#other_exams').val() === '0') $('#other_exams').val('');
                $('#div_other_exams').show();
            }else {
                $('#other_exams').val('0');
                $('#div_other_exams').hide();
            }
        }
        function centers() {
            if($('#gender').val() === 'male'){
                $('#center_first').html($('#center_m').html());
                $('#center_second').html($('#center_m').html());
                $('#center_div').show();
                /* Insert the new ones from the array above */

            }else if($('#gender').val() === 'female'){
                $('#center_first').html($('#center_f').html());
                $('#center_second').html($('#center_f').html());
                $('#center_div').show();
                /* Insert the new ones from the array above */

            }else {
                $('#center_div').hide();
            }
        }


        $(document).ready(function () {

            nameCheck();
            contractCheck();


            //$('#IBAN').mask('SA00 0000 0000 0000 0000 0000');
            $('#IBAN').mask("SA0000000000000000000000", {
                'translation': {
                    0: {
                        pattern: /[A-Za-z0-9]/
                    },
                    'S':{
                        pattern: /[S/]/,
                        fallback: 'S'
                    },
                    'A':{
                        pattern: /[A/]/,
                        fallback: 'A'
                    }

                },placeholder: "SA"
            });
            $('.cellphone').mask("r00000000", {
                'translation': {
                    0: {
                        pattern: /[0-9*]/
                    },
                    'r':{
                        pattern: /[5/]/,
                        fallback: '5'
                    }

                },placeholder: "5XXXXXXXX"
            });
            $('.phone').mask("r00000000", {
                'translation': {
                    0: {
                        pattern: /[0-9*]/
                    },
                    'r':{
                        pattern: /[1/]/,
                        fallback: '1'
                    }

                },placeholder: "1XXXXXXXX"
            });
            $('#NID').mask("0000000000", {
                'translation': {
                    0: {
                        pattern: /[0-9*]/
                    },
                    /*'r':{
                        pattern: /[1|2|3/]/,
                        fallback: '1'
                    }*/

                },placeholder: "XXXXXXXXX"
            });
            nationalityOther();
            jobTitleOther();
            EmerRelationOther();
            el_exams();
            exams();
            centers();
            $('#center_m').hide();
            $('#center_f').hide();

            //$('#newRegForm').keypress(preventEnterSubmit(e));
            $(window).keydown(function(event){
                if(event.keyCode == 13) {
                    event.preventDefault();
                    return false;
                }
            });
        });

        var cal = new Calendar(true, 0, true, false),
                calMode = cal.isHijriMode();

        $(document).ready(function () {

            var date = document.getElementById('date');
            var birthDate = document.getElementById('birth_date');

            document.getElementById('cal').appendChild(cal.getElement());

            cal.callback = function() {
                setDateFields();
            };

            function setDateFields() {
                date.value = cal.getDate().getDateString();
                var g = (calMode === cal.isHijriMode()? cal.getDate().getGregorianDate()+"" : cal.getDate()+"");
                birthDate.value = g.substring(0,15);

            }
            $('#selectCalendar').change(function() {
                if($(this).val() == 'h'){
                    cal.changeDateMode();
                    calMode = cal.isHijriMode();
                    cal.show();
                }else if($(this).val() == 'g'){
                    cal.changeDateMode();
                    calMode = !cal.isHijriMode();
                    cal.show();
                }
            });




            $(document).on('keypress','#nid',function () {
                return lengthValidation(10,this);
            });
        });
    </script>
    @endsection