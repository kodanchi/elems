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
                            <h4 class="col-md-12 text-center">{{trans('regform.email_intro')}}</h4>
                            <div class="col-md-12">

                                @include('errors.errors')
                                {{--@foreach($forms as $form)
                                    <a href="{{LaravelLocalization::getLocalizedURL(null,'/form/emr/'.$form->id.'/view')}}" class="btn btn-success btn-lg" role="button"><span class="glyphicon glyphicon-eye-open"></span> <br/>{{trans('regform.viewApplication')}}</a>
                                @endforeach--}}
                                <div class="col col-md-6 col-md-offset-3">
                                {!! Form::open(['url' => '/form/emr/validate', 'method' => 'post']) !!}
                                <!--- Email Field --->
                                    <div class="form-group">
                                        {!! Form::label('email', trans('regform.email').':') !!}
                                        {!! Form::text('email', null, ['class' => 'form-control']) !!}
                                    </div>
                                    {!! Form::submit('إرسال', ['class' => 'form-control']) !!}
                                    {!! Form::close() !!}
                                    <a class="btn btn-block" href="{{url('/form/emr/pin')}}">{{trans('regform.gotPinAlready')}}</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection