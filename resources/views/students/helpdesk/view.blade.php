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
                            @include('errors.errors')
                            <div class="col-md-12 newsletter-form">
                                {!! Form::open(['url' => '/helpdesk/update', 'method' => 'post', 'files' => true ,'class'=>'newsletter-form' ]) !!}

                                {{ Form::hidden('fid', $form->fid) }}

                                {{ Form::hidden('id', $form->id) }}

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

                                </div>

                                <hr>




                                <div class="row">



                                        <div class="col-md-6">
                                            <h4>{{trans('حالة الطلب')}}</h4>
                                            <h5>{{trans('حالة الطلب')}}: {{trans('HdStatus.'.$form->status)}}</h5>
                                        </div>

                                    @if($form->response_attach_file !='null' && isset($form->response_attach_file))
                                        <div class="col-md-6">

                                            <h5>المرفق من قبل الموظف:</h5>

                                            <a href="{{asset('storage/'.$form->response_attach_file)}}" target="_blank" class="btn btn-info">
                                                <span class="glyphicon glyphicon-paperclip"></span> {{trans('sp.view_attach')}}
                                            </a>

                                        </div>
                                    @endif

                                <div class="col-md-6">
                                    @if($form->attach_file !='null')

                                    <a href="{{asset('storage/'.$form->attach_file)}}" target="_blank" class="btn btn-info">
                                        <span class="glyphicon glyphicon-paperclip"></span> {{trans('sp.view_attach')}}
                                    </a>

                                        @endif




                            </div>
                                </div>
                                <hr>
                                <div class="col col-md-6">
                                    <h4>{{trans('الموضوع')}}:</h4>

                                        <h5>{{$form->subject}}</h5>

                                </div>

                                    <div class="col-md-6">
                                        <h4>{{trans('شرح المشكلة')}}:</h4>

                                            <h5>{{$form->des}}</h5>
                                    </div>

                                  <hr>
                                 <br>
                                <hr>
                                <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>الرد على الطلب: </h4>
                                    <table class="table table-striped">
                                    @foreach ($messages as $message)
                                            <tr>
                                                <td>
                                        @if($message->sender=='1')
                                            <h6>اللجنة:</h6>
                                            <h6>{{$message->message}}</h6>
                                            @if($message->response_attach_file !='null')

                                                <a href="{{asset('storage/'.$message->response_attach_file)}}" target="_blank" class="btn btn-info">
                                                    <span class="glyphicon glyphicon-paperclip"></span> {{trans('sp.view_attach')}}
                                                </a>

                                            @endif
                                            {{--<h6>---------------------------------</h6>--}}
                                        @elseif($message->sender=='0')
                                            <h6>الطالب/ـة:</h6>
                                            <h6>{{$message->message}}</h6>
                                            @if($message->attach_file !='null')

                                                <a href="{{asset('storage/'.$message->attach_file)}}" target="_blank" class="btn btn-info">
                                                    <span class="glyphicon glyphicon-paperclip"></span> {{trans('sp.view_attach')}}
                                                </a>

                                            @endif
                                            {{--<h6>---------------------------------</h6>--}}
                                        @endforelse
                                                </td>
                                        </tr>
                                    @endforeach
                                    </table>
                                </div>
                            </div>

                                <hr>

                                @if($form->status=='suspending')
                                <div class="row">

                                    <div class="col col-md-6">
                                        <!--- Upload Field --->
                                        <div class="form-group">
                                            {!! Form::label('file_L', trans('sp.attach').':') !!}
                                            {!! Form::file('file', ['class' => 'form-control','accept'=>'.pdf','id'=>'file']) !!}
                                            <small>يرفق ملف pdf </small>
                                            <small class="red">الحجم المسموح: 4MB أو أقل</small>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">


                                    <div class="col-md-6">
                                        <!--- Reason Field --->
                                        <!--- reason Field --->
                                        <div class="form-group">
                                            {!! Form::label('des', 'الشرح:') !!}
                                            {!! Form::textarea('des', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>

                                </div>

                                <br>
                                <br>
                                {!! Form::submit('ارسال', ['class' => ' col-md-3']) !!}

                                @endif
                                <a href="{{url('/helpdesk')}}" class=" button col-md-3 ">رجوع</a>
                                {!! Form::close() !!}

                        </div>
                        </div>
                        <br>
                            <br>
                            <hr>
                            {{--<div class="col col-md-12">
                                <a href="/helpdesk" class="btn btn-default col-md-3">{{trans('settings.back')}}</a>
                                </div>
                            </div>--}}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#file').bind('change', function() {
            //alert(this.files[0].size);
            if (this.files[0].size>4000095) {
                //this.files[0].size gets the size of your file.
                alert("حجم الملف يجب ان يكون أقل من 4 ميجابايت");
                $("#file").val('');
            }
        });
    </script>

    @endsection