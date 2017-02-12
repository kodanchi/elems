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
                                        <h5>{{trans('sp.sid')}}: {{$form->sid}} </h5>
                                    </div>

                                    <div class="col-md-6">
                                        <h5>{{trans('sp.name')}}: {{$form->name}} </h5>
                                    </div>

                                    <div class="col-md-6">
                                        <h5>{{trans('sp.gender')}}: {{$form->gender}}</h5>
                                    </div>

                                </div>


                                <div class="row">

                                    <div class="col-md-12">
                                        <h5>{{trans('conflict.con_status')}}: {{$form->status}}</h5>
                                    </div>

                                    <div class="col-md-12">

                                            <h4>{{trans('تحويل الطلب إلى إدارة أخرى')}}</h4>
                                            <hr>
                                            <h5>{{trans('تحويل الطلب إلى إدارة أخرى')}}: {{trans('cp.serviceType')[$form->serviceType]}}</h5>


                                    </div>
                                    <div class="col-md-12">
                                        <h5>{{trans('conflict.des')}}: {{$form->replay}}</h5>
                                    </div>
                                </div>
                                <hr>

                                <a href="/cp/students/helpdesk" class="button col-md-3">{{trans('settings.back')}}</a>
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