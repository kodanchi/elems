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
                            <h4 class="col-md-12">{{trans('regform.email_inrto')}}</h4>
                            <div class="col-md-12">

                                <div class="col-md-12">
                                    @include('errors.errors')
                                    @include('errors.status')
                                </div>
                                {{--@foreach($forms as $form)
                                    <a href="{{LaravelLocalization::getLocalizedURL(null,'/form/emr/'.$form->id.'/view')}}" class="btn btn-success btn-lg" role="button"><span class="glyphicon glyphicon-eye-open"></span> <br/>{{trans('regform.viewApplication')}}</a>
                                @endforeach--}}
                                <div class="col col-md-6 col-md-offset-3">
                                {!! Form::open(['url' => '/form/emr/pinValidate', 'method' => 'post']) !!}
                                    <!--- Email Field --->
                                    <div class="form-group">
                                        {!! Form::label('email', 'Email:') !!}
                                        {!! Form::text('email', session('email') , ['class' => 'form-control']) !!}
                                    </div>
                                    <!--- Pin Field --->
                                    <div class="form-group">
                                        {!! Form::label('pin', 'PIN:') !!}
                                        {!! Form::text('pin', null, ['class' => 'form-control' , 'autofocus']) !!}
                                    </div>
                                    {!! Form::submit('تحقق', ['class' => 'form-control']) !!}

                                    {!! Form::close() !!}
                                    </br>
                                    <input href="/form/emr" class=" form-control btn" value="إدخال بريد إلكتروني مختلف"/>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection