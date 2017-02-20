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
                                <h4>{{trans('sp.fid')}}: {{$form->fid}}</h4>



                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>{{trans('sp.NID')}}: {{$student->nid}} </h5>
                                    </div>

                                    <div class="col-md-6">
                                        <h5>{{trans('sp.sid')}}: {{$student->sid}} </h5>
                                    </div>

                                    <div class="col-md-6">
                                        <h5>{{trans('sp.name')}}: {{$student->name}} </h5>
                                    </div>


                                    <div class="col-md-6">
                                        <h5>{{trans('sp.gender')}}: {{trans('studentGender.'.$student->gender)}}</h5>
                                    </div>
                                    <hr>
                                </div>


                                 <div class="row">
                                    <div class="col-md-6">
                                        <h4>{{trans('حالة الطلب')}}</h4>
                                        <hr>
                                        <h5>{{trans('حالة الطلب')}}: {{trans('HdStatus.'.$form->status)}}</h5>

                                    </div>

                                    <div class="col-md-6">

                                        @if($form->attach_file !='null')

                                        <a href="{{asset('storage/'.$form->attach_file)}}" target="_blank" class="btn btn-info">
                                            <span class="glyphicon glyphicon-paperclip"></span> {{trans('sp.view_attach')}}
                                        </a>

                                        @endif

                                </div>
                                    </div>

                                <div class="row">


                                        <div class="col col-md-6">
                                            <h5>{{trans('الموضوع')}}: {{$form->subject}}</h5>

                                        </div>

                                        <div class="col-md-6">
                                            <h5>{{trans('شرح المشكلة')}}: {{$form->des}}</h5>
                                        </div>
                                    </div>

                                <hr>
                                <h4>{{trans('sp.updateStatus')}}</h4>
                                <div class="row">
                                    {!! Form::open(array('url' => '/cp/students/helpdesk/update'))!!}
                                    {!! Form::hidden('id', $form->id, ['id' => 'id']) !!}
                                    <div class="col-md-6">
                                        <!--- Status Field --->
                                        <div class="form-group">
                                            {!! Form::label('status', trans('sp.con_status').':') !!}
                                            {!! Form::select('status', $status , $form->status , ['class' => 'form-control']) !!}
                                        </div>

                                        <!--- Description Field --->
                                        <div class="form-group">
                                            {!! Form::label('replay', trans('الرد على الطلب').':') !!}
                                            {!! Form::textarea('replay', $form->replay, ['class' => 'form-control']) !!}
                                        </div>

                                        {!! Form::submit(trans('cp.update'),  ['class' => 'form-control' , 'name'=> 'CPupdate' , 'value'=> 'CPupdate']) !!}
                                        <small>سيتم إرسال بريد إلكتروني إلى الطالب/الطالبة فور النقر على تحديث البيانات</small>
                                    </div>



                                    <div class="col-md-6">
                                        @if($form->status == 'pending')
                                        <div class="col-md-6">
                                            <!--- Status Field --->
                                            <div class="form-group">
                                                {!! Form::label('serviceType', trans('تحويل الطلب إلى إدارة أخرى').':') !!}
                                                {!! Form::select('serviceType', $serviceType, $form->serviceType , ['class' => 'form-control']) !!}

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            </br>
                                            {!! Form::submit(trans('تحويل'),  ['class' => 'form-control' , 'name'=> 'CPtrans' , 'value'=> 'CPtrans' ]) !!}

                                        </div>
                                        @endif

                                        @if(!empty($logs))
                                        <div class="col-md-12">

                                            <h5>سجل تحويل الطلب</h5>
                                            <table class="table table-striped">
                                                <thead>
                                                    <th>
                                                        المحول
                                                    </th>
                                                    <th>
                                                        من
                                                    </th>
                                                    <th>
                                                        إلى
                                                    </th>
                                                    <th>
                                                        الوقت
                                                    </th>
                                                </thead>
                                                <tbody>
                                                @foreach($logs as $log)
                                                    <tr>
                                                        <td>
                                                            {{$log->username}}
                                                        </td>
                                                        <td>
{{--                                                            {{trans("hd_dep.").$log->from_department}}--}}
                                                            {{trans('hd_dep.'.$log->from_department)}}
                                                        </td>
                                                        <td>
                                                            {{trans('hd_dep.'.$log->to_department)}}
                                                        </td>
                                                        <td>
                                                            {{date("D | M j Y | G:i:s",strtotime($log->added_on)) }}
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                            @endif
                                    </div>





                                    {!! Form::close() !!}
                                </div>
                                <hr>
                                <a href="/cp/students/helpdesk" class="button col-md-3">{{trans('settings.back')}}</a>
                                @if($next != null)
                                    <a href="/cp/students/helpdesk/view/{{$next}}" class="button col-md-3">{{trans('settings.next')}}</a>
                                @endif
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