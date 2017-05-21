@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">

                @include('errors.errors')
                @include('errors.status')

                <div class="panel panel-default">
                    <div class="panel-heading">تقييم المراقب</div>

                    <div class="panel-body">

                        {!! Form::open(['url' => 'cp/exams/testersMK/update', 'method' => 'post','class'=>'newsletter-form' ]) !!}


                        {!! Form::label('date_l','التاريخ', ['id' => 'date_l']) !!}
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

                        <div id="courses" name="courses">
                            {!! Form::label('course_l','المادة', ['id' => 'course_l']) !!}
                            </div>
                        <br>

                        <div id="cards" name="cards">
                            {!! Form::label('card_l','رقم المراقب', ['id' => 'card_l']) !!}
                        </div>
                        <br>

                        <script type="text/javascript">
                            $(document).ready(function() { $("#course_l").hide(); $("#card_l").hide(); $("#time_l").hide(); $("#date_l").hide();$("#rate_l").hide();});
                            //$('.selectpicker').selectpicker();
                            $('#date').change(function(){
                                var date = $(this).val();
                                //alert(date);
                                if(date){
                                    $.ajax({
                                        type:"GET",
                                        url:"{{url('cp/exams/testersMK/courses')}}?date="+date,
                                        success:function(res){
                                            if(res){
                                                $("#course").empty();
                                                $("#courses").empty();
                                                $("#card").empty();
                                                $("#cards").empty();
                                                $("#courses").append('<select name="course" id="course" class="form-control selectpicker" style="width:350px" data-live-search="true" required>');
                                                var x=0;
                                                $.each(res,function(key,value){
                                                    if (x==0) {
                                                        $("#course").append('<option value="">اختر المادة</option>');
                                                    }
                                                    $("#course").append('<option value="'+key+'">'+value+'</option>');
                                                    x++;
                                                });
                                                $("#courses").append('</select>');
                                                $('#course').selectpicker('refresh');
                                                $("#course_l").show();
                                            }else{
                                                $("#course").empty();
                                                $("#courses").empty();
                                                $("#card").empty();
                                                $("#cards").empty();
                                                $("#course_l").hide();
                                            }
                                        }
                                    });

                                }else{
                                    $("#course").empty();
                                    $("#courses").empty();
                                    $("#card").empty();
                                    $("#cards").empty();
                                }
                            });
                            $('#courses').on('change',function(){
                                var CID = $("#course").val();
                                var date = $("#date").val();
                                //alert(date);
                                //alert(date +" ddd "+ CID);
                                if(CID && date){
                                    $.ajax({
                                        type:"GET",
                                        url:"{{url('cp/exams/testersMK/card')}}?CID="+CID+"&date="+date,
                                        success:function(res){
                                            if(res){
                                                $("#card").empty();
                                                $("#cards").empty();
                                                $("#cards").append('<select name="card" id="card" class="form-control selectpicker" style="width:350px" data-live-search="true" required>');
                                                var y=0;
                                                $.each(res,function(key,value){
                                                    if (y==0){
                                                        $("#card").append('<option value="">اختر رقم المراقب</option>');
                                                    }
                                                    $("#card").append('<option value="'+key+'">'+value+'</option>');
                                                    y++;
                                                });
                                                $("#cards").append('</select>');
                                                $('#card').selectpicker('refresh');
                                                $("#card_l").show();
                                            }else{
                                                $("#card").empty();
                                                $("#cards").empty();
                                                $("#card_l").hide();
                                            }
                                        }
                                    });

                                }else{
                                    $("#card").empty();
                                }

                            });

                        </script>


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
                                                        {!! Form::label('comment', 'ملاحظات التقييم:') !!}
                                                        {!! Form::textarea('comment', null, ['class' => 'form-control']) !!}
                                                    </div>
                                                </div>


                        {!! Form::submit('تحديث', ['class' => ' col-md-3']) !!}

                        {!! Form::close() !!}
                        <button id="btnBack" name="btnBack" style="height: 42px" class="btn btn-default col-md-3" onclick="location.href='{{url('/cp/exams/services/home')}}';">رجوع</button>


                    </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





@endsection