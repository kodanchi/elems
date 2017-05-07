@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            @include('errors.errors')

            <div class="col-md-6 col-md-offset-3">



                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('regform.evaluate')}}</div>

                    <div class="panel-body ">
                        <div class="row">


                            <div class="col-md-12 newsletter-form">
                            {!! Form::open(['url' => '/cp/form/emr/evaluation', 'method' => 'post']) !!}

                                <!--- NID Field --->
                                <div class="form-group">
                                    {!! Form::label('nid', 'رقم الهوية/الإقامة:') !!}
                                    {!! Form::text('nid', null, ['class' => 'form-control']) !!}
                                </div>
                                <!--- ID Field --->
                                <div class="form-group">
                                    {!! Form::label('id', 'رقم المراقب:') !!}
                                    {!! Form::text('id', null, ['class' => 'form-control']) !!}
                                </div>
                                {!! Form::submit('تحقق', ['class' => 'form-control']) !!}
                                @if(Auth::user()->getRole() == 'admin')
                                    <a href="{{url('cp/form/emr/evaluation/export')}}" class=" form-control button">{{trans('cp.export_res')}}</a>
                                    @endif
                                <hr>

                             {{--   <a href="/cp/exams/services/home" class="button col-md-12">{{trans('settings.back')}}</a>--}}
                                {!! Form::close() !!}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection