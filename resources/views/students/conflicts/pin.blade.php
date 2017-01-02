@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('conflict.pin_chk')}}</div>

                    <div class="panel-body ">
                        <div class="row">

                            @include('errors.errors')
                            @include('errors.status')
                            <div class="col-md-12">
                                {!! Form::open(['url' => '/students/conflict/validate', 'method' => 'post','class'=>'newsletter-form']) !!}

                                    <!--- email Field --->
                                    <div class="form-group">
                                        {!! Form::label('email', trans('conflict.email').':') !!}
                                        {!! Form::text('email', $email, ['class' => 'form-control']) !!}
                                    </div>
                                    <!--- PIN Field --->
                                    <div class="form-group">
                                        {!! Form::label('pin', 'رمز الدخول:') !!}
                                        {!! Form::text('pin', null, ['class' => 'form-control']) !!}
                                    </div>
                                    {!! Form::submit('تحقق', ['class' => 'form-control']) !!}
                                    <p></p>
                                    <a href="{{url('/students/conflict')}}" type="button" class="button form-control">إدخال رقم اكاديمي مختلف</a>
                                {!! Form::close() !!}

                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @endsection