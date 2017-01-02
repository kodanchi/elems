@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-11 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('facultyform.applicant_request')}}</div>
                    <div class="panel-body">
                        <div class="row">
                            @include('forms.facultyform.facultyform-view.personal')
                            @include('forms.facultyform.facultyform-view.work')
                        </div>


                        <div class="row">
                            <div class="col col-md-6">
                                <h4>{{trans('facultyform.supervisor')}}</h4>
                                <hr>
                                <p>{{trans('facultyform.supervisor')}} : {{$form->supervisor}}</p>
                                <p>{{trans('facultyform.su_phone')}}: 0{{$form->su_phone}}</p>
                                <p>{{trans('facultyform.su_cellphone')}}: 0{{$form->su_cellphone}}</p>
                                <p>{{trans('facultyform.su_email')}}: {{$form->su_email}}</p>
                                <br/>
                            </div>

                        </div>


                        <div class="row">

                            <div class="col col-md-6">
                                <h4>{{trans('facultyform.other_details')}}</h4>
                                <hr>
                                <p>{{trans('facultyform.el_exams_Before')}}:  {{trans('boolean.'.$form->teach_Before)}}</p>
                                <p>{{trans('facultyform.skill_lvl')}}:  {{$form->skill_lvl}}</p>
                            @if($form->skills_other)
                                    <p>{{trans('facultyform.el_exams_num')}}: {{$form->skills_other}}</p>
                                @endif

                                <hr>
                                <p>{{trans('facultyform.submitted_at')}}: {{$form->created_at}}</p>
                                <a href="{{asset('storage/'.$form->job_identity_file)}}" target="_blank" class="btn btn-info">
                                    <span class="glyphicon glyphicon-paperclip"></span> {{trans('facultyform.view_job_proof')}}
                                </a>

                                <a href="{{asset('storage/'.$form->qualification_identity_file)}}" target="_blank" class="btn btn-info">
                                    <span class="glyphicon glyphicon-paperclip"></span> {{trans('facultyform.view_qualification_proof')}}
                                </a>
                            </div>
                            <div class="col col-md-6">
                                <h4>{{trans('facultyform.emergency_contacts_details')}}</h4>
                                <hr>
                                <p>{{trans('facultyform.emergency_name')}}: {{$form->emergency_name}}</p>
                                <p>{{trans('facultyform.emer_relation')}}: {{$form->emer_relation}}</p>
                                <p>{{trans('facultyform.emer_cellphone')}}: 0{{$form->emer_cellphone}}</p>
                            </div>
                        </div>
                        <br/>
                        <div class="row">


                            <div class="col col-md-12">
                                <h4>{{trans('facultyform.courses_details')}}</h4>
                                <hr>
                                <ul>
                                    @foreach($courses as $course)
                                        <li>{{$course->des}} - {{$course->subject}}</li>
                                    @endforeach
                                </ul>



                            </div>
                        </div>

                        <br/>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection