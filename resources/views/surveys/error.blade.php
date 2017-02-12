@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('surveys.error')}}</div>

                    <div class="panel-body ">
                        <div class="row">

                            @include('errors.errors')

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection