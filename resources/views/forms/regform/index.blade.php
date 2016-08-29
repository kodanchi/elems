@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-11 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('regform.title')}}</div>

                    <div class="panel-body ">
                        <div class="row">
                            @include('errors.status')
                            <div class="col-md-12">
                                @foreach($forms as $form)
                                    <a href="{{LaravelLocalization::getLocalizedURL(null,'/form/emr/'.$form->id.'/view')}}" class="btn btn-danger btn-lg" role="button"><span class="glyphicon glyphicon-eye-open"></span> <br/>View application</a>
                                @endforeach
                                <a href="{{LaravelLocalization::getLocalizedURL(null,'/form/emr/new')}}" class="btn btn-primary btn-lg" role="button"><span class="glyphicon glyphicon-plus"></span> <br/>Submit now</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection