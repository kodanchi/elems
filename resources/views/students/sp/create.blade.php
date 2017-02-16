@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('sp.applicants')}}</div>

                    <div class="panel-body ">
                        <div class="row">

                            @include('errors.errors')
                            <div class="col-md-12">

                                {!! Form::open(['url' => '/students/sp/new', 'method' => 'post', 'files' => true,'class'=>'newsletter-form']) !!}

                                <div class="row">
                                    <div class="col-md-6">
                                        <!--- Full name  --->
                                        <div class="form-group">
                                            {!! Form::label('name', trans('sp.name').':') !!}
                                            {{$student[0]->name}}
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <!--- SID  --->
                                        <div class="form-group">
                                            {!! Form::label('SID', trans('sp.sid').':') !!}
                                            {{$student[0]->sid}}
                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-md-6">
                                        <!--- NID  --->
                                        <div class="form-group">
                                            {!! Form::label('NID', trans('sp.nid').':') !!}
                                            {{$student[0]->nid}}
                                        </div>
                                    </div>


                                    <div class="col-md-6">

                                        <!--- Gender  --->
                                        <div class="form-group">
                                            {!! Form::label('gender', trans('sp.gender').':') !!}
                                            {{trans('studentGender.'.$student[0]->gender)}}
                                        </div>
                                    </div>



                                </div>

                                <div class="row">
                                    <div class="col-md-6">

                                        <!--- Course Name  --->
                                        <div class="form-group">
                                            {!! Form::label('course_name', trans('sp.course_name').':') !!}
                                            {{$course[0]->des}}
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <!--- Course Class --->
                                        <div class="form-group">
                                            {!! Form::label('course_class', trans('sp.course_class').':') !!}
                                            {{$course[0]->class_id}}
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <!--- Course Instructor name --->
                                        <div class="form-group">
                                            {!! Form::label('course_ins_name', trans('sp.course_ins_name').':') !!}
                                            {{$course[0]->name}}
                                        </div>
                                    </div>

                                        </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                        <!--- Reason Field --->
                                            <!--- reason Field --->
                                            <div class="form-group">
                                                {!! Form::label('reason', trans('sp.reason').':') !!}
                                                {!! Form::textarea('reason', null, ['class' => 'form-control']) !!}
                                            </div>
                                    </div>
                                    <div class="col-md-6">

                                        <!--- Exam date --->
                                        <div class="form-group">
                                            {!! Form::label('exam_date', trans('sp.exam_date').':') !!}
                                            {{$course[0]->date}} - الموافق
                                            {{$course[0]->higri_date}}
                                        </div>
                                    </div>

                                    <div class="col col-md-6">
                                        <!--- Upload Field --->
                                        <div class="form-group">
                                            {!! Form::label('attach', trans('sp.attach').':') !!}
                                            {!! Form::file('attach', ['class' => 'form-control','accept'=>'.pdf']) !!}
                                            <small>يرفق ملف pdf </small>
                                            <small class="red">الحجم المسموح: 4MB أو أقل</small>
                                        </div>
                                    </div>

                                </div>


                                <div class="col-md-12">
                                    <label>
                                        {!! Form::hidden('sp_date', '') !!}
                                        {!! Form::checkbox('agree', '1', null,  ['id' => 'agree']) !!}
                                        أوفق على الإدلاء بالمعلومات الصحيحة وأتحمل كامل المسؤولية في حال كانت المعلومات غير صحيحة
                                    </label>
                                </div>
                                </br>

                                {!! Form::submit('تقدم', ['class' => ' col-md-3']) !!}

                                    <a href="{{url('/students/sp/agree?agree=1')}}" class=" button col-md-3 ">رجوع</a>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="application/javascript">
        $(document).ready(function () {


            $('#SID').mask("r000000000", {
                'translation': {
                    0: {
                        pattern: /[0-9*]/
                    },
                    'r':{
                        pattern: /[2/]/,
                        fallback: '1'
                    }

                },placeholder: "2XXXXXXXX"
            });

            $('#NID').mask("r000000000", {
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


        });
    </script>
    @endsection