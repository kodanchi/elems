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
                            <h4 class="col-md-12">{{trans('regform.intro')}}</h4>
                            <div class="col-md-12">
                                @include('errors.status')
                                {{--@foreach($forms as $form)
                                    <a href="{{LaravelLocalization::getLocalizedURL(null,'/form/emr/'.$form->id.'/view')}}" class="btn btn-success btn-lg" role="button"><span class="glyphicon glyphicon-eye-open"></span> <br/>{{trans('regform.viewApplication')}}</a>
                                @endforeach--}}
                                <a href="{{LaravelLocalization::getLocalizedURL(null,'/form/emr/new')}}" class="btn btn-primary btn-lg" role="button"><span class="glyphicon glyphicon-plus"></span> <br/>{{trans('regform.submitNow')}}</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection