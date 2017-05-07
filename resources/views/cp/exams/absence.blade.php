@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">

                @include('errors.errors')

                <div class="panel panel-default">
                    <div class="panel-heading">إدخال غياب طالب</div>

                    <div class="panel-body">

                        {!! Form::open(['url' => 'cp/exams/absence/update', 'method' => 'post','class'=>'newsletter-form' ]) !!}



                        {{-- {!! Form::label('اختر التاريخ',' ??????:') !!}
                         {!! Form::select('center_second',$dates ,null, ['class' => 'form-control']) !!}--}}
                        {{--{!! Form::select('date', ['' => 'Select'] +$dates,'',array('class'=>'form-control','id'=>'date','style'=>'width:350px;'))!!}--}}
                         {{--  <label>  اختر التاريخ :</label>--}}
                        {!! Form::label('date_l','التاريخ', ['id' => 'date_l']) !!}
                            <select name="date" class="form-control selectpicker" id="date" style="width:350px" data-live-search="true">
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
                            $(document).ready(function() { $("#course_l").hide(); $("#student_l").hide(); });
                            //$('.selectpicker').selectpicker();
                            $('#date').change(function(){
                                var date = $(this).val();
                                if(date){
                                    $.ajax({
                                        type:"GET",
                                        url:"{{url('cp/exams/absence/course')}}?date="+date,
                                        success:function(res){
                                            if(res){
                                                $("#course").empty();
                                                $("#cc").append('<select name="course" id="course" class="form-control selectpicker" style="width:350px" data-live-search="true"> <option>اختر المادة</option>');
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
                                                $("#ss").append('<select name="students" id="students" class="form-control selectpicker" style="width:350px" data-live-search="true"> <option>اختر الطالب</option>');
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