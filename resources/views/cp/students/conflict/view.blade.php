@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('students.applicants')}}</div>

                    <div class="panel-body ">
                        <div class="row">

                            @include('errors.status')
                            @include('errors.errors')
                            <div class="col-md-12 newsletter-form">
                                <h4>{{trans('conflict.fid')}}: {{$form->fid}}</h4>

                                <hr>

                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>{{trans('conflict.sid')}}: {{$form->SID}} </h5>
                                    </div>

                                    <div class="col-md-6">
                                        <h5>{{trans('conflict.name')}}: {{$form->name}} </h5>
                                    </div>

                                    <div class="col-md-6">
                                        <h5>{{trans('conflict.exams_center')}}: {{$form->exams_center}}</h5>
                                    </div>

                                    <div class="col-md-6">
                                        <h5>{{trans('conflict.gender')}}: {{$form->gender}}</h5>
                                    </div>

                                </div>

                                <hr>
                                <h4>{{trans('conflict.con_des')}}</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>{{trans('conflict.low_lvl_first_subject')}}: {{$form->low_lvl_first_subject}}</h5>
                                    </div>

                                    <div class="col-md-6">
                                        <h5>{{trans('conflict.first_subject')}}: {{$form->first_subject}}</h5>
                                    </div>


                                    <div class="col-md-6">
                                        <h5>{{trans('conflict.conflict_day')}}: {{$form->conflict_day}}</h5>
                                    </div>
                                    <div class="col-md-6">
                                        <h5>{{trans('conflict.conflict_date')}}: {{$form->conflict_date}}</h5>
                                    </div>
                                </div>
                                <hr>
                                <h4>{{trans('conflict.con_status')}}</h4>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5>{{trans('conflict.con_status')}}: {{$form->status}}</h5>
                                    </div>
                                    <div class="col-md-12">
                                        <h5>{{trans('conflict.des')}}: {{$form->description}}</h5>
                                    </div>
                                </div>
                                <hr>
                                <h4>{{trans('conflict.updateStatus')}}</h4>
                                <div class="row">
                                {!! Form::open(['url' => '/cp/students/conflict/update', 'method' => 'post']) !!}
                                    {!! Form::hidden('id', $form->id, ['id' => 'id']) !!}
                                    <div class="col-md-6">
                                        <!--- Status Field --->
                                        <div class="form-group">
                                            {!! Form::label('status', trans('conflict.con_status').':') !!}
                                            {!! Form::select('status', $status , $form->status , ['class' => 'form-control']) !!}
                                        </div>

                                        <!--- Description Field --->
                                        <div class="form-group">
                                            {!! Form::label('description', trans('conflict.con_des').':') !!}
                                            {!! Form::textarea('description', $form->description, ['class' => 'form-control']) !!}
                                        </div>

                                        {!! Form::submit(trans('cp.update'), ['class' => 'form-control']) !!}
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                                <hr>


                                <a href="/cp/students/conflict" class="button col-md-3">{{trans('settings.back')}}</a>
                            </div>
                            <div class="col-md-12">


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection