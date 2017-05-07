@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-11 col-md-offset-1">
                <div class="panel panel-default">

                    <div class="panel-heading">{{trans('regform.applicant_request')}} | {{$form->id}}</div>
                    <div class="panel-heading">تجيد الرغبة  | {{$form->update_status}}</div>
                    <div class="panel-body">

                        @include('errors.status')

                        <div class="row">
                            @include('forms.regform.regform-view.personal')
                            @include('forms.regform.regform-view.work')
                        </div>



                        <div class="row">
                            <div class="col col-md-6">
                                <h4>{{trans('regform.supervisor')}}</h4>
                                <hr>
                                <p>{{trans('regform.supervisor')}} : {{$form->supervisor}}</p>
                                <p>{{trans('regform.su_phone')}}: 0{{$form->su_phone}}</p>
                                <p>{{trans('regform.su_cellphone')}}: 0{{$form->su_cellphone}}</p>
                                <p>{{trans('regform.su_email')}}: {{$form->su_email}}</p>
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
                                <h4>{{trans('regform.other_details')}}</h4>
                                <hr>
                                <p>{{trans('regform.el_exams_Before')}}:  {{trans('boolean.'.$form->el_exams_Before)}}</p>
                                @if($form->el_exams_Before)
                                    <p>{{trans('regform.el_exams_num')}}: {{$form->el_exams_num}}</p>
                                @endif
                                <p>{{trans('regform.other_exams_Before')}}:  {{trans('boolean.'.$form->other_exams_Before)}}</p>
                                @if($form->other_exams_Before)
                                    <p>{{trans('regform.other_exams')}}: {{$form->other_exams}}</p>
                                @endif
                                @if($form->gender == 'male')
                                    <p>{{trans('regform.center_first')}}: {{trans('centers_male.'.$form->center_first)}}</p>
                                    <p>{{trans('regform.center_second')}}: {{trans('centers_male.'.$form->center_second)}}</p>
                                @elseif($form->gender == 'female')
                                    <p>{{trans('regform.center_first')}}: {{trans('centers_female.'.$form->center_first)}}</p>
                                    <p>{{trans('regform.center_second')}}: {{trans('centers_female.'.$form->center_second)}}</p>
                                @endif



                                <p>{{trans('regform.submitted_at')}}: {{$form->created_at}}</p>
                                <a href="{{asset('storage/'.$form->job_identity_file)}}" target="_blank" class="btn btn-info">
                                    <span class="glyphicon glyphicon-paperclip"></span> {{trans('regform.view_job_proof')}}
                                </a>

                                <a href="{{asset('storage/'.$form->qualification_identity_file)}}" target="_blank" class="btn btn-info">
                                    <span class="glyphicon glyphicon-paperclip"></span> {{trans('regform.view_qualification_proof')}}
                                </a>
                            </div>

                            <div class="col col-md-6">
                                <h4>{{trans('regform.emergency_contacts_details')}}</h4>
                                <hr>
                                <p>{{trans('regform.emergency_name')}}: {{$form->emergency_name}}</p>
                                <p>{{trans('regform.emer_relation')}}: {{$form->emer_relation}}</p>
                                <p>{{trans('regform.emer_cellphone')}}: 0{{$form->emer_cellphone}}</p>
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col col-md-6">
                                <h4>{{trans('regform.status')}}</h4>
                                <p>{{trans('regform.status')}} :  {{trans('regform.statusArr.'.$form->status)}}</p>
                                @if($form->status == 0 || $form->status == 2)
                                    <a href="{{url('/cp/form/emr/'.$form->id.'/approve')}}" class="button btn btn-success col-md-3">{{trans('cp.approve')}}</a>
                                @endif
                                @if($form->status == 0 || $form->status == 1)
                                    <a href="{{url('/cp/form/emr/'.$form->id.'/reject')}}" class="button btn btn-danger col-md-3">{{trans('cp.reject')}}</a>
                                @endif
                            </div>
                        </div>
                        <hr>


                        <div class="col-md-6">
                            <div class="  btn-group-justified">
                                <a href="{{url('/cp/form/emr/'.$form->id.'/edit')}}" class="button btn btn-default col-md-3">{{trans('cp.update')}}</a>

                                <a href="/cp/form/emr/" class="button btn btn-default col-md-3">{{trans('settings.back')}}</a>
                                @if($next != null)
                                    <a href="/cp/form/emr/{{$next}}/view/" class="button btn btn-default col-md-3">{{trans('settings.next')}}</a>
                                @endif
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection