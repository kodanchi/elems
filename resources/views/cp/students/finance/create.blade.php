@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-12">
                <div class="panel panel-default">

                    <div class="panel-heading">{{'نموذج إضافة بيانات طالب:'}}</div>

                    <div class="panel-body ">
                        <div class="row">

                            @include('errors.errors')
                            <div class="col-md-12 newsletter-form">

                                {!! Form::open(['url' => '/cp/students/finance/create/AddNew', 'method' => 'post', 'files' => true ,'class'=>'newsletter-form' ]) !!}

                                <div class="row">
                                    <div class="col-md-6">
                                        <!--- Full name  --->
                                        <div class="form-group">
                                            {!! Form::label('name', trans('objection.name').':') !!}
                                            {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <!--- SID  --->
                                        <div class="form-group">
                                            {!! Form::label('student_id', trans('objection.sid').':') !!}
                                            {!! Form::text('student_id', null, ['class' => 'form-control', 'required']) !!}
                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-md-6">
                                        <!--- NID  --->
                                        <div class="form-group">
                                            {!! Form::label('national_id', trans('objection.nid').':') !!}
                                            {!! Form::text('national_id', null, ['class' => 'form-control', 'required']) !!}
                                        </div>
                                    </div>


                                    <div class="col-md-6">

                                        <!--- Gender  --->
                                        <div class="form-group">
                                            {!! Form::label('gender', trans('objection.gender').':') !!}
                                            {!! Form::select('gender' , array('' => 'اختر الجنس', 'M' => 'Male', 'F' => 'Female'), null ,['class' => 'form-control', 'required']) !!}

                                        </div>
                                    </div>



                                </div>


                                <div class="row">



                                    <div class="col-md-6">
                                        <!--- Select Field --->
                                        <div class="form-group">
                                            {!! Form::label('balance', 'المستحق:') !!}
                                            {!! Form::text('balance',null ,['class' => 'form-control', 'required']) !!}
                                        </div>
                                    </div>




                                    <div class="col-md-6">
                                        <!--- Select Field --->
                                        <div class="form-group">
                                            {!! Form::label('major', 'التخصص :') !!}
                                            {!! Form::select('major' , array('' => 'اختر التخصص', 'ABADL' => 'ABADL', 'ISLDL' => 'ISLDL' ,'SOCDL' => 'SOCDL'), null ,['class' => 'form-control', 'required']) !!}

                                        </div>
                                    </div>
                                </div>

                                <div class="row">


                                    <div class="col-md-6">
                                        <!--- Select Field --->
                                        <div class="form-group">
                                            {!! Form::label('discount', 'نوع الخصم:') !!}
                                            {!! Form::select('discount' , array('' => 'اختر نوع الخصم', '0' => 'كامل المبلغ', '0.50' => 'نصف المبلغ' ,'1' => 'لايوجد خصم'  ), null ,['class' => 'form-control', 'required']) !!}
                                        </div>
                                    </div>

                                </div>



                        <br>
                        <br>
                        {!! Form::submit('تقدم', ['class' => ' col-md-3']) !!}

                                    <a href="{{url('cp/students/finance')}}" class=" button col-md-3 ">رجوع</a>
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