@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-11 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">طلب متقدم</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col col-md-6">
                                <h4>General Details</h4>
                                <hr>
                                <p>Full name: {{$form->fname." ".$form->faname." ".$form->gfaname." ".$form->lname}}</p>
                                <p>National/Eqama ID: {{$form->NID}}</p>
                                <p>Birth Date: {{$form->birth_date}}</p>
                                <p>Nationality : {{$form->nationality}}</p>
                                <p>Phone : 0{{$form->phone}}</p>
                                <p>Cellphone : 0{{$form->cellphone}}</p>
                                <p>Email : {{$form->email}}</p>
                                <br/>
                            </div>

                            <div class="col col-md-6">
                                <h4>Work Details</h4>
                                <hr>
                                <p>Qualification : {{$form->qualification}}</p>
                                <p>Major : {{$form->major}}</p>
                                <p>Department : {{$form->department}}</p>
                                <p>Section : {{$form->section}}</p>
                                @if($form->is_contact === 0)
                                    <p>Employee ID : {{$form->employee_ID}}</p>
                                @else
                                    <p>Job: Contract</p>
                                @endif
                                <p>Job Title : {{$form->job_title}}</p>
                                <br/>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col col-md-6">
                                <h4>Supervisor</h4>
                                <hr>
                                <p>Supervisor : {{$form->supervisor}}</p>
                                <p>Supervisor phone: 0{{$form->su_phone}}</p>
                                <p>Supervisor cellphone: 0{{$form->su_cellphone}}</p>
                                <br/>
                            </div>
                            <div class="col col-md-6">
                                <h4>Bank Details</h4>
                                <hr>
                                <p>IBAN: {{$form->IBAN}}</p>
                                <p>Bank name: {{$form->bank_name}}</p>
                                <p>Account Holder name: {{$form->account_holder_name}}</p>
                                <br/>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col col-md-6">
                                <h4>Emergency Details</h4>
                                <hr>
                                <p>Emergency contact name: {{$form->emergency_name}}</p>
                                <p>Emergency contact Relation: {{$form->emer_relation}}</p>
                                <p>Emergency contact cellphone: 0{{$form->emer_cellphone}}</p>
                            </div>
                            <div class="col col-md-6">
                                <p>Submitted at: {{$form->created_at}}</p>
                                <a href="{{asset('storage/'.$form->job_identity_file)}}" target="_blank" class="btn btn-info">
                                    <span class="glyphicon glyphicon-paperclip"></span> View job proof
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