@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                @include('errors.errors')

                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('exams.newExamDay')}}</div>

                    <div class="panel-body">

                        {!! Form::open(['url' => LaravelLocalization::getLocalizedURL(null,'cp/exams'), 'method' => 'post','id'=>'newRegForm','class' => 'newsletter-form']) !!}

                         <div class="row">
                                <div class="col col-md-6 ">
                                    <!--- Major Field --->
                                    <div class="form-group">
                                        {!! Form::label('major', trans('exams.major').':') !!}
                                        {!! Form::select('major', $majors , null , ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col col-md-6">
                                    <!--- Date Field --->
                                    <div class="form-group">
                                        {!! Form::label('date', trans('exams.date').':') !!}
                                        {!! Form::date('date', null, ['class' => 'form-control']) !!}
                                    </div>

                                </div>
                          </div>

                        <div class="row">
                            <div class="col col-md-6">
                                <!--- course Field --->
                                <div class="form-group">
                                    {!! Form::label('cid', trans('exams.course').':') !!}
                                    {!! Form::select('cid', $courses , null , ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col col-md-6">
                                <!--- Level Field --->
                                <div class="form-group">
                                    {!! Form::label('lvl', trans('exams.lvl').':') !!}
                                    {!! Form::selectRange('lvl', 1, 9 , null , ['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="col col-md-6">
                                <!--- Term Field --->
                                <div class="form-group">
                                    {!! Form::label('term', trans('exams.term').':') !!}
                                    {!! Form::selectRange('term', 20161, 20163 , null , ['class' => 'form-control']) !!}
                                </div>
                            </div>

                            </div>



                        <div class="row">
                            <div class="col col-md-6">
                                {!! Form::hidden('email', Session::get('email'), ['id' => 'email']) !!}
                                {!! Form::submit(trans('regform.add'), ['class' => ' col-md-3']) !!}

                                <a href="{{url('cp/exams')}}" class="button">{{trans('regform.cancel')}}</a>
                            </div>

                        </div>
                        {!! Form::close() !!}
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    @endsection