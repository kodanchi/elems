@extends('layouts.app')
<?php use Illuminate\Support\Facades\Input;?>
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">

                @include('errors.errors')
                @include('errors.status')

                <div id="xyz" name="xyz">

                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">إدخال ملاحظات على الطالب</div>

                    <div class="panel-body">
                        {!! Form::open(['url' => 'cp/exams/notice/update', 'method' => 'post', 'files' => true,'class'=>'newsletter-form' ]) !!}



                        {{-- {!! Form::label('اختر التاريخ',' ??????:') !!}
                         {!! Form::select('center_second',$dates ,null, ['class' => 'form-control']) !!}--}}
                        {{--{!! Form::select('date', ['' => 'Select'] +$dates,'',array('class'=>'form-control','id'=>'date','style'=>'width:350px;'))!!}--}}
                        {{--  <label>  اختر التاريخ :</label>--}}
                        {!! Form::label('date_l','التاريخ', ['id' => 'date_l']) !!}
                        <select name="date" class="form-control selectpicker" id="date" style="width:350px" data-live-search="true" required>
                            <option value="" style="direction: ltr">اختر التاريخ</option>
                            @<?php
                            for ($x = 0; $x < sizeof($dates); $x++) {
                            ?>
                            <option value="{{ $dates[$x]->date }}">{{ $dates[$x]->date}} ({{ $dates[$x]->higri_date}})</option>
                            <?php
                            }
                            ?>
                        </select>
                        <br>
                        <br>

                        <div id="cn" name="cn">
                            {!! Form::label('center_l','المركز', ['id' => 'center_l']) !!}
                        </div>
                        <br>

                        <div id="buildings" name="buildings" class="form-group">
                            {!! Form::label('building_l','المبنى', ['id' => 'building_l']) !!}
                        </div>

                        {{--<div id="cc" name="cc">
                            {!! Form::label('course_l','المادة', ['id' => 'course_l']) !!}
                        </div>
                        <br>--}}

                        <div id="ss" name="ss">
                            {!! Form::label('SID_l','الطالب', ['id' => 'SID_l']) !!}
                        </div>
                        <br>

                        <div class="form-group">
                            {{--{!! Form::label('notice_l','الماحظة', ['id' => 'notice_l']) !!}<br>--}}
                            {!! Form::select('notice',trans('notice.notice'), null, ['class' => 'form-control selectpicker','required','id'=>'notice']) !!}
                        </div>
                        <br>

                        <div class="col-md-12">
                            <!--- Des Field --->
                            <div class="form-group">
                                {!! Form::label('comment_l', 'الشرح:') !!}
                                {!! Form::textarea('comment', null, ['class' => 'form-control','id'=>'comment','required']) !!}
                            </div>
                        </div>
                        <br>

                        <div class="col-md-12">
                            <!--- Upload Field --->
                            <div class="form-group">
                                {!! Form::label('attach_l', 'إرفاق الملف: ') !!}
                                {!! Form::file('attach', ['class' => 'form-control','accept'=>'.pdf', 'id'=>'attach']) !!}
                                <small class="red">الحجم المسموح: 4MB أو أقل</small>
                            </div>
                        </div>
                        <br>

                        {!! Form::submit('تحديث', ['class' => ' col-md-3']) !!}
                        {!! Form::close() !!}
                        <button id="btnBack" name="btnBack" style="height: 42px" class="btn btn-default col-md-3" onclick="location.href='{{url('/cp/exams/services/home')}}';">رجوع</button>
                        {{--<button id="btn" name="btn" class="btn btn-primary col-md-3">تحديث</button>--}}
                        {{--<select name="dcd" id="cd" class="form-control selectpicker" data-live-search="true"  style="width:350px">
                            <option value="">اختر</option>
                            <option value="">اختر</option>
                            <option value="">اختر</option>
                            </select>--}}

                        <script type="text/javascript">
                            $(document).ready(function() { $("#date_l").hide(); $("#course_l").hide(); $("#center_l").hide(); $("#SID_l").hide(); $("#building_l").hide(); });
                            //$('.selectpicker').selectpicker();
                            $('#date').change(function(){
                                var date = $(this).val();
                                if(date){
                                    $.ajax({
                                        type:"GET",
                                        url:"{{url('cp/exams/notice/center')}}?date="+date,
                                        success:function(res){
                                            if(res){
                                                $("#center").empty();
                                                $("#cn").empty();
                                                //$("#course").empty();
                                                //$("#cc").empty();
                                                $("#buildings").empty();
                                                $("#building").empty();
                                                $("#SID").empty();
                                                $("#ss").empty();
                                                $("#cn").append('<select name="center" id="center" class="form-control selectpicker" style="width:350px" data-live-search="true" required> <option value="">اختر المركز</option>');
                                                var x=0;
                                                @if(in_array('admin',Auth::user()->getAllroles()))
                                                $.each(res,function(key,value){
                                                    @if (Input::old('center'))
                                                    $("#center").append('<option value="'+old('center')+'" selected>'+value+'</option>');
                                                    @else
                                                            $("#center").append('<option value="'+key+'">'+value+'</option>');
                                                            @endif

                                                });
                                                @elseif(in_array('RM',Auth::user()->getAllroles()))
                                                if (x==0){
                                                    $("#center").append('<option value="1">المقر الرئيسي للجامعة (الراكة)</option>');
                                                }
                                                @elseif(in_array('DM',Auth::user()->getAllroles()))
                                                if (x==0){
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
                                                    $("#center").append('<option value="7">المقر الرئيسي للجامعة (الراكة)</option>');
                                                }
                                                @elseif(in_array('DF',Auth::user()->getAllroles()))
                                                if (x==0){
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
                                                    $("#center").append('<option value="13">سجن الخبر</option>');
                                                }
                                                @elseif(in_array('JD',Auth::user()->getAllroles()))
                                                if (x==0){
                                                    $("#center").append('<option value="14">سجن الدمام</option>');
                                                }
                                                @elseif(in_array('JQ',Auth::user()->getAllroles()))
                                                if (x==0){
                                                    $("#center").append('<option value="15">سجن القطيف</option>');
                                                }
                                                @elseif(in_array('KM',Auth::user()->getAllroles()) || in_array('KF',Auth::user()->getAllroles()))
                                                if (x==0){
                                                    $("#center").append('<option value="5">(M) كلية العلوم والآداب بالخفجي</option>');
                                                    $("#center").append('<option value="11">(F) كلية العلوم والآداب بالخفجي</option>');
                                                }
                                                @elseif(in_array('JM',Auth::user()->getAllroles()) || in_array('JF',Auth::user()->getAllroles()))
                                                if (x==0){
                                                    $("#center").append('<option value="4">(M) كلية التربية بالجبيل</option>');
                                                    $("#center").append('<option value="10">(F) كلية التربية بالجبيل</option>');
                                                }
                                                @elseif(in_array('NM',Auth::user()->getAllroles()) || in_array('NF',Auth::user()->getAllroles()))
                                                if (x==0){
                                                    $("#center").append('<option value="6">(M) كلية العلوم والآداب بالنعيرية</option>');
                                                    $("#center").append('<option value="12">(F) كلية العلوم والآداب بالنعيرية</option>');
                                                }
                                                @elseif(in_array('HM',Auth::user()->getAllroles()) && in_array('HF',Auth::user()->getAllroles()))
                                                if (x==0){
                                                    $("#center").append('<option value="3">(M) مبنى السنة التحضيرية بحفر الباطن</option>');
                                                    $("#center").append('<option value="9">(F) كلية التربية الأدبية بحفر الباطن</option>');
                                                }
                                                @endforelse
                                                $("#cn").append('</select>');
                                                $('#center').selectpicker('refresh');
                                                $("#center_l").show();
                                            }else{
                                                $("#center").empty();
                                                $("#cn").empty();
                                                //$("#course").empty();
                                                //$("#cc").empty();
                                                $("#buildings").empty();
                                                $("#building").empty();
                                                $("#SID").empty();
                                                $("#ss").empty();
                                                $("#center_l").hide();
                                            }
                                        }
                                    });

                                }else{
                                    $("#center").empty();
                                    $("#cn").empty();
                                    //$("#course").empty();
                                    //$("#cc").empty();
                                    $("#buildings").empty();
                                    $("#building").empty();
                                    $("#SID").empty();
                                    $("#ss").empty();
                                }
                            });
                            $('#cn').change(function(){
                                var center = $("#center").val();
                                var date = $("#date").val();
                                if(center && date){
                                    $.ajax({
                                        type:"GET",
                                        url:"{{url('cp/exams/notice/building')}}?center="+center+"&date="+date,
                                        success:function(res){
                                            if(res){
                                                //$("#course").empty();
                                                //$("#cc").empty();
                                                $("#buildings").empty();
                                                $("#building").empty();
                                                $("#SID").empty();
                                                $("#ss").empty();
                                                $("#buildings").append('<select name="building" id="building" class="form-control selectpicker" style="width:350px" data-live-search="true" required> <option value="">اختر المبنى</option>');
                                                $.each(res,function(key,value){
                                                    $("#building").append('<option value="'+value+'">'+value+'</option>');
                                                });
                                                $("#buildings").append('</select>');
                                                $('#building').selectpicker('refresh');
                                                $("#building_l").show();
                                            }else{
                                                //$("#course").empty();
                                                //$("#cc").empty();
                                                $("#buildings").empty();
                                                $("#building").empty();
                                                $("#SID").empty();
                                                $("#ss").empty();
                                                $("#building_l").hide();
                                            }
                                        }
                                    });

                                }else{
                                    //$("#course").empty();
                                    //$("#cc").empty();
                                    $("#buildings").empty();
                                    $("#building").empty();
                                    $("#SID").empty();
                                    $("#ss").empty();
                                }
                            });
                            $('#buildings').change(function(){
                                var center = $("#center").val();
                                var date = $("#date").val();
                                var building = $("#building").val();
                                if(center && date && building){
                                    $.ajax({
                                        type:"GET",
                                        url:"{{url('cp/exams/notice/SID')}}?center="+center+"&date="+date+"&building="+building,
                                        success:function(res){
                                            if(res){
                                                //$("#course").empty();
                                                //$("#cc").empty();
                                                $("#SID").empty();
                                                $("#ss").empty();
                                                $("#ss").append('<select name="SID" id="SID" class="form-control selectpicker" style="width:350px" data-live-search="true" required> <option value="">اختر الطالب</option>');
                                                $.each(res,function(key,value){
                                                    $("#SID").append('<option value="'+key+'">'+value+' | '+key+'</option>');
                                                });
                                                $("#ss").append('</select>');
                                                $('#SID').selectpicker('refresh');
                                                $("#SID_l").show();
                                            }else{
                                                //$("#course").empty();
                                                //$("#cc").empty();
                                                $("#SID").empty();
                                                $("#ss").empty();
                                                //$("#course_l").hide();
                                            }
                                        }
                                    });

                                }else{
                                    //$("#cc").empty();
                                    $("#ss").empty();
                                    //$("#course").empty();
                                    $("#SID").empty();
                                }
                            });
                            /*$('#btn').on('click',function(){
                                //alert("aaaa");
                                //var CID = $("#course").val();
                                var date = $("#date").val();
                                var building = $("#building").val();
                                var ID = $("#SID").val();
                                var center = $("#center").val();
                                var attach = $("#attach").val();
                                var notice = $("#notice").val();
                                var comment = $("#comment").val();
                                if(date && building && ID && center && attach && notice && comment){
                                    alert(center + date + building + ID + attach + notice + comment);
                                    $.ajax({
                                        type:"GET",
                                        url:"*/{{--{{url('cp/exams/notice/update')}}--}}/*?date="+date+"&building="+building+"&ID="+ID+"&center="+center+"&attach="+attach+"&notice="+notice+"&comment="+comment,
                                        success:function(res){
                                            alert("in");
                                            if(res){
                                                $("#xyz").empty();
                                                //alert(res);
                                                $("#xyz").append('<h5 class="alert alert-info">'+res+'</h5>');
                                                if(res=='لقد تم إضافة الملاحظة على الطالب بنجاح'){
                                                    $("#xyz").append('<h5 class="alert alert-info">'+res+'</h5>');
                                                    $("#attach").val('');
                                                }else if (res=='حدث خطأ, لقد تم إضافة هذه الملاحظة على الطالب بهذا التاريخ سابقا')
                                                    $("#xyz").append('<h5 class="alert alert-danger">'+res+'</h5>');
                                                $("#attach").val('');
                                                //$("#SID_l").show();
                                            }else{
                                                alert("out");
                                                $("#attach").val('');
                                                //$("#SID_l").hide();
                                            }
                                        }
                                    });

                                }else{
                                    //$("#SID").empty();
                                    //$("#SID_l").hide();
                                    //$("#attach").val('');
                                }

                            });*/

                            $('#attach').bind('change', function() {
                                //alert(this.files[0].size);
                                if (this.files[0].size>4000095) {
                                    //this.files[0].size gets the size of your file.
                                    alert("حجم الملف يجب ان يكون أقل من 4 ميجابايت");
                                    $("#attach").val('');
                                }
                            });
                        </script>


                       {{-- {!! Form::submit('تحديث', ['class' => ' col-md-3']) !!}--}}


                        {{--{!! Form::close() !!}--}}


                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>





@endsection