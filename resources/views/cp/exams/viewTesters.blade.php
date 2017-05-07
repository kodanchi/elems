@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">



                            <div class="container ">
                                <div class="row ">
                                    <div class="col-md-12">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">جدول المراقب</div>

                                            <div class="panel-body ">
                                                <div class="row">

                                                    @include('errors.status')
                                                    <div class="col-md-12 newsletter-form">
                                                        <h4 style="text-align: center">جدول المراقب -  {{$forms[0]->card_id}}</h4>
                                                        <br>

                                                            <hr>

                                                            <div class="row">

                                                                <div class="col-md-6">
                                                                    <h5>اسم المراقب: {{$forms[0]->fname}} {{$forms[0]->faname}} {{$forms[0]->gfaname}} {{$forms[0]->lname}}</h5>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <h5>المركز: {{$forms[0]->center_name}} </h5>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <h5>الهوية: {{$forms[0]->NID}} </h5>
                                                                </div>

                                                            </div>

                                                            <hr>
                                                            <h4>مواعيد المراقبة</h4>
                                                            <div class="row">

                                                                <div class="col col-md-12">
                                                                    <table class="table table-responsive">
                                                                        <thead>
                                                                        <th>التاريخ الميلادي </th>
                                                                        <th>التاريخ الهجري </th>
                                                                        <th>مهمة المراقب</th>
                                                                        <th>المبنى</th>
                                                                        <th>القاعة</th>
                                                                        <th>الوقت</th>
                                                                        </thead>
                                                                        <tbody>
                                                                        @foreach($forms as $form)
                                                                            <tr>

                                                                                <td>{{$form->date}}</td>
                                                                                <td>{{$form->higri_date}}</td>
                                                                                <td>{{trans('testersAllocation.testers_type.'.$form->tester_type)}}</td>

                                                                                @if($form == 'NULL' )

                                                                                <td> </td>
                                                                                <td></td>

                                                                                @else
                                                                                    <td>{{$form->building}}</td>
                                                                                    <td>{{$form->room}}</td>

                                                                                    @endif

                                                                                <td>{{$form->time}}</td>
                                                                            </tr>
                                                                        @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>



                                                            {{-- <a href="/students/exams/lookup" class="button col-md-3">{{trans('settings.back')}}</a>--}}
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