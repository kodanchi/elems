@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('sp.pin_chk')}}</div>

                    <div class="panel-body ">
                        <div class="row">

                            @include('errors.errors')
                            <div class="col-md-12">
                                {!! Form::open(['url' => '/students/objection/validate', 'method' => 'post','class'=>'newsletter-form']) !!}

                                    <!--- email Field --->
                                    <div class="form-group" >
                                        {!! Form::label('email', trans('objection.email').':') !!}
                                        {!! Form::text('email', $email, ['class' => 'form-control', 'dir'=>'ltr']) !!}
                                    </div>
                                    <!--- PIN Field --->
                                    <div class="form-group">
                                        {!! Form::label('pin', 'رمز الدخول:') !!}
                                        {!! Form::text('pin', null, ['class' => 'form-control']) !!}
                                    </div>
                                    {!! Form::submit('تحقق', ['class' => 'form-control']) !!}
                                    <p></p>
                                    <a href="{{url('/students/objection')}}" type="button" class="button form-control">إدخال رقم اكاديمي مختلف</a>
                                {!! Form::close() !!}

                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @endsection