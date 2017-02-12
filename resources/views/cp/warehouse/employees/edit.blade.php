@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-7 col-md-offset-3">
                @include('errors.errors')
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('warehouse.editEmp')}} </div>


                    <div class="panel-body newsletter-form ">

                        {!! Form::model($user, ['url' => ['cp/warehouse/employees/update', $user->id], 'method' => 'Patch']) !!}


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

                            <div class="col-md-6">
                                {!! Form::submit('تعديل', ['class' => 'form-control']) !!}
                            </div>
                            <div class="col-md-6">
                                <a href="{{url('cp/warehouse/')}}" class="form-control button">رجوع</a>
                            </div>

                        {!! Form::close() !!}


                        </div>




                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection