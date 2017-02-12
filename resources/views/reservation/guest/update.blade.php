@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-7 col-md-offset-3">
                @include('errors.errors')
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('warehouse.existGuest')}} </div>


                    <div class="panel-body newsletter-form ">

                        {!! Form::model($user, ['url' => ['reservation/guest/update', $user->id], 'method' => 'patch']) !!}


                            <!--- NID Field --->
                            <div class="form-group">
                                {!! Form::label('NID', trans('warehouse.NID').':') !!}
                                {!! Form::number('NID', null, ['class' => 'form-control']) !!}
                            </div>

                            <!--- Email Field --->
                            <div class="form-group">
                                {!! Form::label('email', trans('warehouse.email').':') !!}
                                {!! Form::email('email', null, ['class' => 'form-control']) !!}
                            </div>


                            <!--- Name Field --->
                            <div class="form-group">
                                {!! Form::label('name',  trans('warehouse.name').':') !!}
                                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            </div>


                            <!--- Phone Field --->
                            <div class="form-group">
                                {!! Form::label('phone',trans('warehouse.phone').':') !!}
                                {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                            </div>


                            <!--- Gender Field --->
                            <div class="form-group">
                                {!! Form::label('gender', trans('warehouse.gender').':') !!}
                                {!! Form::select('gender', trans('gender'), null, ['class' => 'form-control']) !!}
                            </div>

                            <!--- occupation Field --->
                            <div class="form-group">
                                {!! Form::label('occupation', trans('warehouse.occupation').':') !!}
                                {!! Form::text('occupation', null, ['class' => 'form-control']) !!}
                            </div>

                            <label>
                                {!! Form::checkbox('agree', '1', null,  ['id' => 'agree']) !!}
                                أوفق على الإدلاء بالمعلومات الصحيحة وأتحمل كامل المسؤولية في حال كانت المعلومات غير صحيحة
                            </label>

                            <div class="col-md-6">
                                {!! Form::submit('التالي', ['class' => 'form-control']) !!}
                            </div>
                            <div class="col-md-6">
                                <a href="{{url('reservation/new')}}" class="form-control button">رجوع</a>
                            </div>

                        {!! Form::close() !!}


                        </div>




                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection