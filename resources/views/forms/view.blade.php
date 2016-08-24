@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-11 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">طلب متقدم</div>
                    <div class="panel-body">
                        <p>Full name: {{$form->fname." ".$form->faname." ".$form->gfaname." ".$form->lname}}</p>
                        <p>Birth Date: {{$form->birth_date}}</p>
                        <p>Nationality : {{$form->nationality}}</p>
                        <p>Phone : {{$form->phone}}</p>
                        <p>Cellphone : {{$form->cellphone}}</p>
                        <p>Email : {{$form->email}}</p>
                        <p>Qualification : {{$form->qualification}}</p>
                        <p>Major : {{$form->major}}</p>
                        <p>Department : {{$form->department}}</p>
                        <p>Section : {{$form->section}}</p>
                        <p>Employee ID : {{$form->employee_ID}}</p>
                        <p>Job Title : {{$form->job_title}}</p>
                        <br/>
                        <p>Supervisor : {{$form->supervisor}}</p>
                        <p>Supervisor phone: {{$form->su_phone}}</p>
                        <p>Supervisor cellphone: {{$form->su_cellphone}}</p>
                        <br/>
                        <p>IBAN: {{$form->IBAN}}</p>
                        <p>Bank name: {{$form->bank_name}}</p>
                        <p>Account Holder name: {{$form->account_holder_name}}</p>
                        <br/>
                        <p>Emergency contact name: {{$form->emergency_name}}</p>
                        <p>Emergency contact Relation: {{$form->emer_relation}}</p>
                        <p>Emergency contact cellphone: {{$form->emer_cellphone}}</p>
                        <br/>
                        <p>Submitted at: {{$form->created_at}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection