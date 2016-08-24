@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">


                @if(count($errors) > 0)
                    <ul class="list-group">
                        @foreach($errors->all() as $error)
                            <li class="list-group-item list-group-item-danger">{{$error}}</li>
                        @endforeach

                    </ul>
                @endif


                <div class="panel panel-default">
                    <div class="panel-heading">التسجيل في مراقبة اختبارات التعليم عن بعد</div>

                    <div class="panel-body">

                        {!! Form::open(['url' => 'form/add', 'method' => 'post', 'files' => true,'id'=>'newRegForm']) !!}
                        <h4>General Details</h4>
                        <hr>
                            <div class="row">
                                <div class="col col-md-6">
                                    <!--- NID Field --->
                                    <div class="form-group">
                                        {!! Form::label('NID', 'National/Eqama ID:') !!}
                                        {!! Form::number('NID', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-md-3">
                                    <!--- first name Field --->
                                    <div class="form-group">
                                        {!! Form::label('fname', 'First name:') !!}
                                        {!! Form::text('fname', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col col-md-3">
                                    <!--- father name Field --->
                                    <div class="form-group">
                                        {!! Form::label('faname', 'Father name:') !!}
                                        {!! Form::text('faname', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col col-md-3">
                                    <!--- grand father name Field --->
                                    <div class="form-group">
                                        {!! Form::label('gfaname', 'Grand father name:') !!}
                                        {!! Form::text('gfaname', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col col-md-3">
                                    <!--- last name Field --->
                                    <div class="form-group">
                                        {!! Form::label('lname', 'Last name:') !!}
                                        {!! Form::text('lname', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-md-6">

                                    <!--- Birth date Field --->
                                    <div class="form-group">
                                        {!! Form::label('date', 'Birth date:') !!}
                                        {!! Form::select('selectCalendar', ['h' => 'هجري','g'=> 'ميلادي'] , 'ummalqura' ,
                                     ['class' => 'form-control', 'id'=> 'selectCalendar']) !!}
                                        {!! Form::text('date', null, ['class' => 'form-control','onclick'=>'showCal();']) !!}
                                        {!! Form::hidden('birth_date', '',['id'=>'birth_date']) !!}
                                    </div>
                                        <div id="cal"></div>
                                </div>
                                <div class="col col-md-6">
                                    <!--- Nationality Field --->
                                    <div class="form-group">
                                        {!! Form::label('nationality', 'Nationality:') !!}
                                        {!! Form::select('nationality', $nationality, null, ['class' => 'form-control']) !!}
                                    </div>
                                    <div id="div_other_nationality" class="form-group">
                                        <!--- other_nationality Field --->
                                        <div class="form-group">
                                            {!! Form::label('other_nationality', 'Specify:') !!}
                                            {!! Form::text('other_nationality', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <!--- Cellphone Field --->
                                    <div class="form-group">
                                        {!! Form::label('cellphone', 'Cellphone:') !!}
                                        {!! Form::text('cellphone', null, ['class' => 'cellphone form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-md-6">
                                    <!--- Email Field --->
                                    <div class="form-group">
                                        {!! Form::label('email', 'Email:') !!}
                                        {!! Form::email('email', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col col-md-6">
                                    <!--- Phone Field --->
                                    <div class="form-group">
                                        {!! Form::label('phone', 'Phone:') !!}
                                        {!! Form::text('phone', null, ['class' => 'phone form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-md-6">
                                    <!--- Qualification Field --->
                                    <div class="form-group">
                                        {!! Form::label('qualification', 'Qualification:') !!}
                                        {!! Form::text('qualification', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col col-md-6">
                                    <!--- Major Field --->
                                    <div class="form-group">
                                        {!! Form::label('major', 'Major:') !!}
                                        {!! Form::text('major', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-md-6">
                                    <!--- College/Department Field --->
                                    <div class="form-group">
                                        {!! Form::label('department', 'College/Department:') !!}
                                        {!! Form::text('department', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col col-md-6">
                                    <!--- Section Field --->
                                    <div class="form-group">
                                        {!! Form::label('section', 'Section:') !!}
                                        {!! Form::text('section', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-md-6">
                                    <!--- Employee ID Field --->
                                    <div class="form-group">
                                        {!! Form::label('employee_ID', 'Employee ID:') !!}
                                        {!! Form::text('employee_ID', null, ['class' => 'form-control','placeholder'=>'in case of contract job leave it empty']) !!}
                                    </div>
                                    <label>
                                    	{!! Form::checkbox('is_contract', '1', null,  ['id' => 'is_contract']) !!}
                                    	Contract job?
                                    </label>
                                </div>
                                <div class="col col-md-6">
                                    <!--- Job Title Field --->
                                    <div class="form-group">
                                        {!! Form::label('job_title', 'Job Title:') !!}
                                        {!! Form::select('job_title', $jobTitles ,null, ['class' => 'form-control']) !!}
                                    </div>
                                    <div id="div_other_job_title" class="form-group">
                                        <!--- other_job_title Field --->
                                        <div class="form-group">
                                            {!! Form::label('other_job_title', 'Specify:') !!}
                                            {!! Form::text('other_job_title', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-md-6">
                                    <!--- Supervisor Field --->
                                    <div class="form-group">
                                        {!! Form::label('supervisor', 'Supervisor Name:') !!}
                                        {!! Form::text('supervisor', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col col-md-6">
                                    <!--- Supervisor Phone Field --->
                                    <div class="form-group">
                                        {!! Form::label('su_phone', 'Supervisor Phone:') !!}
                                        {!! Form::text('su_phone', null, ['class' => 'phone form-control']) !!}
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col col-md-6">
                                    <!--- Supervisor Cellphone Field --->
                                    <div class="form-group">
                                        {!! Form::label('su_cellphone', 'Supervisor Cellphone:') !!}
                                        {!! Form::text('su_cellphone', null, ['class' => 'cellphone form-control']) !!}
                                    </div>
                                </div>
                            </div>

                            <h4>Bank Details</h4>
                            <hr>
                            <div class="row">
                                <div class="col col-md-12">
                                    <!--- IBAN Field --->
                                    <div class="form-group">
                                        {!! Form::label('IBAN', 'IBAN:') !!}
                                        {!! Form::text('IBAN', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-md-6">
                                    <!--- Bank Name Field --->
                                    <div class="form-group">
                                        {!! Form::label('bank_name', 'Bank Name:') !!}
                                        {!! Form::text('bank_name', null, ['class' => 'form-control']) !!}
                                    </div>

                                </div>
                                <div class="col col-md-6">
                                    <div class="row">
                                        <!--- Account holder name Field --->
                                        <div class="form-group">
                                            {!! Form::label('account_holder_name', 'Account holder name:') !!}
                                            {!! Form::text('account_holder_name', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col col-md-8">
                                            <label>{!! Form::checkbox('sameName', '1', null,  ['id' => 'sameName']) !!}Himself?</label>
                                        </div>

                                    </div>


                                </div>
                            </div>

                            <h4>Emergency contacts details</h4>
                            <hr>
                            <div class="row">
                                <div class="col col-md-6">
                                    <!--- Person Name Field --->
                                    <div class="form-group">
                                        {!! Form::label('emergency_name', 'Person Name:') !!}
                                        {!! Form::text('emergency_name', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col col-md-6">
                                    <!--- Relation Field --->
                                    <div class="form-group">
                                        {!! Form::label('emer_relation', 'Relation:') !!}
                                        {!! Form::select('emer_relation', $relation , null , ['class' => 'form-control']) !!}
                                    </div>

                                    <div id="div_other_emer_relation" class="form-group">
                                        <!--- other_emer_relation Field --->
                                        <div class="form-group">
                                            {!! Form::label('other_emer_relation', 'Specify:') !!}
                                            {!! Form::text('other_emer_relation', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="col col-md-6">
                                    <!--- Person Cellphone Field --->
                                    <div class="form-group">
                                        {!! Form::label('emer_cellphone', 'Person Cellphone:') !!}
                                        {!! Form::text('emer_cellphone', null, ['class' => 'cellphone form-control']) !!}
                                    </div>
                                </div>
                            </div>
                        <h4>Job Identification</h4>
                        <div class="row">
                            <div class="col col-md-12">
                                <div class="form-group">
                                    {!! Form::file('job_identity_file', ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-md-3">
                                {!! Form::submit('Submit', ['class' => 'form-control btn btn-primary']) !!}
                            </div>
                            <div class="col col-md-3">

                                <a href="{{url('/form')}}" class="btn btn-default">Cancel</a>
                            </div>
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


        $(document).ready(function () {

            nameCheck();
            contractCheck();


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
            nationalityOther();
            jobTitleOther();
            EmerRelationOther();

            //$('#newRegForm').keypress(preventEnterSubmit(e));
            $(window).keydown(function(event){
                if(event.keyCode == 13) {
                    event.preventDefault();
                    return false;
                }
            });
        });

        /*var uCal = $.calendars.instance('ummalqura');
        var gCal = $.calendars.instance('gregorian');
        $('#birth_date').calendarsPicker({
            calendar: uCal,
            minDate: uCal.newDate(1325, 1, 1),
            maxDate: uCal.newDate(1425, 12, 29), showTrigger: '#calImg'});

        $(document).ready(function () {

        });*/
        /*$('input[type=radio][name=calendarType]').change(function () {
            if(this.value == 'uq'){

            }else if(this.value == 'en'){

            }
        });*/

        /*$('#selectCalendar').change(function() {
            calendar = $.calendars.instance($(this).val());
            var convert = function(value) {
                return (!value || typeof value != 'object' ? value :
                        calendar.fromJD(value.toJD()));
            };
            $('.is-calendarsPicker').each(function() {
                var current = $(this).calendarsPicker('option');
                $(this).calendarsPicker('option', {calendar: calendar,
                    onSelect: null, onChangeMonthYear: null,
                    defaultDate: convert(current.defaultDate),
                    minDate: convert(current.minDate),
                    maxDate: convert(current.maxDate)}).
                calendarsPicker('option',
                        {onSelect: current.onSelect,
                            onChangeMonthYear: current.onChangeMonthYear});
            });
        });*/

    </script>
    @endsection