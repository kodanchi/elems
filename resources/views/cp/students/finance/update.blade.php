@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">تحديث بيانات الطالب</div>

                    <div class="panel-body ">
                        <div class="row">

                            @include('errors.status')
                            @include('errors.errors')
                            <div class="col-md-12 newsletter-form">

                                {!! Form::model($student, array('action' => array('FinanceController@UpdateIndex', $student->student_id))) !!}

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
                                            {!! Form::select('gender' , array('M' => 'Male', 'F' => 'Female'), null ,['class' => 'form-control', 'required']) !!}

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
                                            {!! Form::select('major' , array('ABADL' => 'ABADL', 'ISLDL' => 'ISLDL' ,'SOCDL' => 'SOCDL'), null ,['class' => 'form-control', 'required']) !!}

                                        </div>
                                    </div>
                                </div>

                                <div class="row">


                                    <div class="col-md-6">
                                        <!--- Select Field --->
                                        <div class="form-group">
                                            {!! Form::label('discount', 'نوع الخصم:') !!}
                                            {!! Form::select('discount' , array('0' => 'كامل المبلغ', '0.50' => 'نصف المبلغ' ,'1' => 'لايوجد خصم'  ), null ,['class' => 'form-control', 'required']) !!}
                                        </div>
                                    </div>

                                </div>



                                <br>
                                <br>
                                {!! Form::submit('تحديث', ['class' => ' col-md-3']) !!}

                                <a href="{{url('cp/students/finance')}}" class=" button col-md-3 ">رجوع</a>
                                {!! Form::close() !!}
                            </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection