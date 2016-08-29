@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-11 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('regform.applicant_request')}}</div>
                    <div class="panel-body">
                        <div class="row">
                            @if(App::isLocale('ar'))
                                @include('forms.regform.regform-view.work')
                                @include('forms.regform.regform-view.personal')
                            @elseif(App::isLocale('en'))
                                @include('forms.regform.regform-view.personal')
                                @include('forms.regform.regform-view.work')
                            @endif




                        </div>


                        <div class="row">
                            <div class="col col-md-6">
                                <h4>{{trans('regform.supervisor')}}</h4>
                                <hr>
                                <p>{{trans('regform.supervisor')}} : {{$form->supervisor}}</p>
                                <p>{{trans('regform.su_phone')}}: 0{{$form->su_phone}}</p>
                                <p>{{trans('regform.su_cellphone')}}: 0{{$form->su_cellphone}}</p>
                                <br/>
                            </div>
                            <div class="col col-md-6">
                                <h4>{{trans('regform.bank_details')}}</h4>
                                <hr>
                                <p>{{trans('regform.IBAN')}}: {{$form->IBAN}}</p>
                                <p>{{trans('regform.bank_name')}}: {{$form->bank_name}}</p>
                                <p>{{trans('regform.account_holder_name')}}: {{$form->account_holder_name}}</p>
                                <br/>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col col-md-6">
                                <h4>{{trans('regform.emergency_contacts_details')}}</h4>
                                <hr>
                                <p>{{trans('regform.emergency_name')}}: {{$form->emergency_name}}</p>
                                <p>{{trans('regform.emer_relation')}}: {{$form->emer_relation}}</p>
                                <p>{{trans('regform.emer_cellphone')}}: 0{{$form->emer_cellphone}}</p>
                            </div>
                            <div class="col col-md-6">
                                <p>{{trans('regform.submitted_at')}}: {{$form->created_at}}</p>
                                <a href="{{asset('storage/'.$form->job_identity_file)}}" target="_blank" class="btn btn-info">
                                    <span class="glyphicon glyphicon-paperclip"></span> {{trans('regform.view_job_proof')}}
                                </a>
                            </div>
                        </div>

                        <br/>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection