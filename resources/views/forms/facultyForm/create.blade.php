@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">


                @include('errors.errors')


                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('facultyform.title')}}</div>

                    <div class="panel-body">

                        {!! Form::open(['url' => url('form/facultyform/add'), 'method' => 'post', 'files' => true,'id'=>'newfacultyform','class' => 'newsletter-form']) !!}
                        <h4>{{trans('facultyform.general_details')}}</h4>
                        <hr>
                        <div class="row">
                            @include('forms.facultyform.fname')
                            @include('forms.facultyform.faname')
                            @include('forms.facultyform.gfaname')
                            @include('forms.facultyform.lname')

                        </div>
                            <div class="row">
                                <div class="col col-md-6 ">
                                    <!--- NID Field --->
                                    <div class="form-group">
                                        {!! Form::label('NID', trans('facultyform.NID').':') !!}
                                        {!! Form::number('NID', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col col-md-6">
                                    <!--- Gender Field --->
                                    <div class="form-group">
                                        {!! Form::label('gender', trans('facultyform.gender').':') !!}
                                        {!! Form::select('gender', $gender, null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col col-md-6">

                                    <!--- Birth date Field --->
                                    <div class="form-group">
                                        {!! Form::label('date', trans('facultyform.birth_date').':') !!}
                                        {!! Form::select('selectCalendar', ['h' =>  trans('facultyform.hijri'),'g'=>  trans('facultyform.miladi')] , 'ummalqura' ,
                                     ['class' => 'form-control', 'id'=> 'selectCalendar']) !!}
                                        {!! Form::text('date', null, ['class' => 'form-control','onclick'=>'showCal();']) !!}
                                        {!! Form::hidden('birth_date', '',['id'=>'birth_date']) !!}
                                    </div>
                                        <div id="cal"></div>
                                </div>
                                <div class="col col-md-6">
                                    <!--- Nationality Field --->
                                    <div class="form-group">
                                        {!! Form::label('nationality', trans('facultyform.nationality').':') !!}
                                        {!! Form::select('nationality', $nationality, null, ['class' => 'form-control']) !!}
                                    </div>
                                    <div id="div_other_nationality" class="form-group">
                                        <!--- other_nationality Field --->
                                        <div class="form-group">
                                            {!! Form::label('other_nationality', trans('facultyform.specify').':') !!}
                                            {!! Form::text('other_nationality', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <!--- Cellphone Field --->
                                    <div class="form-group">
                                        {!! Form::label('cellphone', trans('facultyform.cellphone').':') !!}
                                        {!! Form::text('cellphone', null, ['class' => 'cellphone form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-md-6">
                                    <!--- Email Field --->
                                    <div class="form-group">
                                        {!! Form::label('email', trans('facultyform.email').':') !!}
                                        <p>{!! Session::get('email','NULL')!!}</p>

                                    </div>
                                </div>
                                <div class="col col-md-6">
                                    <!--- Phone Field --->
                                    <div class="form-group">
                                        {!! Form::label('phone', trans('facultyform.phone').':') !!}
                                        {!! Form::text('phone', null, ['class' => 'phone form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-md-6">
                                    <!--- Qualification Field --->
                                    <div class="form-group">
                                        {!! Form::label('qualification', trans('facultyform.qualification').':') !!}

                                        {!! Form::select('qualification', $qualification, null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col col-md-6">
                                    <!--- Upload Field --->
                                    <div class="form-group">
                                        {!! Form::label('qualification_identity_attach', trans('facultyform.qia').':') !!}
                                        {!! Form::file('qualification_identity_attach', ['class' => 'form-control','accept'=>'.pdf']) !!}
                                        <small>يرفق ملف pdf </small>
                                        <small class="red">الحجم المسموح: 4MB أو أقل</small>
                                    </div>
                                </div>
                                <div class="col col-md-6">
                                    <!--- Major Field --->
                                    <div class="form-group">
                                        {!! Form::label('major', trans('facultyform.major').':') !!}
                                        {!! Form::text('major', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-md-6">
                                    <!--- College/Department Field --->
                                    <div class="form-group">
                                        {!! Form::label('department', trans('facultyform.department').':') !!}
                                        {!! Form::text('department', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col col-md-6">
                                    <!--- Section Field --->
                                    <div class="form-group">
                                        {!! Form::label('section', trans('facultyform.section').':') !!}
                                        {!! Form::text('section', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col col-md-6">
                                    <!--- Employee ID Field --->
                                    <div class="form-group">
                                        {!! Form::label('employee_ID', trans('facultyform.employee_ID').':') !!}
                                        {!! Form::text('employee_ID', null, ['class' => 'form-control']) !!}
                                    </div>

                                </div>
                                <div class="col col-md-6">
                                    <!--- Job Title Field --->
                                    <div class="form-group">
                                        {!! Form::label('job_title', trans('facultyform.job_title').':') !!}
                                        {!! Form::select('job_title', $jobTitles ,null, ['class' => 'form-control']) !!}
                                    </div>
                                    <div id="div_other_job_title" class="form-group">
                                        <!--- other_job_title Field --->
                                        <div class="form-group">
                                            {!! Form::label('other_job_title', trans('facultyform.specify').':') !!}
                                            {!! Form::text('other_job_title', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-md-6">
                                    <!--- Supervisor Field --->
                                    <div class="form-group">
                                        {!! Form::label('supervisor', trans('facultyform.supervisor').':') !!}
                                        {!! Form::text('supervisor', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col col-md-6">
                                    <!--- Supervisor Phone Field --->
                                    <div class="form-group">
                                        {!! Form::label('su_phone', trans('facultyform.su_phone').':') !!}
                                        {!! Form::text('su_phone', null, ['class' => 'phone form-control']) !!}
                                    </div>
                                </div>



                            </div>
                            <div class="row">
                                <div class="col col-md-6">
                                    <!--- Supervisor Cellphone Field --->
                                    <div class="form-group">
                                        {!! Form::label('su_cellphone', trans('facultyform.su_cellphone').':') !!}
                                        {!! Form::text('su_cellphone', null, ['class' => 'cellphone form-control']) !!}
                                    </div>
                                </div>
                                <div class="col col-md-6">
                                    <!--- Supervisor Email Field --->
                                    <div class="form-group">
                                        {!! Form::label('su_email', trans('facultyform.su_email').':') !!}
                                        {!! Form::email('su_email', null, ['class' => 'form-control']) !!}
                                        <small>{{trans('facultyform.example')}}: username@uod.edu.sa {{trans('facultyform.or')}} username@uohb.edu.sa</small>
                                    </div>
                                </div>
                            </div>


                            <hr>
                            <h4>{{trans('facultyform.emergency_contacts_details')}}</h4>
                            <div class="row">

                                <div class="col col-md-6">

                                    <!--- Person Name Field --->
                                    <div class="form-group">
                                        {!! Form::label('emergency_name', trans('facultyform.emergency_name').':') !!}
                                        {!! Form::text('emergency_name', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col col-md-6">
                                    <!--- Relation Field --->
                                    <div class="form-group">
                                        {!! Form::label('emer_relation', trans('facultyform.emer_relation').':') !!}
                                        {!! Form::select('emer_relation', $relation , null , ['class' => 'form-control']) !!}
                                    </div>

                                    <div id="div_other_emer_relation" class="form-group">
                                        <!--- other_emer_relation Field --->
                                        <div class="form-group">
                                            {!! Form::label('other_emer_relation', trans('facultyform.specify').':') !!}
                                            {!! Form::text('other_emer_relation', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                </div>




                                <div class="col col-md-6">
                                    <!--- Person Cellphone Field --->
                                    <div class="form-group">
                                        {!! Form::label('emer_cellphone', trans('facultyform.emer_cellphone').':') !!}
                                        {!! Form::text('emer_cellphone', null, ['class' => 'cellphone form-control']) !!}
                                    </div>
                                </div>
                            </div>
                        <hr>
                        <h4>{{trans('facultyform.other_details')}}</h4>

                        <div class="row">
                            <div class="col col-md-6">
                                <!--- El Exams before Field --->
                                <div class="form-group">
                                    {!! Form::label('teach_Before', trans('facultyform.el_exams_Before').':') !!}
                                    {!! Form::select('teach_Before', $boolean , null , ['class' => 'form-control']) !!}
                                </div>


                            </div>
                            <div class="col col-md-6">
                                <!--- Exams before Field --->
                                <div class="form-group">
                                    {!! Form::label('skill_lvl', trans('facultyform.other_exams_Before').':') !!}
                                    {!! Form::select('skill_lvl', $multi_skills , null , ['class' => 'form-control']) !!}
                                </div>
                                <!--- Exams number Field --->
                                <div id="div_other" class="form-group">
                                    <!--- Exams number Field --->
                                    <div class="form-group">
                                        {!! Form::label('skill_other', trans('facultyform.specifyExams').':') !!}
                                        {!! Form::textarea('skill_other', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>




                        </div>

                        <hr>
                        <h4>{{trans('facultyform.job_identification')}}</h4>
                        <div class="row">

                            <div class="col col-md-12">

                                <div class="form-group">
                                    {!! Form::file('job_identity_attach', ['class' => 'form-control','accept'=>'.pdf']) !!}
                                    <small>يرفق ملف pdf حجم المسموح: 4MB أو أقل، ويمكن الحصول عليه من شؤون الموظفين أو من خلال الخدمات الإلكترونية</small>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <h4>{{trans('facultyForm.courses_details')}}</h4>
                        <div class="row">
                            <div class="col col-md-12">
                                <!--- Courses Field --->
                                <div class="form-group">
                                    {!! Form::label('courses', trans('facultyForm.select_courses').':') !!}
                                    {{ Form::select('courses[]', $coursesArr, null,['class' => 'form-control selectpicker','data-live-search'=> 'true','multiple'=>'multiple'])}}

                                    {{--<select name="courses" class="form-control selectpicker" title="{{trans('facultyForm.select_courses')}}" data-live-search="true" id="courses">
                                        {{$sbjct = ''}}
                                        {{$firstR = true}}

                                        @foreach($courses as $course)
                                            @if($course->lvl != $sbjct)
                                                <optgroup label="المستوى {{$course->lvl}}">
                                                {{$sbjct = $course->lvl}}


                                            @endif
                                                    <option value="{{$course->cid}}">{{$course->des}}</option>
                                             @if($course->lvl != $sbjct && !$firstR)
                                                </optgroup>
                                                @else
                                                {{ $firstR = false}}
                                            @endif
                                        @endforeach
                                    </select>--}}
                                    <small>للإطلاغ على وصف المقررات <a
                                                href="{{url('http://www.uod.edu.sa/ar/colleges/college-of-applied-studies-and-community-service/programs/business-administration')}}" target="_blank">أضغط هنا</a></small>



                                </div>
                            </div>
                        </div>
                        <div class="row">
                            {!! Form::hidden('email', Session::get('email'), ['id' => 'email']) !!}
                                {!! Form::submit(trans('facultyform.submit'), ['class' => ' col-md-3']) !!}
                                <a href="{{url('/form')}}" class="button">{{trans('facultyform.cancel')}}</a>

                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">


        $('input[type=checkbox][name=sameName]').change(nameCheck);

        //$('input[type=checkbox][name=is_contract]').change(contractCheck);

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
        $('#teach_Before').change(function () {
            el_exams();
            $('#el_exams_num').focus();
        });
        $('#skill_lvl').change(function () {
            exams();
            $('#other').focus();
        });
        $('#gender').change(function () {
            centers();
            //$('#other').focus();
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

        /*function contractCheck() {
            if($('#is_contract').is(':checked')){
                $('#employee_ID').val('');
                $('#employee_ID').prop('disabled',true);
            }else {
                $('#employee_ID').prop('disabled',false);
            }
        }*/



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
            if($('#teach_Before').val() === '1'){
                if($('#el_exams_num').val() === '0') $('#el_exams_num').val('');
                $('#div_el_exams_num').show();
            }else {
                $('#el_exams_num').val('0');
                $('#div_el_exams_num').hide();
            }
        }


        function exams() {
            if($('#skill_lvl').val() === 'other'){
                if($('#other').val() === '0') $('#other').val('');
                $('#div_other').show();
            }else {
                $('#other').val('0');
                $('#div_other').hide();
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
            //contractCheck();


            $('.selectpicker')
                    .dropdown()
            ;

            //$('#IBAN').mask('SA00 0000 0000 0000 0000 0000');
            $('#IBAN').mask("SA0000000000000000000000", {
                'translation': {
                    0: {
                        pattern: /[0-9*]/
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
                    'r':{
                        pattern: /[1/]/,
                        fallback: '1'
                    }

                },placeholder: "XXXXXXXXXX"
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



/*
            $(document).on('keypress','#nid',function () {
                return lengthValidation(10,this);
            });*/
        });
    </script>
    @endsection