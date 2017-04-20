@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-md-offset-4">

                @include('errors.errors')
                @include('errors.status')

                <div class="panel panel-default">
                    <div class="panel-heading">إدخال توقيع حضور المراقب</div>

                    <div class="panel-body">

                        {!! Form::open(['url' => 'cp/exams/testers/update', 'method' => 'post','class'=>'newsletter-form' ]) !!}



                        {{-- {!! Form::label('اختر التاريخ',' ??????:') !!}
                         {!! Form::select('center_second',$dates ,null, ['class' => 'form-control']) !!}--}}
                        {{--{!! Form::select('date', ['' => 'Select'] +$dates,'',array('class'=>'form-control','id'=>'date','style'=>'width:350px;'))!!}--}}
                         {{--  <label>  اختر التاريخ :</label>--}}
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

                        <div id="centers" name="centers">
                            </div>
                        <br>

                        <div id="NIDs" name="sNIDss">
                        </div>
                        <br>


                        {{--<select name="dcd" id="cd" class="form-control selectpicker" data-live-search="true"  style="width:350px">
                            <option value="">اختر</option>
                            <option value="">اختر</option>
                            <option value="">اختر</option>
                            </select>--}}

                        <script type="text/javascript">
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
                                                $("#centers").append('<select name="center" id="center" class="form-control selectpicker" style="width:350px" data-live-search="true">');
                                                var x=0;
                                                $.each(res,function(key,value){
                                                    if (x==0){
                                                        $("#center").append('<option>اختر المركز</option>');
                                                    }
                                                    $("#center").append('<option value="'+key+'">'+value+'</option>');
                                                    x++;
                                                });
                                                $("#centers").append('</select>');
                                                $('#center').selectpicker('refresh');
                                            }else{
                                                $("#center").empty();
                                            }
                                        }
                                    });

                                }else{
                                    $("#center").empty();
                                    $("#NID").empty();
                                }
                            });
                            $('#centers').on('change',function(){
                                var CID = $("#center").val();
                                var date = $("#date").val();
                                //alert(date +" ddd "+ CID);
                                if(CID && date){
                                    $.ajax({
                                        type:"GET",
                                        url:"{{url('cp/exams/testers/nid')}}?CID="+CID+"&date="+date,
                                        success:function(res){
                                            if(res){
                                                $("#NID").empty();
                                                $("#NIDs").append('<select name="NID" id="NID" class="form-control selectpicker" style="width:350px" data-live-search="true">');
                                                var y=0;
                                                $.each(res,function(key,value){
                                                    if (y==0){
                                                        $("#NID").append('<option>اختر رقم الهوية / الإقامة</option>');
                                                    }
                                                    $("#NID").append('<option value="'+key+'">'+value+'</option>');
                                                    y++;
                                                });
                                                $("#NIDs").append('</select>');
                                                $('#NID').selectpicker('refresh');
                                            }else{
                                                $("#NID").empty();
                                            }
                                        }
                                    });

                                }else{
                                    $("#NID").empty();
                                }

                            });
                        </script>

                        <input  name="status" type="hidden" value="1">

                        {!! Form::submit('موافق', ['class' => ' col-md-3']) !!}

                        {!! Form::close() !!}


                    </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





@endsection