@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('conflict.applicants')}}</div>

                    <div class="panel-body ">
                        <div class="row">

                            @include('errors.errors')
                            <div class="col-md-12">


                                {!! Form::open(['url' => '/students/conflict/new', 'method' => 'post','class'=>'newsletter-form']) !!}

                                <div class="row">
                                    <div class="col-md-6">
                                        <!--- Full name Field --->
                                        <div class="form-group">
                                            {!! Form::label('name', trans('conflict.name').':') !!}
                                            {{$student[0]->name}}
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <!--- SID Field --->
                                        <div class="form-group">
                                            {!! Form::label('SID', trans('conflict.sid').':') !!}
                                            {{$student[0]->sid}}
                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-md-6">
                                        <!--- NID Field --->
                                        <div class="form-group">
                                            {!! Form::label('NID', trans('conflict.nid').':') !!}
                                            {{$student[0]->nid}}
                                        </div>
                                    </div>


                                    <div class="col-md-6">

                                        <!--- Gender Field --->
                                        <div class="form-group">
                                            {!! Form::label('gender', trans('conflict.gender').':') !!}
                                            {{trans('studentGender.'.$student[0]->gender)}}
                                        </div>
                                    </div>



                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <!--- Low Level First Subject Field --->
                                        <div class="form-group">
                                            {!! Form::label('low_lvl_first_subject', trans('conflict.low_lvl_first_subject').':') !!}
                                            {!! Form::select('low_lvl_first_subject', $courses , null , ['class' => 'form-control']) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <!--- First Subject Field --->
                                        <div class="form-group">
                                            {!! Form::label('first_subject', trans('conflict.first_subject').':') !!}
                                            {!! Form::select('first_subject', $courses , null , ['class' => 'form-control']) !!}
                                        </div>
                                    </div>

                                </div>


                                <div class="col-md-12">
                                    <label>
                                        {!! Form::hidden('conflict_date', $conflict_date) !!}
                                        {!! Form::checkbox('agree', '1', null,  ['id' => 'agree']) !!}
                                        أوفق على الإدلاء بالمعلومات الصحيحة وأتحمل كامل المسؤولية في حال كانت المعلومات غير صحيحة
                                    </label>
                                </div>
                                </br>

                                {!! Form::submit('تقدم', ['class' => ' col-md-3']) !!}

                                    <a href="{{url('/students/conflict/agree?agree=1')}}" class=" button col-md-3 ">رجوع</a>
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