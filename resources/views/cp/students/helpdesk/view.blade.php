@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading" style="">
{{--                        {!! Form::open(array('url' => '/cp/students/helpdesk/assign/'.$form->id))!!}
                        {!! Form::hidden('id', $form->id, ['id' => 'id']) !!}
                        {!! Form::submit(trans('استلام'),  ['class' => 'form-control' , 'name'=> 'CPassign' , 'value'=> 'CPassign' ]) !!}
                        {{trans('students.applicants')}}  | {{$form->id}}
                        {!! Form::close() !!}--}}
                        {{trans('students.applicants')}}  | {{$form->id}}
                        @if(!in_array('admin',Auth::user()->getAllroles()) && !$form->username)
                            <a href="{{url('cp/students/helpdesk/assign/'.$form->id)}}" style="float: left">
                                <span class="btn" style="padding: 5px; background-color: #122b40; color: white">استلام الطلب</span>
                            </a>
                        @else
                            @if($form->username)
                            <p style="float: left">{{trans('cp.username')}}: {{$form->username}}</p>
                            @endif
                        @endforelse
                    </div>

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


                                    @if($form->response_attach_file !='null' && isset($form->response_attach_file))
                                        <hr>
                                        <hr>
                                        <div class="col-md-6">

                                            <h5>المرفق من قبل الموظف:</h5>

                                            <a href="{{asset('storage/'.$form->response_attach_file)}}" target="_blank" class="btn btn-info">
                                                <span class="glyphicon glyphicon-paperclip"></span> {{trans('sp.view_attach')}}
                                            </a>

                                        </div>
                                    @endif
                                    </div>



                                <hr>
                                <h4>{{trans('sp.updateStatus')}}</h4>
                                <div class="row">
                                    {!! Form::open(array('url' => '/cp/students/helpdesk/update', 'files' => true))!!}
                                    {!! Form::hidden('id', $form->id, ['id' => 'id']) !!}
                                    <div class="col-md-6">
                                        <!--- Status Field --->
                                        <div class="form-group">
                                            {!! Form::label('status', trans('sp.con_status').':') !!}
                                            @if(in_array('admin',Auth::user()->getAllroles()) || Auth::user()->getUsername() == $form->username)
                                                {!! Form::select('status', $status , $form->status , ['class' => 'form-control']) !!}
                                            @else
                                            {!! Form::select('status', $status , $form->status , ['class' => 'form-control', 'readonly']) !!}
                                                @endforelse
                                        </div>

                                        <!--- Description Field --->
                                        <div class="form-group">
                                            {!! Form::label('replay', trans('الرد على الطلب').':') !!}

                                            @if(in_array('admin',Auth::user()->getAllroles()) || Auth::user()->getUsername() == $form->username)

                                                {!! Form::textarea('replay', $form->replay, ['class' => 'form-control']) !!}
                                                @else
                                                {!! Form::textarea('replay', $form->replay, ['class' => 'form-control', 'readonly']) !!}
                                                @endforelse
                                        </div>

                                        <div class="form-group">
                                            {!! Form::label('response_attach_file_L', 'إرفاق ملف') !!}
                                            {!! Form::file('response_attach_file', ['class' => 'form-control','accept'=>'.pdf', 'id'=>'response_attach_file']) !!}
                                        </div>
                                        @if(in_array('admin',Auth::user()->getAllroles()) || Auth::user()->getUsername() == $form->username)
                                        {!! Form::submit('الرد على الطلب',  ['class' => 'form-control' , 'name'=> 'CPupdate' , 'value'=> 'CPupdate', 'onclick'=>'return foo();']) !!}
                                            <small>سيتم إرسال بريد إلكتروني إلى الطالب/الطالبة فور النقر على الرد على الطلب</small>
                                        @endif


                                    </div>


                                    <div class="col-md-6">
                                        @if($form->status == 'pending')
                                        <div class="col-md-6">
                                            <!--- Status Field --->
                                            <div class="form-group">

                                                {!! Form::label('serviceType', trans('تحويل الطلب إلى إدارة أخرى').':') !!}
                                                {!! Form::select('serviceType', $serviceType, $form->serviceType , ['class' => 'form-control selectpicker'] ) !!}

                                                {{--<select name="serviceType" id="serviceType" class="form-control selectpicker" data-live-search="true" onchange="myFunction()">
                                                    <option disabled>{{trans('serviceType.'.$form->serviceType)}}</option>
                                                --}}{{--@foreach ($serviceType as $key => $value)
                                                    <option value="{{$value}}">{{$value}}</option>
                                                @endforeach--}}{{--
                                                    @foreach ($serviceType as $key => $value)
                                                        <option value="{{$value}}">{{$value}}</option>
                                                    @endforeach
                                                </select>--}}
{{--{{dd($to_user[0])}}--}}
                                                {{--{!! Form::label('to_user', trans('تحويل الطلب إلى شخص محدد').':') !!}
                                                {!! Form::select('to_user', $to_user[0], $to_user[0], ['class' => 'form-control']) !!}
                                                @foreach($to_user as $user)
                                                    {{$user->name}}
                                                @endforeach--}}
                                                {{--{!! Form::label('to_user', trans('تحويل الطلب إلى شخص محدد').':') !!}
                                                {!! Form::select('to_user', $to_user[0], $to_user[0], ['class' => 'form-control']) !!}--}}


                                            </div>
                                        </div>
                                            <div class="col-md-6">
                                                {{--{!! Form::label('to_user', trans('تحويل الطلب إلى شخص محدد').':') !!}
                                                <select name="from_user" id="from_user" class="form-control selectpicker" data-live-search="true">
                                                    <option disabled>المستلم</option>
                                                    @foreach ($to_user as $user)
                                                        <option value="{{$user->name}}">{{$user->name}}</option>
                                                    @endforeach
                                                </select>--}}

                                                {!! Form::label('to_user', trans('تحويل الطلب إلى شخص محدد').':') !!}
                                                <select name="to_user" id="to_user" class="form-control selectpicker" data-live-search="true">
                                                    <option value="غير محدد" selected>المستلم</option>
                                                    @foreach ($to_user as $user)
                                                        @if($user->name!=="Abdullah1" && $user->name!=="abdulla2")
                                                        <option {{--@if($user->name!=="Abdullah1" && $user->name!=="abdulla2")--}}value="{{$user->name}}">{{--@if($user->name!=="Abdullah1" && $user->name!=="abdulla2")--}}{{$user->name}}{{--@endif--}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                <br>
                                                <br>
                                                <p>*في حالة عدم تحديد الشخص المحول له سوف يتم التحويل للقسم المحدد</p>
                                            </div>






{{--                                            <div class="form-group">
                                                <label>State
                                                    <select name="state" id="state" class="form-control input-sm">
                                                        <option value=""></option>
                                                        @foreach($serviceType as $type=>$value)
                                                            <option value="">{{$value}}</option>
                                                        @endforeach
                                                    </select>
                                                </label>
                                            </div>

                                            <div class="form-group">
                                                <label>City
                                                    <select id="city" class="form-control input-sm" name="city_id">
                                                        <option value=""></option>
                                                    </select>
                                                </label>
                                            </div>--}}






                                        <div class="col-md-6">

                                            </br>
                                            @if(in_array('admin',Auth::user()->getAllroles()) || Auth::user()->getUsername() == $form->username)
                                                {!! Form::submit(trans('تحويل'),  ['class' => 'form-control' , 'name'=> 'CPtrans' , 'value'=> 'CPtrans' , 'onclick'=>'return foo2();']) !!}
                                            @endif
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
                                                        المحول له
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
                                                            {{$log->from_user}}
                                                        </td>
                                                        <td>
                                                            {{$log->to_user}}
                                                        </td>
                                                        <td>
{{--                                                            {{trans("hd_dep.").$log->from_department}}--}}
                                                            {{trans('hd_dep.'.$log->from_department)}}
                                                        </td>
                                                        <td>
                                                            {{trans('hd_dep.'.$log->to_department)}}
                                                        </td>
                                                        <td>
                                                           {{date("D | M j Y | G:i:s ",strtotime($log->added_on)) }}
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
                                <a href="/cp/students/helpdesk/pending" class="button col-md-3">{{trans('settings.back')}}</a>
                                @if($next != null)
                                    <a href="/cp/students/helpdesk/view/{{$next}}" class="button col-md-3">{{trans('settings.next')}}</a>
                                @endif
                            </div>
                            <div class="col-md-12">


                            </div>

                        </div>
                    </div>
                </div>
                <h5 style="float: right"><b>تاريخ الطلب : </b>{{date("D | j M Y | g:i  A",strtotime($form->created_at))}}</h5>

                @if($form->username)

                <h5 style=" float: left;"><b>   تاريخ تعديل/استلام الطلب :</b>{{date("D | j M Y | g:i  A",strtotime($form->updated_at))}}</h5>

                    @endif
            </div>
        </div>
    </div>

    <script>
        function foo()
        {
            //alert("Submit button clicked! ");
            //document.getElementById('form-id').action = "approve/reject/"+recipient+"/"+document.getElementById('reason').value;
            var status = $("#status").val();

            if(status == 'pending') {
                // is not a and is not b
                //alert("يجب أن ");
                window.alert("يجب اختيار حالة الطلب (تمت المعالجة) قبل الرد على الطلب");
                return false;
            }
            return true;
        }

        function foo2()
        {
            //alert("Submit button clicked! ");
            //document.getElementById('form-id').action = "approve/reject/"+recipient+"/"+document.getElementById('reason').value;
            var status = $("#status").val();

            if(status == 'closed') {
                // is not a and is not b
                //alert("يجب أن ");
                window.alert("يجب اختيار حالة الطلب (تحت الدراسة) قبل تحويل الطلب");
                return false;
            }
            return true;
        }

        $('#response_attach_file').bind('change', function() {
            //alert(this.files[0].size);
            if (this.files[0].size>4000095) {
                //this.files[0].size gets the size of your file.
                alert("حجم الملف يجب ان يكون أقل من 4 ميجابايت");
                $("#response_attach_file").val('');
            }
        });
    </script>

    @endsection