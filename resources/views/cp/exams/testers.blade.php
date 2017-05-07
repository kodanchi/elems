@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">

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
                        {!! Form::label('date_l','التاريخ', ['id' => 'date_l']) !!}
                            <select name="date" class="form-control selectpicker" id="date" style="width:350px" data-live-search="true">
                                <option value="" style="direction: ltr">اختر التاريخ</option>
                                <?php
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
                            {!! Form::label('center_l','المركز', ['id' => 'center_l']) !!}
                            </div>
                        <br>

                        <div id="NIDs" name="sNIDss">
                            {!! Form::label('nid_l','رقم الهوية/الإقامة', ['id' => 'nid_l']) !!}
                        </div>
                        <br>


                        {{--<select name="dcd" id="cd" class="form-control selectpicker" data-live-search="true"  style="width:350px">
                            <option value="">اختر</option>
                            <option value="">اختر</option>
                            <option value="">اختر</option>
                            </select>--}}

                        <script type="text/javascript">
                            $(document).ready(function() { $("#center_l").hide(); $("#nid_l").hide();});
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
                                                        $("#center").append('<option value="">اختر المركز</option>');
                                                        $("#center").append('<option value="0">DL</option>');
                                                    }
                                                    $("#center").append('<option value="'+key+'">'+value+'</option>');
                                                    x++;
                                                });
                                                $("#centers").append('</select>');
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
                                    $("#NID").empty();
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
                                                $("#NIDs").append('<select name="NID" id="NID" class="form-control selectpicker" style="width:350px" data-live-search="true">');
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
                                                $("#nid_l").hide();
                                            }
                                        }
                                    });

                                }else{
                                    $("#NID").empty();
                                }

                            });


                        </script>
                            <!--- Rate Field --->
                            <div class="form-group">
                                {!! Form::label('rate', 'التقييم:') !!}
                                <select name="rate" class="form-control selectpicker" id="rate" style="width:350px" data-live-search="true">
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
{{--
                        <input  name="status" type="hidden" value="1">
--}}

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