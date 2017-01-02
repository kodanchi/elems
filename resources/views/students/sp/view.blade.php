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
                            <div class="col-md-12 newsletter-form">
                                <h4>{{trans('sp.fid')}}: {{$form->fid}}</h4>

                                <hr>

                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>{{trans('sp.NID')}}: {{$student->nid}} </h5>
                                    </div>

                                    <div class="col-md-6">
                                        <h5>{{trans('sp.sid')}}: {{$student->sid}} </h5>
                                    </div>

                                    <div class="col-md-6">
                                        <h5>{{trans('sp.name')}}: {{$student->name}} </h5>
                                    </div>


                                    <div class="col-md-6">
                                        <h5>{{trans('sp.gender')}}: {{trans('studentGender.'.$student->gender)}}</h5>
                                    </div>

                                </div>

                                <hr>
                                <h4>{{trans('sp.con_des')}}</h4>
                                <div class="row">

                                    <div class="col-md-6">
                                        <h5>{{trans('sp.course_name')}}: {{$course->des}}</h5>
                                    </div>

                                    <div class="col-md-6">
                                        <h5>{{trans('sp.course_class')}}: {{$course->class_id}}</h5>
                                    </div>


                                    <div class="col-md-6">
                                        <h5>{{trans('sp.course_ins_name')}}: {{$course->name}}</h5>
                                    </div>

                                    <a href="{{asset('storage/'.$form->attach_file)}}" target="_blank" class="btn btn-info">
                                        <span class="glyphicon glyphicon-paperclip"></span> {{trans('sp.view_attach')}}
                                    </a>
                                </div>
                                <hr>
                                <h4>{{trans('sp.con_status')}}</h4>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5>{{trans('sp.con_status')}}: {{trans('status')[$form->status]}}</h5>
                                    </div>
                                    <div class="col-md-12">
                                        <h5>{{trans('sp.des')}}: {{$form->description}}</h5>
                                    </div>
                                </div>

                                <a href="/students/sp" class="button col-md-3">{{trans('settings.back')}}</a>
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