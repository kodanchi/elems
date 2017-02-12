@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-11 col-md-offset-1">
                <div class="panel panel-default">

                    <div class="panel-heading">{{trans('regform.applicant_request')}} | {{$form->id}}</div>
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
                        @include('errors.errors')
                        @include('errors.status')
                        <div class="row">
                            <div class="col col-md-6">
                                <h4>{{trans('regform.evaluate')}}</h4>
                                {!! Form::model($rateForm, ['url' => '/cp/form/emr/evaluation/rate', 'method' => 'post']) !!}
                                    <div class="col-md-12">

                                        <h5>ملاحضات</h5>
                                        <ul>
                                            <li>                        يرجى أن يكون تقييمك للمراقب منطقياً وبعناية حيث أن ذلك سوف يكون عاملاً مؤثراً في الاختيار مستقبلاً </li>
                                            <li>اختيار الخانة "صفر" تعني استبعاد المراقب</li>
                                        </ul>
                                        <hr>
                                    </div>

                                    <div class="col-md-6">
                                        <!--- Rate Field --->
                                        <div class="form-group">
                                            {!! Form::label('rate', 'التقييم:') !!}
                                            {!! Form::selectRange('rate', 0, 10 , null , ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <!--- days Field --->
                                        <div class="form-group">
                                            {!! Form::label('days', 'عدد أيام المراقبة:') !!}
                                            {!! Form::selectRange('days', 1, 10 , null , ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <!--- Des Field --->
                                        <div class="form-group">
                                            {!! Form::label('des', 'تقرير التقييم:') !!}
                                            {!! Form::textarea('des', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>





                                {!! Form::hidden('form_id', $form->id, ['id' => 'id']) !!}
                                {!! Form::submit('تقييم', ['class' => 'form-control']) !!}
                                {!! Form::close() !!}

                            </div>
                        </div>
                        <hr>


                        <div class="col-md-6">
                            <div class="  btn-group-justified">

                                <a href="{{url('/cp/form/emr/evaluation')}}" class="button btn btn-default col-md-3">{{trans('settings.back')}}</a>

                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection