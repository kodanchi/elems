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




                                <div class="row">



                                        <div class="col-md-6">
                                            <h4>{{trans('حالة الطلب')}}</h4>
                                            <h5>{{trans('حالة الطلب')}}: {{trans('HdStatus.'.$form->status)}}</h5>
                                        </div>

                                    @if($form->response_attach_file !='null' && isset($form->response_attach_file))
                                        <div class="col-md-6">

                                            <h5>المرفق من قبل الموظف:</h5>

                                            <a href="{{asset('storage/'.$form->response_attach_file)}}" target="_blank" class="btn btn-info">
                                                <span class="glyphicon glyphicon-paperclip"></span> {{trans('sp.view_attach')}}
                                            </a>

                                        </div>
                                    @endif

                                <div class="col-md-6">
                                    @if($form->attach_file !='null')

                                    <a href="{{asset('storage/'.$form->attach_file)}}" target="_blank" class="btn btn-info">
                                        <span class="glyphicon glyphicon-paperclip"></span> {{trans('sp.view_attach')}}
                                    </a>

                                        @endif




                            </div>
                                </div>
                                <hr>
                                <div class="col col-md-6">
                                    <h4>{{trans('الموضوع')}}:</h4>

                                        <h5>{{$form->subject}}</h5>

                                </div>

                                    <div class="col-md-6">
                                        <h4>{{trans('شرح المشكلة')}}:</h4>

                                            <h5>{{$form->des}}</h5>
                                    </div>

                                  <hr>
                                 <br>
                            <div class="row">
                            <div class="col-md-6">
                                <h4>الرد على الطلب: </h4>

                                    <h5>{{$form->replay}}</h5>
                            </div>
                                </div>
                        </div>
                        </div>
                        <br>
                            <br>
                            <hr>
                            <div class="col col-md-12">
                                <a href="/helpdesk" class="btn btn-default col-md-3">{{trans('settings.back')}}</a>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection