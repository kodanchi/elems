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
                            @include('errors.errors')
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


{{--                                    @if($form->response_attach_file !='null' && isset($form->response_attach_file))
                                        <hr>
                                        <hr>
                                        <div class="col-md-6">

                                            <h5>المرفق من قبل الموظف:</h5>

                                            <a href="{{asset('storage/'.$form->response_attach_file)}}" target="_blank" class="btn btn-info">
                                                <span class="glyphicon glyphicon-paperclip"></span> {{trans('sp.view_attach')}}
                                            </a>

                                        </div>
                                    @endif--}}
                                </div>



                                <hr>
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <h4>تاريخ المحادثات:</h4>
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

                                        <hr>
                                        <a href="/cp/students/helpdesk/pending" class="button col-md-6">{{trans('settings.back')}}</a>
                                        @if($next != null)
                                            <a href="/cp/students/helpdesk/view/{{$next}}" class="button col-md-6">{{trans('settings.next')}}</a>
                                        @endif

                                    </div>


                                    <div class="col-md-6">
                                        @if($form->status == 'pending')
                                            <div class="col-md-6">
                                                <!--- Status Field --->
                                                <div class="form-group">

                                                    {!! Form::label('serviceTypeLabel', trans('تحويل الطلب إلى إدارة أخرى').':') !!}
                                                    {!! Form::select('serviceType', $serviceType, null , ['class' => 'form-control selectpicker', 'id' => 'serviceType', 'name' => 'serviceType', 'data-live-search' => 'true'] ) !!}

                                                    {{--<select name="serviceType" id="serviceType" class="form-control selectpicker" data-live-search="true" onchange="myFunction()">
                                                        <option disabled>{{trans('serviceType.'.$form->serviceType)}}</option>
                                                    @foreach ($serviceType as $key => $value)
                                                        <option value="{{$value}}">{{$value}}</option>
                                                    @endforeach
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
                                            <div class="col-md-6" id="to_user_div" name="to_user_div">
                                                <label id="to_user_label" name="to_user_label"></label>
                                            </div>

                                            <script type="text/javascript">
                                                //$('.selectpicker').selectpicker();
                                                $('#serviceType').change(function(){
                                                    var serviceType = $(this).val();
                                                    if(serviceType){
                                                        $.ajax({
                                                            type:"GET",
                                                            url:"{{url('cp/students/helpdesk/view/'.$form->id.'/toUser')}}?serviceType="+serviceType,
                                                            success:function(res){
                                                                if(res){
                                                                    $("#to_user").empty();
                                                                    document.getElementById('to_user_label').innerHTML = 'تحويل الطلب إلى شخص محدد:';
                                                                    $("#to_user_div").append('<select name="to_user" id="to_user" class="form-control selectpicker" data-live-search="true">');
                                                                    var x=0;
                                                                    $.each(res,function(key,value){
                                                                        if (x==0){
                                                                            $("#to_user").append('<option value="غير محدد">اختر الشخص</option>');
                                                                        }
                                                                        $("#to_user").append('<option value="'+key+'">'+value+'</option>');
                                                                        x++;
                                                                    });
                                                                    $("#to_user_div").append('</select>');
                                                                    $('#to_user').selectpicker('refresh');
                                                                }else{
                                                                    $("#to_user").empty();
                                                                    $("#to_user_label").val('');
                                                                }
                                                            }
                                                        });

                                                    }else{
                                                        $("#to_user").empty();
                                                        $("#to_user_label").val('');
                                                        //$("#to_user_div").hide();
                                                    }
                                                });
                                            </script>

                                            {{--<input class="glyphicon glyphicon-edit" type="button" name="answer" value="أضف ملاحظة" onclick="showDiv()" />--}}

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

                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <button  title="أضف ملاحظة مع التحويل" STYLE=" display:inline-block;   float: left; width:40px; height:35px" type="button" onclick="showDiv()">
                                                <span class="glyphicon glyphicon-edit"></span>
                                            </button>
                                            <br>
                                            <br>
                                            <br>
                                            @if(in_array('admin',Auth::user()->getAllroles()) || Auth::user()->getUsername() == $form->username)
                                                <div class="col-md-12">
                                                    <!--- Des Field --->
                                                    <div class="form-group">



                                                        <div id="comment"  style="display:none;" class="answer_list" >

                                                            {!! Form::textarea('comment', null, ['class' => 'form-control' , 'resize'=>'none']) !!}
                                                        </div>



                                                    </div>
                                                </div>
                                            @endif

                                            <div class="col-md-6">
                                                @if(in_array('admin',Auth::user()->getAllroles()) || Auth::user()->getUsername() == $form->username)
                                                    {!! Form::submit(trans('تحويل'),  ['class' => 'form-control' , 'name'=> 'CPtrans' , 'value'=> 'CPtrans' , 'onclick'=>'return foo2();']) !!}
                                                @endif
                                            </div>
                                        @endif

                                        @if(!empty($logs))
                                            <div class="col-md-12">

                                                <h5>سجل تحويل الطلب</h5>
                                                <table class="table table-striped" id="tableTrans" name="tableTrans">
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
                                                    <th>
                                                        الملاحظات
                                                    </th>
                                                    </thead>
                                                    <tbody>
                                                    <?php $xyz=1; ?>
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
                                                            @if($log->comment)
                                                            <td style="font-weight: bolder; font-size: x-large;text-align: center;color: #1f59c0" title="أنظر للملاحظة">...</td>
                                                            <td class="hide">{{$log->comment}}</td>
                                                                @endif
                                                        </tr>
                                                        <?php $xyz++; ?>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        @endif
                                    </div>



                                    {{--<div class="modal fade" id="myModal" role="dialog">
                                        <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Modal Header</h4>
                                                </div>
                                                <div class="modal-body" id="">
                                                    <p id="messageShown" name="messageShown"></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>--}}

                                    {{--<div id="orderModal" class="modal hide fade" role="dialog" aria-labelledby="orderModalLabel" aria-hidden="true">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                            <h3>Order</h3>

                                        </div>
                                        <div id="orderDetails" class="modal-body"></div>
                                        <div id="orderItems" class="modal-body"></div>
                                        <div class="modal-footer">
                                            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                                        </div>
                                    </div>--}}



                                    <div class="modal fade" id="myModal">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title">ملاحظات</h4>
                                                </div>
                                                <div class="modal-body">

                                                    <textarea readonly style="background-color: white;width: 100%; height: 100%;resize:none; text-align: right" class="input-sm" rows="8" id="txtfname">
                                                    </textarea>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default " style="alignment: right" data-dismiss="modal">إغلاق</button>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->

                                    <script>
                                        $('#tableTrans tbody tr  td').on('click',function(){
                                            $("#myModal").modal("show");
                                            $("#txtfname").val($(this).closest('tr').children()[6].textContent);
                                        });
                                    </script>
                                    {!! Form::close() !!}
                                </div>

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


        function showDiv() {
            //document.getElementById('comment').style.display = "block";
            if($('#comment').css('display') == 'none'){
                $('#comment').show('slow');
            } else {
                $('#comment').hide('slow');
            }
        }

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