@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('students.applicants')}}  | {{$form->id}}</div>

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

                                    <div class="col-md-6">
                                        <h5 style="color: red">{{trans('objection.major')}}: {{trans('majorCodes.'.$student->major)}}</h5>
                                    </div>
                                    <div class="col-md-6">
                                        <h5 style="color: red">المركز الذي تم الإختبار فيه: {{trans('AllCenters.'.$course->center_id)}}</h5>
                                    </div>

                                </div>

                                <hr>
                                <h4>{{trans('objection.con_des')}}</h4>
                                <div class="row">

                                    <div class="col-md-6">
                                        <h5>{{trans('objection.course_name')}}: {{$course->des}}</h5>
                                    </div>

                                    <div class="col-md-6">
                                        <h5>{{trans('objection.course_class')}}: {{$course->class_id}}</h5>
                                    </div>


                                    <div class="col-md-6">
                                        <h5>{{trans('objection.course_ins_name')}}: {{$course->name}}</h5>
                                    </div>

                                    <div class="col-md-6">
                                        <h5>{{trans('objection.exam_date')}}: {{$course->date}} - الموافق
                                            {{$course->higri_date}}</h5>
                                    </div>

                                    <div class="col-md-6">
                                        <h5>{{trans('objection.paper')}}: {{$form->paper}} </h5>
                                    </div>


                                </div>
                                <div class="row">

                                    <div class="col-md-6">
                                        <h5>{{trans('objection.reason')}}: {{$form->reason}}</h5>
                                    </div>
                                </div>
                                <hr>
                                <h4>{{trans('objection.con_status')}}</h4>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5>{{trans('objection.con_status')}}: {{trans('status')[$form->status]}}</h5>
                                    </div>
                                    <div class="col-md-12">
                                        <h5>{{trans('objection.des')}}: {{$form->description}}</h5>
                                    </div>
                                </div>
                                <hr>
                                <h4>{{trans('objection.updateStatus')}}</h4>
                                <div class="row">
                                    {!! Form::open(['url' => '/cp/students/objection/update', 'method' => 'post']) !!}
                                    {!! Form::hidden('id', $form->id, ['id' => 'id']) !!}
                                    <div class="col-md-6">
                                        <!--- Status Field --->
                                        <div class="form-group">
                                            {!! Form::label('status', trans('objection.con_status').':') !!}
                                            {!! Form::select('status', $status , $form->status , ['class' => 'form-control']) !!}
                                        </div>

                                        <!--- Description Field --->
                                        <div class="form-group">
                                            {!! Form::label('description', trans('objection.con_des').':') !!}
                                            {!! Form::textarea('description', $form->description, ['class' => 'form-control']) !!}
                                        </div>

                                        {!! Form::submit(trans('cp.update'), ['class' => 'form-control']) !!}
                                        <small>سيتم إرسال بريد إلكتروني إلى الطالب/الطالبة فور النقر على تحديث البيانات</small>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                                <hr>
                                <a href="/cp/students/objection" class="button col-md-3">{{trans('settings.back')}}</a>
                                @if($next != null)
                                    <a href="/cp/students/objection/view/{{$next}}" class="button col-md-3">{{trans('settings.next')}}</a>
                                @endif
                            </div>


                            <div class="col-md-12">

                            </div>


                        </div>
                        <h5 style="float: right"><b>تاريخ الطلب : </b>{{date("D | j M Y | g:i  A",strtotime($form->created_at))}}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection