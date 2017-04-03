@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('facultyForm.title')}}</div>

                    <div class="panel-body ">
                        <div class="row">


                            <img src="{{asset('storage/uod_portal.jpg')}}" class="img-responsive" alt="portal">
                            <hr>
                            <h4 class="col-md-12 text-center">{{trans('facultyForm.email_intro')}}</h4>
                            <div class="col-md-12">

                                @include('errors.errors')
                                {{--@foreach($forms as $form)
                                    <a href="{{LaravelLocalization::getLocalizedURL(null,'/form/emr/'.$form->id.'/view')}}" class="btn btn-success btn-lg" role="button"><span class="glyphicon glyphicon-eye-open"></span> <br/>{{trans('facultyForm.viewApplication')}}</a>
                                @endforeach--}}
                                <div class="col col-md-6 col-md-offset-3">
                                {!! Form::open(['url' => '/form/facultyform/validate', 'method' => 'post']) !!}
                                <!--- Email Field --->
                                    <div class="form-group">
                                        {!! Form::label('email', trans('facultyForm.email').':') !!}
                                        {!! Form::text('email', null, ['class' => 'form-control']) !!}
                                        <small>{{trans('facultyForm.example')}}: username@uod.edu.sa {{trans('facultyForm.or')}} username@uohb.edu.sa</small>
                                    </div>
                                    <div align="center">
                                        {!! Recaptcha::render() !!}
                                    </div>
                                    <br>
                                    {!! Form::submit('إرسال', ['class' => 'form-control']) !!}
                                    {!! Form::close() !!}
                                    <a class="btn btn-block" href="{{url('/form/facultyform/pin')}}">{{trans('facultyForm.gotPinAlready')}}</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection