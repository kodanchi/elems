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
                    <div class="panel-heading">إدخال غياب طالب</div>

                    <div class="panel-body">
                        {{--{!! Form::open(['url' => 'cp/exams/absence/update', 'method' => 'post','class'=>'newsletter-form' ]) !!}--}}



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
                        <br>

                        <div id="cc" name="cc">
                            {!! Form::label('course_l','المادة', ['id' => 'course_l']) !!}
                        </div>
                        <br>

                        <div id="ss" name="ss">
                            {!! Form::label('student_l','الطالب', ['id' => 'student_l']) !!}
                        </div>
                        <br>

                        <button id="btn" name="btn" class="btn btn-primary col-md-3">تحديث</button>
                        <button id="btnBack" name="btnBack" class="btn btn-default col-md-3" onclick="location.href='{{url('/cp/exams/services/home')}}';">رجوع</button>
                        {{--<select name="dcd" id="cd" class="form-control selectpicker" data-live-search="true"  style="width:350px">
                            <option value="">اختر</option>
                            <option value="">اختر</option>
                            <option value="">اختر</option>
                            </select>--}}

                        <script type="text/javascript">
                            $(document).ready(function() { $("#date_l").hide(); $("#course_l").hide(); $("#center_l").hide(); $("#student_l").hide(); $("#building_l").hide(); });
                            //$('.selectpicker').selectpicker();
                            $('#date').change(function(){
                                var date = $(this).val();
                                if(date){
                                    $.ajax({
                                        type:"GET",
                                        url:"{{url('cp/exams/absence/center')}}?date="+date,
                                        success:function(res){
                                            if(res){
                                                $("#center").empty();
                                                $("#cn").empty();
                                                $("#course").empty();
                                                $("#cc").empty();
                                                $("#buildings").empty();
                                                $("#building").empty();
                                                $("#students").empty();
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
                                                $("#course").empty();
                                                $("#cc").empty();
                                                $("#buildings").empty();
                                                $("#building").empty();
                                                $("#students").empty();
                                                $("#ss").empty();
                                                $("#center_l").hide();
                                            }
                                        }
                                    });

                                }else{
                                    $("#center").empty();
                                    $("#cn").empty();
                                    $("#course").empty();
                                    $("#cc").empty();
                                    $("#buildings").empty();
                                    $("#building").empty();
                                    $("#students").empty();
                                    $("#ss").empty();
                                }
                            });
                            $('#cn').change(function(){
                                var center = $("#center").val();
                                var date = $("#date").val();
                                if(center && date){
                                    $.ajax({
                                        type:"GET",
                                        url:"{{url('cp/exams/absence/building')}}?center="+center+"&date="+date,
                                        success:function(res){
                                            if(res){
                                                $("#course").empty();
                                                $("#cc").empty();
                                                $("#buildings").empty();
                                                $("#building").empty();
                                                $("#students").empty();
                                                $("#ss").empty();
                                                $("#buildings").append('<select name="building" id="building" class="form-control selectpicker" style="width:350px" data-live-search="true" required> <option value="">اختر المبنى</option>');
                                                $.each(res,function(key,value){
                                                    $("#building").append('<option value="'+value+'">'+value+'</option>');
                                                });
                                                $("#buildings").append('</select>');
                                                $('#building').selectpicker('refresh');
                                                $("#building_l").show();
                                            }else{
                                                $("#course").empty();
                                                $("#cc").empty();
                                                $("#buildings").empty();
                                                $("#building").empty();
                                                $("#students").empty();
                                                $("#ss").empty();
                                                $("#building_l").hide();
                                            }
                                        }
                                    });

                                }else{
                                    $("#course").empty();
                                    $("#cc").empty();
                                    $("#buildings").empty();
                                    $("#building").empty();
                                    $("#students").empty();
                                    $("#ss").empty();
                                }
                            });
                            $('#buildings').change(function(){
                                var center = $("#center").val();
                                var date = $("#date").val();
                                var building = $("#building").val();
                                if(center && date){
                                    $.ajax({
                                        type:"GET",
                                        url:"{{url('cp/exams/absence/course')}}?center="+center+"&date="+date+"&building="+building,
                                        success:function(res){
                                            if(res){
                                                $("#course").empty();
                                                $("#cc").empty();
                                                $("#students").empty();
                                                $("#ss").empty();
                                                $("#cc").append('<select name="course" id="course" class="form-control selectpicker" style="width:350px" data-live-search="true" required> <option value="">اختر المادة</option>');
                                                $.each(res,function(key,value){
                                                    $("#course").append('<option value="'+value+'">'+value+'</option>');
                                                });
                                                $("#cc").append('</select>');
                                                $('#course').selectpicker('refresh');
                                                $("#course_l").show();
                                            }else{
                                                $("#course").empty();
                                                $("#cc").empty();
                                                $("#students").empty();
                                                $("#ss").empty();
                                                $("#course_l").hide();
                                            }
                                        }
                                    });

                                }else{
                                    $("#cc").empty();
                                    $("#ss").empty();
                                    $("#course").empty();
                                    $("#students").empty();
                                }
                            });
                            $('#cc').on('change',function(){
                                var CID = $("#course").val();
                                var date = $("#date").val();
                                var building = $("#building").val();
                                if(CID && date && building){
                                    //alert(CID + date + building);
                                    $.ajax({
                                        type:"GET",
                                        url:"{{url('cp/exams/absence/students')}}?CID="+CID+"&date="+date+"&building="+building,
                                        success:function(res){
                                            //alert("in");
                                            if(res){
                                                $("#ss").empty();
                                                $("#students").empty();
                                                $("#student_l").show();
                                                $("#ss").append('<select name="students" id="students" class="form-control selectpicker" style="width:350px" data-live-search="true" required> <option value="">اختر الطالب</option>');
                                                $.each(res,function(key,value){
                                                    $("#students").append('<option value="'+key+'">'+value+' | '+key+'</option>');
                                                });
                                                $("#ss").append('</select>');
                                                $('#students').selectpicker('refresh');
                                                $("#student_l").show();
                                            }else{
                                                $("#ss").empty();
                                                $("#students").empty();
                                                $("#student_l").hide();
                                            }
                                        }
                                    });

                                }else{
                                    $("#ss").empty();
                                    $("#students").empty();
                                }

                            });

                            $('#btn').on('click',function(){
                                //alert("aaaa");
                                var CID = $("#course").val();
                                var date = $("#date").val();
                                var building = $("#building").val();
                                var student = $("#students").val();
                                var center = $("#center").val();
                                if(CID && date && building && student && center){
                                    //alert(CID + date + building + student);
                                    $.ajax({
                                        type:"GET",
                                        url:"{{url('cp/exams/absence/update')}}?CID="+CID+"&date="+date+"&building="+building+"&student="+student+"&center="+center,
                                        success:function(res){
                                            //alert("in");
                                            if(res){
                                                $("#xyz").empty();
                                                //alert(res);
                                                if(res=='لقد تم تغييب الطالب بنجاح'){
                                                    $("#xyz").append('<h5 class="alert alert-info">'+res+'</h5>');
                                                }else if (res=='حدث خطأ, لقد تم تغييب الطالب سابقا')
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

                            /*$('#btnBack').on('click',function(){
                                //alert("aaaa");

                            });*/
                        </script>

                        <input  name="status" type="hidden" value="1">

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