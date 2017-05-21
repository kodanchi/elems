@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">

                @include('errors.errors')
                @include('errors.status')

                <div class="panel panel-default">
                    <div class="panel-heading">لوحة تعيين المراقبين للمراكز </div>

                    <div class="panel-body">

                        {!! Form::open(['url' => 'cp/exams/testers/testersAllocation/update', 'method' => 'post','class'=>'newsletter-form' ]) !!}

                        {!! Form::label('tester_l','المراقب') !!}<br>
                        <select name="tester" class="form-control selectpicker" id="tester" style="width:350px" data-live-search="true" required>
                            <option value="" style="direction: ltr">اختر المراقب</option>
                            @foreach ($testers as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>

                        <br>
                        <br>

                        <div class="form-group">
                            {!! Form::label('type_l','مهمة المراقب') !!}<br>
                            {!! Form::select('type',trans('testersAllocation.testers_type'), null, ['class' => 'form-control selectpicker','required','id'=>'type']) !!}
                        </div>


                        {!! Form::label('dat_l','التاريخ') !!}<br>
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



                        <div id="centers" name="centers" class="form-group">
                            {!! Form::label('center_l','المركز', ['id' => 'center_l']) !!}
                        </div>

                        <div id="buildings" name="buildings" class="form-group">
                            {!! Form::label('building_l','المبنى', ['id' => 'building_l']) !!}
                        </div>

                        <div id="rooms" name="rooms" class="form-group">
                            {!! Form::label('room_l','القاعة', ['id' => 'room_l']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('time_l','الوقت') !!}<br>
                            {!! Form::select('time',trans('testersAllocation.time'), null, ['class' => 'form-control selectpicker','required']) !!}
                        </div>

                        <br>
                        <br>

                        <script type="text/javascript">
                            $(document).ready(function() { $("#center_l").hide(); $("#building_l").hide(); $("#room_l").hide(); });
                            //$('.selectpicker').selectpicker();
                            $('#date').change(function(){
                                var date = $(this).val();
                                if(date){
                                    $.ajax({
                                        type:"GET",
                                        url:"{{url('cp/exams/testers/testersAllocation/centers')}}?date="+date,
                                        success:function(res){
                                            if(res){
                                                $("#center").empty();
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
                                                @elseif(in_array('MK',Auth::user()->getAllroles()))
                                                if (x==0){
                                                    $("#center").append('<option value="">اختر المركز</option>');
                                                    $("#center").append('<option value="16">التصحيح</option>');
                                                }
                                                @endforelse
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
                                    $("#building").empty();
                                }
                            });
                            $('#centers').on('change',function(){
                                var CID = $("#center").val();
                                var date = $("#date").val();
                                //alert(date +" ddd "+ CID);
                                if(CID && date){
                                    $.ajax({
                                        type:"GET",
                                        url:"{{url('cp/exams/testers/testersAllocation/buildings')}}?center="+CID+"&date="+date,
                                        success:function(res){
                                            if(res) {
                                                $("#building").empty();
                                                var type = $("#type").val();
                                                //alert(type);
                                                if (type == 'tester' || type == 'main tester') {
                                                    $("#buildings").append('<select name="building" id="building" class="form-control selectpicker" style="width:350px" data-live-search="true" required>');

                                                    var y = 0;
                                                    $.each(res, function (key, value) {
                                                        if (y == 0) {
                                                            $("#building").append('<option value="">اختر المبنى</option>');
                                                        }
                                                        if (value){
                                                        $("#building").append('<option value="' + value + '">' + value + '</option>');
                                                        }
                                                        y++;
                                                    });
                                                    $("#buildings").append('</select>');
                                                    $('#building').selectpicker('refresh');
                                                    $("#building_l").show();
                                                } else {
                                                    $("#building").empty();
                                                    $("#building_l").hide();
                                                }
                                            }
                                        }
                                    });

                                }else{
                                    $("#building").empty();
                                }

                            });
                            $('#buildings').on('change',function(){
                                var CID = $("#center").val();
                                var date = $("#date").val();
                                var building = $("#building").val();
                                if(CID && date && building){
                                    //alert(date +" ddd "+ CID);
                                    $.ajax({
                                        type:"GET",
                                        url:"{{url('cp/exams/testers/testersAllocation/rooms')}}?center="+CID+"&date="+date+"&building="+building,
                                        success:function(res){
                                            if(res){
                                                $("#room").empty();
                                                var type = $("#type").val();
                                                //alert(type);
                                                if(type=='tester' || type=='main tester') {
                                                    $("#rooms").append('<select name="room" id="room" class="form-control selectpicker" style="width:350px" data-live-search="true" required>');
                                                }
                                                var y=0;
                                                $.each(res,function(key,value){
                                                    if (y==0){
                                                        $("#room").append('<option value="">اختر القاعة</option>');
                                                    }
                                                    $("#room").append('<option value="'+value+'">'+value+'</option>');
                                                    y++;
                                                });
                                                $("#rooms").append('</select>');
                                                $('#room').selectpicker('refresh');
                                                $("#room_l").show();
                                            }else{
                                                $("#room").empty();
                                                $("#room_l").hide();
                                            }
                                        }
                                    });

                                }else{
                                    $("#room").empty();
                                }

                            });


                        </script>


                        {!! Form::submit('تحديث', ['class' => ' col-md-3']) !!}
{{--
                        <a href="/cp/exams/services/home" class="button col-md-3">{{trans('settings.back')}}</a>
--}}
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