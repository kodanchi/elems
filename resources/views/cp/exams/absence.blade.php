@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">

                @include('errors.errors')
                @include('errors.status')

                <div class="panel panel-default">
                    <div class="panel-heading">إدخال غياب طالب</div>

                    <div class="panel-body">

                        {!! Form::open(['url' => 'cp/exams/absence/update', 'method' => 'post','class'=>'newsletter-form' ]) !!}



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
                                    <option value="{{ $dates[$x]->date }}">{{ $dates[$x]->date}}</option>
                                <?php
                                }
                                ?>
                            </select>
                        <br>
                        <br>

                        <div id="cn" name="cn">
                            {!! Form::label('center_l','المادة', ['id' => 'center_l']) !!}
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


                        {{--<select name="dcd" id="cd" class="form-control selectpicker" data-live-search="true"  style="width:350px">
                            <option value="">اختر</option>
                            <option value="">اختر</option>
                            <option value="">اختر</option>
                            </select>--}}

                        <script type="text/javascript">
                            $(document).ready(function() { $("#course_l").hide(); $("#center_l").hide(); $("#student_l").hide(); });
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
                                                $("#course").empty();
                                                $("#students").empty();
                                                $("#cn").append('<select name="center" id="center" class="form-control selectpicker" style="width:350px" data-live-search="true" required> <option value="">اختر المركز</option>');
                                                var x=0;
                                                @if(in_array('admin',Auth::user()->getAllroles()))
                                                $.each(res,function(key,value){
                                                    $("#center").append('<option value="'+key+'">'+value+'</option>');
                                                });
                                                @elseif(in_array('RM',Auth::user()->getAllroles()))
                                                if (x==0){
                                                    $("#center").append('<option value="1">المقر الرئيسي للجامعة (الراكة)</option>');
                                                }
                                                @elseif(in_array('DM',Auth::user()->getAllroles()))
                                                if (x==0){
                                                    $("#center").append('<option value="2">كلية التربية بالدمام (المريكبات)</option>');
                                                }
                                                @elseif(in_array('HM',Auth::user()->getAllroles()))
                                                if (x==0){
                                                    $("#center").append('<option value="3">مبنى السنة التحضيرية بحفر الباطن</option>');
                                                }
                                                @elseif(in_array('JM',Auth::user()->getAllroles()))
                                                if (x==0){
                                                    $("#center").append('<option value="4">كلية التربية بالجبيل</option>');
                                                }
                                                @elseif(in_array('KM',Auth::user()->getAllroles()))
                                                if (x==0){
                                                    $("#center").append('<option value="5">كلية العلوم والآداب بالخفجي</option>');
                                                }
                                                @elseif(in_array('NM',Auth::user()->getAllroles()))
                                                if (x==0){
                                                    $("#center").append('<option value="6">كلية العلوم والآداب بالنعيرية</option>');
                                                }
                                                @elseif(in_array('RF',Auth::user()->getAllroles()))
                                                if (x==0){
                                                    $("#center").append('<option value="7">المقر الرئيسي للجامعة (الراكة)</option>');
                                                }
                                                @elseif(in_array('DF',Auth::user()->getAllroles()))
                                                if (x==0){
                                                    $("#center").append('<option value="">اختر المركز</option>');
                                                    $("#center").append('<option value="8">كلية البنات بالدمام (الريان)</option>');
                                                }
                                                @elseif(in_array('HF',Auth::user()->getAllroles()))
                                                if (x==0){
                                                    $("#center").append('<option value="9">كلية التربية الأدبية بحفر الباطن</option>');
                                                }
                                                @elseif(in_array('JF',Auth::user()->getAllroles()))
                                                if (x==0){
                                                    $("#center").append('<option value="10">كلية التربية بالجبيل</option>');
                                                }
                                                @elseif(in_array('KF',Auth::user()->getAllroles()))
                                                if (x==0){
                                                    $("#center").append('<option value="11">كلية العلوم والآداب بالخفجي</option>');
                                                }
                                                @elseif(in_array('NF',Auth::user()->getAllroles()))
                                                if (x==0){
                                                    $("#center").append('<option value="12">كلية العلوم والآداب بالنعيرية</option>');
                                                }
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
                                                @endforelse
                                                $("#cn").append('</select>');
                                                $('#center').selectpicker('refresh');
                                                $("#center_l").show();
                                            }else{
                                                $("#center").empty();
                                                $("#center_l").hide();
                                            }
                                        }
                                    });

                                }else{
                                    $("#center").empty();
                                    $("#course").empty();
                                    $("#students").empty();
                                }
                            });
                            $('#cn').change(function(){
                                var center = $("#center").val();
                                var date = $("#date").val();
                                if(center && date){
                                    $.ajax({
                                        type:"GET",
                                        url:"{{url('cp/exams/absence/course')}}?center="+center+"&date="+date,
                                        success:function(res){
                                            if(res){
                                                $("#course").empty();
                                                $("#students").empty();
                                                $("#cc").append('<select name="course" id="course" class="form-control selectpicker" style="width:350px" data-live-search="true" required> <option value="">اختر المادة</option>');
                                                $.each(res,function(key,value){
                                                    $("#course").append('<option value="'+value+'">'+value+'</option>');
                                                });
                                                $("#cc").append('</select>');
                                                $('#course').selectpicker('refresh');
                                                $("#course_l").show();
                                            }else{
                                                $("#course").empty();
                                                $("#course_l").hide();
                                            }
                                        }
                                    });

                                }else{
                                    $("#course").empty();
                                    $("#students").empty();
                                }
                            });
                            $('#cc').on('change',function(){
                                var CID = $("#course").val();
                                if(CID){
                                    $.ajax({
                                        type:"GET",
                                        url:"{{url('cp/exams/absence/students')}}?CID="+CID,
                                        success:function(res){
                                            if(res){
                                                $("#students").empty();
                                                $("#ss").append('<select name="students" id="students" class="form-control selectpicker" style="width:350px" data-live-search="true" required> <option value="">اختر الطالب</option>');
                                                $.each(res,function(key,value){
                                                    $("#students").append('<option value="'+value+'">'+value+' | '+key+'</option>');
                                                });
                                                $("#ss").append('</select>');
                                                $('#students').selectpicker('refresh');
                                                $("#student_l").show();
                                            }else{
                                                $("#students").empty();
                                                $("#student_l").hide();
                                            }
                                        }
                                    });

                                }else{
                                    $("#students").empty();
                                }

                            });
                        </script>

                        <input  name="status" type="hidden" value="1">

                        {!! Form::submit('تحديث', ['class' => ' col-md-3']) !!}
                      {{--  <a href="/cp/exams/services/home" class="button col-md-3">{{trans('settings.back')}}</a>--}}

                        {!! Form::close() !!}


                    </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





@endsection