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
                                <h4>{{trans('objection.fid')}}: {{$form->fid}}</h4>

                                <hr>

                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>{{trans('objection.NID')}}: {{$student->nid}} </h5>
                                    </div>

                                    <div class="col-md-6">
                                        <h5>{{trans('objection.sid')}}: {{$student->sid}} </h5>
                                    </div>

                                    <div class="col-md-6">
                                        <h5>{{trans('objection.name')}}: {{$student->name}} </h5>
                                    </div>


                                    <div class="col-md-6">
                                        <h5>{{trans('objection.gender')}}: {{trans('studentGender.'.$student->gender)}}</h5>
                                    </div>

                                </div>

                                <hr>
                                <h4>{{trans('objection.con_des')}}</h4>
                                <div class="row">

                                    <div class="col-md-6">
                                        <h5>{{trans('objection.course_name')}}: {{$course->des}}</h5>
                                    </div>

                                    <div class="col-md-6">
                                        <h5>{{trans('objection.course_class')}}: {{$course->class_id}}</h5>
                                    </div>


                                    <div class="col-md-6">
                                        <h5>{{trans('C.course_ins_name')}}: {{$course->name}}</h5>
                                    </div>

                                    <div class="col-md-6">
                                        <h5>{{trans('objection.exam_date')}}: {{$course->date}} - الموافق
                                            {{$course->higri_date}}</h5>
                                    </div>

                                    <div class="col-md-6">
                                        <h5>{{trans('objection.paper')}}: {{$form->paper}} </h5>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col col-md-6">
                                        <h5>{{trans('objection.reason')}}: {{$form->reason}}</h5>

                                    </div>
                                </div>
                                <hr>
                                <h4>{{trans('objection.con_status')}}</h4>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5>{{trans('objection.con_status')}}: {{trans('status')[$form->status]}}</h5>
                                    </div>
                                    <div class="col-md-12">
                                        <h5>{{trans('objection.des')}}: {{$form->description}}</h5>
                                    </div>
                                </div>

                                <a href="/students/objection" class="button col-md-3">{{trans('settings.back')}}</a>
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