@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-12">
                <div class="panel panel-default">

                    <div class="panel-heading">{{' إضافة حساب جديد:'}}</div>

                    <div class="panel-body ">
                        <div class="row">

                            @include('errors.errors')
                            @include('errors.status')
                            <div class="col-md-12 newsletter-form">

                                {!! Form::open(['url' => '/cp/students/finance/account/AddNew', 'method' => 'post', 'files' => true ,'class'=>'newsletter-form' ]) !!}


                                <div class="row">

                                    <div class="col-md-6">
                                        <!--- NID  --->
                                        <div class="form-group">
                                            {!! Form::label('account_no','رقم الحساب:') !!}
                                            {!! Form::text('account_no', null, ['class' => 'form-control', 'required']) !!}

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                    <!--- SID  --->
                                        <div class="form-group">
                                            {!! Form::label('account_name','اسم الحساب:') !!}
                                            {!! Form::text('account_name', null, ['class' => 'form-control', 'required']) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-6">

                                    <!--- Gender  --->
                                        <div class="form-group">
                                            {!! Form::label('account_type','نوع الحساب:') !!}
                                            {!! Form::select('account_type' , array('' => 'اختر نوع الحساب', '216' => '2016', '217' => '2017', '218' => '2018', '219' => '2019', '202' => '2020', '221' => '2021'), null ,['class' => 'form-control', 'required']) !!}

                                        </div>
                                    </div>

                                </div>

                        <br>
                        <br>
                        {!! Form::submit('إضافة', ['class' => ' col-md-3']) !!}

                                    <a href="{{url('cp/students/finance/account')}}" class=" button col-md-3 ">رجوع</a>
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