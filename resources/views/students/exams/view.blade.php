@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"></div>

                    <div class="panel-body ">
                        <div class="row">

                            @include('errors.status')
                            <div class="col-md-12 newsletter-form">
                                <h4>{{trans('exams.studentExam')}}</h4>

                                <hr>

                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>{{trans('exams.sname')}}: {{$student[0]->stud_name}} </h5>
                                    </div>

                                    <div class="col-md-6">
                                        <h5>{{trans('exams.sid')}}: {{$student[0]->sid}} </h5>
                                    </div>

                                    <div class="col-md-6">
                                        <h5>{{trans('exams.major')}}: {{trans('majorCodes.'.$student[0]->major)}} </h5>
                                    </div>


                                    <div class="col-md-6">
                                        <h5>{{trans('exams.center_name')}}: {{trans($student[0]->name)}}</h5>
                                    </div>

                                </div>

                                <hr>
                                <h4>{{trans('exams.exams_dates')}}</h4>
                                <div class="row">

                                    <div class="col col-md-12">
                                        <table class="table table-responsive">
                                            <thead>
                                                <th>التاريخ الهجري</th>
                                                <th>التاريخ الميلادي</th>
                                                <th>الموعد</th>
                                                <th>رمز المقرر</th>
                                                <th>اسم المقرر</th>
                                                <th>المبنى</th>
                                                <th>الطابق</th>
                                                <th>القاعة</th>
                                            </thead>
                                            <tbody>
                                                @foreach($student as $date)
                                                    <tr>
                                                        <td>{{$date->higri_date}}</td>
                                                        <td>{{$date->date}}</td>
                                                        <td>{{$date->time}}</td>
                                                        <td>{{$date->subject}}</td>
                                                        <td>{{$date->des}}</td>
                                                        <td>{{$date->building}}</td>
                                                        <td>{{$date->floor}}</td>
                                                        <td>{{$date->room}}</td>
                                                    </tr>
                                                    @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>



                                <a href="/students/exams/lookup" class="button col-md-3">{{trans('settings.back')}}</a>
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