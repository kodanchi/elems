@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">

                @include('errors.errors')
                @include('errors.status')

                <div id="xyz" name="xyz">

                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">إدخال توقيع حضور المراقب</div>

                    <div class="panel-body">

                        {{--{!! Form::open(['url' => 'cp/exams/testers/update', 'method' => 'post','class'=>'newsletter-form' ]) !!}--}}



                        {{-- {!! Form::label('اختر التاريخ',' ??????:') !!}
                         {!! Form::select('center_second',$dates ,null, ['class' => 'form-control']) !!}--}}
                        {{--{!! Form::select('date', ['' => 'Select'] +$dates,'',array('class'=>'form-control','id'=>'date','style'=>'width:350px;'))!!}--}}
                         {{--  <label>  اختر التاريخ :</label>--}}
                        {!! Form::label('date_l','التاريخ', ['id' => 'date_l']) !!}

                        {!! Form::hidden('user_id', $systemUserID, ['id' => 'user_id']) !!}
                        {!! Form::hidden('user_name', $systemUserName, ['id' => 'user_name']) !!}
                            <select name="date" class="form-control selectpicker" id="date" style="width:350px" data-live-search="true" required>
                                <option value="" style="direction: ltr">اختر التاريخ</option>
                                <?php
                                for ($x = 0; $x < sizeof($dates); $x++) {
                                ?>
                                    <option value="{{ $dates[$x]->date }}">{{ $dates[$x]->date}} ({{ $dates[$x]->higri_date}})</option>
                                <?php
                                }
                                ?>
                            </select>
                        <br>
                        <br>

                        <div id="centers" name="centers">
                            {!! Form::label('center_l','المركز', ['id' => 'center_l']) !!}
                            </div>
                        <br>

                        <div id="NIDs" name="sNIDss">
                            {!! Form::label('nid_l','رقم الهوية/الإقامة', ['id' => 'nid_l']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('time_l','الوقت', ['id' => 'time_l']) !!}<br>
                            {!! Form::select('time',trans('testersAllocation.time'), null, ['class' => 'form-control selectpicker','required','id'=>'time']) !!}
                        </div>

                        <!--- Rate Field --->
                        <div class="form-group">
                            {!! Form::label('rate_l', 'التقييم:', ['id' => 'rate_l']) !!}
                            <select name="rate" class="form-control selectpicker" id="rate" style="width:350px" data-live-search="true" required>
                                <option value="" style="direction: ltr">اختر التقييم</option>
                                <?php
                                for ($x = 0; $x <= 10; $x++) {
                                ?>
                                <option value="{{$x}}">{{$x}}</option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <!--- Des Field --->
                            <div class="form-group">
                                {!! Form::label('comment_l', 'ملاحظات التقييم:') !!}
                                {!! Form::textarea('comment', null, ['class' => 'form-control','id'=>'comment']) !!}
                            </div>
                        </div>

                        <button id="btn" name="btn" class="btn btn-primary col-md-3">تحديث</button>
                        <button id="btnBack" name="btnBack" class="btn btn-default col-md-3" onclick="location.href='{{url('/cp/exams/services/home')}}';">رجوع</button>
                        {{--<select name="dcd" id="cd" class="form-control selectpicker" data-live-search="true"  style="width:350px">
                            <option value="">اختر</option>
                            <option value="">اختر</option>
                            <option value="">اختر</option>
                            </select>--}}

                        <script type="text/javascript">
                            $(document).ready(function() { $("#center_l").hide(); $("#nid_l").hide(); $("#time_l").hide(); $("#date_l").hide();$("#rate_l").hide();});
                            //$('.selectpicker').selectpicker();
                            $('#date').change(function(){
                                var date = $(this).val();
                                if(date){
                                    $.ajax({
                                        type:"GET",
                                        url:"{{url('cp/exams/testers/centers')}}?date="+date,
                                        success:function(res){
                                            if(res){
                                                $("#center").empty();
                                                $("#centers").empty();
                                                $("#NID").empty();
                                                $("#NIDs").empty();
                                                $("#centers").append('<select name="center" id="center" class="form-control selectpicker" style="width:350px" data-live-search="true" required>');
                                                var x=0;
                                                @if(in_array('admin',Auth::user()->getAllroles()))
                                                $.each(res,function(key,value){
                                                    if (x==0){
                                                        $("#center").append('<option value="">اختر المركز</option>');
                                                        $("#center").append('<option value="19">DL</option>');
                                                    }
                                                    $("#center").append('<option value="'+key+'">'+value+'</option>');
                                                    x++;
                                                });
                                                @elseif(in_array('RM',Auth::user()->getAllroles()))
                                                if (x==0){
                                                    $("#center").append('<option value="">اختر المركز</option>');
                                                    $("#center").append('<option value="1">المقر الرئيسي للجامعة (الراكة)</option>');
                                                }
                                                @elseif(in_array('DM',Auth::user()->getAllroles()))
                                                if (x==0){
                                                    $("#center").append('<option value="">اختر المركز</option>');
                                                    $("#center").append('<option value="2">كلية التربية بالدمام (المريكبات)</option>');
                                                }
                                                {{--@elseif(in_array('HM',Auth::user()->getAllroles()))
                                                if (x==0){
                                                    $("#center").append('<option value="">اختر المركز</option>');
                                                    $("#center").append('<option value="3">مبنى السنة التحضيرية بحفر الباطن</option>');
                                                }--}}
                                                        {{--@elseif(in_array('JM',Auth::user()->getAllroles()))
                                                        if (x==0){
                                                            $("#center").append('<option value="">اختر المركز</option>');
                                                            $("#center").append('<option value="4">كلية التربية بالجبيل</option>');
                                                        }--}}
                                                        {{--@elseif(in_array('KM',Auth::user()->getAllroles()))
                                                        if (x==0){
                                                            $("#center").append('<option value="">اختر المركز</option>');
                                                            $("#center").append('<option value="5">كلية العلوم والآداب بالخفجي</option>');
                                                        }--}}
                                                        {{--@elseif(in_array('NM',Auth::user()->getAllroles()))
                                                        if (x==0){
                                                            $("#center").append('<option value="">اختر المركز</option>');
                                                            $("#center").append('<option value="6">كلية العلوم والآداب بالنعيرية</option>');
                                                        }--}}
                                                        @elseif(in_array('RF',Auth::user()->getAllroles()))
                                                if (x==0){
                                                    $("#center").append('<option value="">اختر المركز</option>');
                                                    $("#center").append('<option value="7">المقر الرئيسي للجامعة (الراكة)</option>');
                                                }
                                                @elseif(in_array('DF',Auth::user()->getAllroles()))
                                                if (x==0){
                                                    $("#center").append('<option value="">اختر المركز</option>');
                                                    $("#center").append('<option value="8">كلية البنات بالدمام (الريان)</option>');
                                                }
                                                {{--@elseif(in_array('HF',Auth::user()->getAllroles()))
                                                if (x==0){
                                                    $("#center").append('<option value="">اختر المركز</option>');
                                                    $("#center").append('<option value="9">كلية التربية الأدبية بحفر الباطن</option>');
                                                }--}}
                                                        {{--@elseif(in_array('JF',Auth::user()->getAllroles()))
                                                        if (x==0){
                                                            $("#center").append('<option value="">اختر المركز</option>');
                                                            $("#center").append('<option value="10">كلية التربية بالجبيل</option>');
                                                        }--}}
                                                        {{--@elseif(in_array('KF',Auth::user()->getAllroles()))
                                                        if (x==0){
                                                            $("#center").append('<option value="">اختر المركز</option>');
                                                            $("#center").append('<option value="11">كلية العلوم والآداب بالخفجي</option>');
                                                        }--}}
                                                        {{--@elseif(in_array('NF',Auth::user()->getAllroles()))
                                                        if (x==0){
                                                            $("#center").append('<option value="">اختر المركز</option>');
                                                            $("#center").append('<option value="12">كلية العلوم والآداب بالنعيرية</option>');
                                                        }--}}
                                                        @elseif(in_array('JK',Auth::user()->getAllroles()))
                                                if (x==0){
                                                    $("#center").append('<option value="">اختر المركز</option>');
                                                    $("#center").append('<option value="13">سجن الخبر</option>');
                                                }
                                                @elseif(in_array('JD',Auth::user()->getAllroles()))
                                                if (x==0){
                                                    $("#center").append('<option value="">اختر المركز</option>');
                                                    $("#center").append('<option value="14">سجن الدمام</option>');
                                                }
                                                @elseif(in_array('JQ',Auth::user()->getAllroles()))
                                                if (x==0){
                                                    $("#center").append('<option value="">اختر المركز</option>');
                                                    $("#center").append('<option value="15">سجن القطيف</option>');
                                                }
                                                @elseif(in_array('KM',Auth::user()->getAllroles()) || in_array('KF',Auth::user()->getAllroles()))
                                                if (x==0){
                                                    $("#center").append('<option value="">اختر المركز</option>');
                                                    $("#center").append('<option value="5">(M) كلية العلوم والآداب بالخفجي</option>');
                                                    $("#center").append('<option value="11">(F) كلية العلوم والآداب بالخفجي</option>');
                                                }
                                                @elseif(in_array('JM',Auth::user()->getAllroles()) || in_array('JF',Auth::user()->getAllroles()))
                                                if (x==0){
                                                    $("#center").append('<option value="">اختر المركز</option>');
                                                    $("#center").append('<option value="4">(M) كلية التربية بالجبيل</option>');
                                                    $("#center").append('<option value="10">(F) كلية التربية بالجبيل</option>');
                                                }
                                                @elseif(in_array('NM',Auth::user()->getAllroles()) || in_array('NF',Auth::user()->getAllroles()))
                                                if (x==0){
                                                    $("#center").append('<option value="">اختر المركز</option>');
                                                    $("#center").append('<option value="6">(M) كلية العلوم والآداب بالنعيرية</option>');
                                                    $("#center").append('<option value="12">(F) كلية العلوم والآداب بالنعيرية</option>');
                                                }
                                                @elseif(in_array('HM',Auth::user()->getAllroles()) && in_array('HF',Auth::user()->getAllroles()))
                                                if (x==0){
                                                    $("#center").append('<option value="">اختر المركز</option>');
                                                    $("#center").append('<option value="3">(M) مبنى السنة التحضيرية بحفر الباطن</option>');
                                                    $("#center").append('<option value="9">(F) كلية التربية الأدبية بحفر الباطن</option>');
                                                }
                                                @endforelse
                                                $("#centers").append('</select>');
                                                $('#center').selectpicker('refresh');
                                                $("#center_l").show();
                                            }else{
                                                $("#center").empty();
                                                $("#centers").empty();
                                                $("#NID").empty();
                                                $("#NIDs").empty();
                                                $("#center_l").hide();
                                            }
                                        }
                                    });

                                }else{
                                    $("#center").empty();
                                    $("#centers").empty();
                                    $("#NID").empty();
                                    $("#NIDs").empty();
                                }
                            });
                            $('#centers').on('change',function(){
                                var CID = $("#center").val();
                                var date = $("#date").val();
                                //alert(date);
                                //alert(date +" ddd "+ CID);
                                if(CID && date){
                                    $.ajax({
                                        type:"GET",
                                        url:"{{url('cp/exams/testers/nid')}}?CID="+CID+"&date="+date,
                                        success:function(res){
                                            if(res){
                                                $("#NID").empty();
                                                $("#NIDs").empty();
                                                $("#NIDs").append('<select name="NID" id="NID" class="form-control selectpicker" style="width:350px" data-live-search="true" required>');
                                                var y=0;
                                                $.each(res,function(key,value){
                                                    if (y==0){
                                                        $("#NID").append('<option value="">اختر رقم الهوية / الإقامة</option>');
                                                    }
                                                    $("#NID").append('<option value="'+key+'">'+value+'</option>');
                                                    y++;
                                                });
                                                $("#NIDs").append('</select>');
                                                $('#NID').selectpicker('refresh');
                                                $("#nid_l").show();
                                            }else{
                                                $("#NID").empty();
                                                $("#NIDs").empty();
                                                $("#nid_l").hide();
                                            }
                                        }
                                    });

                                }else{
                                    $("#NID").empty();
                                }

                            });

                            $('#btn').on('click',function(){
                                //alert("aaaa");
                                var NID = $("#NID").val();
                                var date = $("#date").val();
                                var center = $("#center").val();
                                var rate = $("#rate").val();
                                var time = $("#time").val();
                                var comment = $("#comment").val();
                                var user_id = $("#user_id").val();
                                var user_name = $("#user_name").val();
                                //alert(user_id + user_name);
                                if(NID && date && center && time && rate){
                                    //alert(user_id + user_name);
                                    $.ajax({
                                        type:"GET",
                                        url:"{{url('cp/exams/testers/update')}}?NID="+NID+"&date="+date+"&center="+center+"&time="+time+"&rate="+rate+"&comment="+comment+"&user_id="+user_id+"&user_name="+user_name,
                                        success:function(res){
                                            //alert("in");
                                            if(res){
                                                $("#xyz").empty();
                                                //alert(res);
                                                if(res=='لقد تم تحضير المراقب بنجاح'){
                                                    $("#xyz").append('<h5 class="alert alert-info">'+res+'</h5>');
                                                }else if (res=='حدث خطأ, لقد تم تحضير المراقب سابقا')
                                                    $("#xyz").append('<h5 class="alert alert-danger">'+res+'</h5>');
                                                else if (res=='حدث خطأ, لم يتم تعيين المراقب بالتاريخ والوقت المحددين')
                                                    $("#xyz").append('<h5 class="alert alert-danger">'+res+'</h5>');
                                                //$("#student_l").show();
                                            }else{
                                                //$("#student_l").hide();
                                            }
                                        }
                                    });

                                }else{
                                    //$("#students").empty();
                                    //$("#student_l").hide();
                                }

                            });
                        </script>





{{--
                        <input  name="status" type="hidden" value="1">
--}}

                        {{--{!! Form::submit('تحديث', ['class' => ' col-md-3']) !!}--}}
                      {{--  <a href="/cp/exams/services/home" class="button col-md-3">{{trans('settings.back')}}</a>--}}
                        {{--{!! Form::close() !!}--}}


                    </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





@endsection