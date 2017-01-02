@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-11 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('regform.title')}}</div>

                    <div class="panel-body ">
                        <div class="row">


                            <img src="{{asset('storage/uod_portal.jpg')}}" class="img-responsive" alt="portal">
                            <hr>
                            <h4 class="col-md-12 text-center">{{trans('regform.valid_email_intro')}}</h4>
                            <div class="col-md-12">

                                <div class="col-md-12">
                                    @include('errors.errors')
                                    @include('errors.status')
                                </div>
                                {{--@foreach($forms as $form)
                                    <a href="{{LaravelLocalization::getLocalizedURL(null,'/form/facultyform/'.$form->id.'/view')}}" class="btn btn-success btn-lg" role="button"><span class="glyphicon glyphicon-eye-open"></span> <br/>{{trans('regform.viewApplication')}}</a>
                                @endforeach--}}
                                <div class="col col-md-6 col-md-offset-3">
                                {!! Form::open(['url' => '/form/facultyform/pinValidate', 'method' => 'post']) !!}
                                    <!--- Email Field --->
                                    <div class="form-group">
                                        {!! Form::label('email', trans('regform.email').':') !!}
                                        {!! Form::text('email', session('email') , ['class' => 'form-control']) !!}
                                    </div>
                                    <!--- Pin Field --->
                                    <div class="form-group">
                                        {!! Form::label('pin', trans('regform.pin').':') !!}
                                        {!! Form::text('pin', null, ['class' => 'form-control' , 'autofocus']) !!}
                                    </div>
                                    {!! Form::submit('تحقق', ['class' => 'form-control']) !!}
                                    <p></p>
                                    <a href="{{url('/form/facultyform')}}" type="button" class=" btn btn-block">إدخال بريد إلكتروني مختلف</a>
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