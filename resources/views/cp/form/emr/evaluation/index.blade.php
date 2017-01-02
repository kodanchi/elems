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


                            <div class="col-md-12">
                            {!! Form::open(['url' => '/cp/form/emr/evaluation', 'method' => 'post']) !!}

                                <!--- NID Field --->
                                <div class="form-group">
                                    {!! Form::label('nid', 'رقم الهوية/الإقامة:') !!}
                                    {!! Form::text('nid', null, ['class' => 'form-control']) !!}
                                </div>
                                {!! Form::submit('تحقق', ['class' => 'form-control']) !!}
                                {!! Form::close() !!}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection