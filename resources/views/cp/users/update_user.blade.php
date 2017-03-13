@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-11 col-md-offset-1">


                @include('errors.errors')
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('cp.updateUser')}}</div>

                    <div class="panel-body ">

                        {!! Form::model($user, array('action' => array('CPController@userUpdate', $user->id))) !!}

                            <!--- Role Field --->
                            <div class="form-group">
                                {!! Form::label('role', trans('cp.role').':') !!}
                                {!! Form::select('role', trans('cp.roles') , null , ['class' => 'form-control']) !!}
                            </div>
                            <!--- Name Field --->
                            <div class="form-group">
                                {!! Form::label('name', trans('cp.name').':') !!}
                                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            </div>
                            <!--- Email Field --->
                            <div class="form-group">
                                {!! Form::label('email', trans('cp.email').':') !!}
                                {!! Form::email('email', null, ['class' => 'form-control']) !!}
                            </div>

                        <div class="">
                            {!! Form::submit(trans('cp.update'), ['class' => 'btn btn-primary ']) !!}
                            <a href="{{LaravelLocalization::getLocalizedURL(null,'/cp/users/')}}"
                               class="btn btn-default">{{trans('cp.cancel')}}</a>
                        </div>
                            {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection