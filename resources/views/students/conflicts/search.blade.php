@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('conflict.applicants')}}</div>

                    <div class="panel-body ">
                        <div class="row">

                            @include('errors.errors')
                            <div class="col-md-12">

                                {!! Form::open(['url' => '/students/conflict/search', 'method' => 'post','class'=>'newsletter-form']) !!}


                                <div class="row">
                                    <div class="col-md-6">

                                        <!--- Major Field --->
                                        <div class="form-group">
                                            {!! Form::label('major', trans('exams.major').':') !!}
                                            <p>{{trans('majorCodes.'.$major->major)}}</p>
                                        </div>
                                    </div>

                                    <div class="col-md-6">

                                        <!--- Date Field --->
                                        <div class="form-group">
                                            {!! Form::label('date', trans('exams.date').':') !!}
                                            {!! Form::select('date', $dates , null , ['class' => 'form-control']) !!}
                                        </div>
                                    </div>

                                </div>

                                {!! Form::submit('التالي', ['class' => ' col-md-3']) !!}

                                    <a href="{{url('/students/conflict')}}" class=" button col-md-3 ">رجوع</a>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection