@extends('layouts.app')

@section('content')


    {{--<div id="spinner" style="z-index: 500">
        <img id="img-spinner" src="{{asset('storage/spinner.gif')}}" alt="loading..." height="50 px" width="50 px">
    </div>--}}
    <div class="container ">
        <div class="row ">
            <div class="col-md-6 col-md-offset-3">
                @include('errors.errors')
                @include('errors.status')
                <div class="panel panel-default">

                    <div class="panel-heading"> تصدير أسماء المراقبين</div>

                    <div class="panel-body ">


                        {!! Form::open(['url' => '/cp/exams/testersForm', 'method' => 'post', 'files' => true ,'class'=>'newsletter-form' ]) !!}


                               {!! Form::label('date_l', 'اختر التاريخ:') !!}
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

                        <div class="form-group">
                            {!! Form::label('time_l','الوقت') !!}<br>
                            {!! Form::select('time',trans('testersAllocation.time'), null, ['class' => 'form-control selectpicker','required']) !!}
                        </div>

                        <div id="centers" name="centers" class="form-group">
                        @if(in_array('admin',Auth::user()->getAllroles()))
                                    {!! Form::label('center', '  المركز:') !!}
                                    <select name="center" id="center" class="form-control selectpicker" data-live-search="true" required>
                                        <option value="">المركز</option>
                                        <?php
                                        for ($x = 0; $x < sizeof($centers); $x++) {
                                        ?>
                                        <option value="{{ $centers[$x]->id }}">{{ $centers[$x]->name}} ( {{$centers[$x]->gender}} )</option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                            @elseif(in_array('RM',Auth::user()->getAllroles()))
                                {!! Form::label('center', '  المركز:') !!}
                                <select name="center" id="center" class="form-control selectpicker" data-live-search="true" required>
                                    <option value="">المركز</option>
                                    <option value="1">المقر الرئيسي للجامعة (الراكة)</option>
                                </select>
                            @elseif(in_array('DM',Auth::user()->getAllroles()))
                                {!! Form::label('center', '  المركز:') !!}
                                <select name="center" id="center" class="form-control selectpicker" data-live-search="true" required>
                                    <option value="">المركز</option>
                                    <option value="2">كلية التربية بالدمام (المريكبات)</option>
                                </select>
                                {{--@elseif(in_array('HM',Auth::user()->getAllroles()))
                                    {!! Form::label('center', '  المركز:') !!}
                                    <select name="center" class="form-control selectpicker" data-live-search="true" required>
                                        <option value="">المركز</option>
                                        <option value="3">مبنى السنة التحضيرية بحفر الباطن</option>
                                    </select>--}}
                                {{--@elseif(in_array('JM',Auth::user()->getAllroles()))
                                    {!! Form::label('center', '  المركز:') !!}
                                    <select name="center" class="form-control selectpicker" data-live-search="true" required>
                                        <option value="">المركز</option>
                                        <option value="4">كلية التربية بالجبيل</option>
                                    </select>--}}
                                {{--@elseif(in_array('KM',Auth::user()->getAllroles()))
                                    {!! Form::label('center', '  المركز:') !!}
                                    <select name="center" class="form-control selectpicker" data-live-search="true" required>
                                        <option value="">المركز</option>
                                        <option value="5">كلية العلوم والآداب بالخفجي</option>
                                    </select>--}}
                                {{--@elseif(in_array('NM',Auth::user()->getAllroles()))
                                    {!! Form::label('center', '  المركز:') !!}
                                    <select name="center" class="form-control selectpicker" data-live-search="true" required>
                                        <option value="">المركز</option>
                                        <option value="6">كلية العلوم والآداب بالنعيرية</option>
                                    </select>--}}
                            @elseif(in_array('RF',Auth::user()->getAllroles()))
                                {!! Form::label('center', '  المركز:') !!}
                                <select name="center" id="center" class="form-control selectpicker" data-live-search="true" required>
                                    <option value="">المركز</option>
                                    <option value="7">المقر الرئيسي للجامعة (الراكة)</option>
                                </select>
                            @elseif(in_array('DF',Auth::user()->getAllroles()))
                                {!! Form::label('center', '  المركز:') !!}
                                <select name="center" id="center" class="form-control selectpicker" data-live-search="true" required>
                                    <option value="">المركز</option>
                                    <option value="8">كلية البنات بالدمام (الريان)</option>
                                </select>
                                {{--@elseif(in_array('HF',Auth::user()->getAllroles()))
                                    {!! Form::label('center', '  المركز:') !!}
                                    <select name="center" class="form-control selectpicker" data-live-search="true" required>
                                        <option value="">المركز</option>
                                        <option value="9">كلية التربية الأدبية بحفر الباطن</option>
                                    </select>--}}
                                {{--@elseif(in_array('JF',Auth::user()->getAllroles()))
                                    {!! Form::label('center', '  المركز:') !!}
                                    <select name="center" class="form-control selectpicker" data-live-search="true" required>
                                        <option value="">المركز</option>
                                        <option value="10">كلية التربية بالجبيل</option>
                                    </select>--}}
                                {{--@elseif(in_array('KF',Auth::user()->getAllroles()))
                                    {!! Form::label('center', '  المركز:') !!}
                                    <select name="center" class="form-control selectpicker" data-live-search="true" required>
                                        <option value="">المركز</option>
                                        <option value="11">كلية العلوم والآداب بالخفجي</option>
                                    </select>--}}
                                {{--@elseif(in_array('NF',Auth::user()->getAllroles()))
                                    {!! Form::label('center', '  المركز:') !!}
                                    <select name="center" class="form-control selectpicker" data-live-search="true" required>
                                        <option value="">المركز</option>
                                        <option value="12">كلية العلوم والآداب بالنعيرية</option>
                                    </select>--}}
                            @elseif(in_array('JK',Auth::user()->getAllroles()))
                                {!! Form::label('center', '  المركز:') !!}
                                <select name="center" id="center" class="form-control selectpicker" data-live-search="true" required>
                                    <option value="">المركز</option>
                                    <option value="13">سجن الخبر</option>
                                </select>
                            @elseif(in_array('JD',Auth::user()->getAllroles()))
                                {!! Form::label('center', '  المركز:') !!}
                                <select name="center" id="center" class="form-control selectpicker" data-live-search="true" required>
                                    <option value="">المركز</option>
                                    <option value="14">سجن الدمام</option>
                                </select>
                            @elseif(in_array('JQ',Auth::user()->getAllroles()))
                                {!! Form::label('center', '  المركز:') !!}
                                <select name="center" id="center" class="form-control selectpicker" data-live-search="true" required>
                                    <option value="">المركز</option>
                                    <option value="15">سجن القطيف</option>
                                </select>
                            @elseif(in_array('HM',Auth::user()->getAllroles()) || in_array('HF',Auth::user()->getAllroles()))
                                {!! Form::label('center', '  المركز:') !!}
                                <select name="center" id="center" class="form-control selectpicker" data-live-search="true" required>
                                    <option value="">المركز</option>
                                    <option value="3">مبنى السنة التحضيرية بحفر الباطن (M)</option>
                                    <option value="9">كلية التربية الأدبية بحفر الباطن (F)</option>
                                </select>
                            @elseif(in_array('KM',Auth::user()->getAllroles()) || in_array('KF',Auth::user()->getAllroles()))
                                {!! Form::label('center', '  المركز:') !!}
                                <select name="center" id="center" class="form-control selectpicker" data-live-search="true" required>
                                    <option value="">المركز</option>
                                    <option value="5">كلية العلوم والآداب بالخفجي (M)</option>
                                    <option value="11">كلية العلوم والآداب بالخفجي (F)</option>
                                </select>
                            @elseif(in_array('JM',Auth::user()->getAllroles()) || in_array('JF',Auth::user()->getAllroles()))
                                {!! Form::label('center', '  المركز:') !!}
                                <select name="center" id="center" class="form-control selectpicker" data-live-search="true" required>
                                    <option value="">المركز</option>
                                    <option value="4">كلية التربية بالجبيل (M)</option>
                                    <option value="10">كلية التربية بالجبيل (F)</option>
                                </select>
                            @elseif(in_array('NM',Auth::user()->getAllroles()) || in_array('NF',Auth::user()->getAllroles()))
                                {!! Form::label('center', '  المركز:') !!}
                                <select name="center" id="center" class="form-control selectpicker" data-live-search="true" required>
                                    <option value="">المركز</option>
                                    <option value="6">كلية العلوم والآداب بالنعيرية (M)</option>
                                    <option value="12">كلية العلوم والآداب بالنعيرية (F)</option>
                                </select>
                        @elseif(in_array('MK',Auth::user()->getAllroles()))
                            {!! Form::label('center', '  المركز:') !!}
                            <select name="center" id="center" class="form-control selectpicker" data-live-search="true" required>
                                <option value="">المركز</option>
                                <option value="16">التصحيح</option>
                            </select>
                        @endforelse
                        </div>

                            <div id="buildings" name="buildings">
                                {!! Form::label('building_l','المبنى', ['id' => 'building_l']) !!}
                            </div>


<br>
<br>

                            <script type="text/javascript">
                                $(document).ready(function() { $("#center_l").hide(); $("#building_l").hide();});
                                //$('.selectpicker').selectpicker();
                                //alert("xsxs");
                                $('#date').change(function(){
                                    var date = $(this).val();
                                    if(date){
                                        /*$("#center").empty();
                                        $("#centers").empty();
                                        $("#building").empty();
                                        $("#buildings").empty();*/
                                        //$("#centers").show();
                                    }else{
                                        /*$("#center").empty();
                                        $("#centers").empty();
                                        $("#building").empty();
                                        $("#buildings").empty();*/
                                        //$("#centers").hide();
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
                                            url:"{{url('cp/exams/testersCenters/CC')}}?CID="+CID+"&date="+date,
                                            success:function(res){
                                                if(res){
                                                    $("#building").empty();
                                                    $("#buildings").append('<select name="building" id="building" class="form-control selectpicker" style="width:350px" data-live-search="true" required>');
                                                    var y=0;
                                                    $.each(res,function(key,value){
                                                        if (y==0){
                                                            $("#building").append('<option value="">اختر المبنى</option>');
                                                            $("#building").append('<option value="general">عام</option>');
                                                        }
                                                        $("#building").append('<option value="'+value+'">'+value+'</option>');
                                                        y++;
                                                    });
                                                    $("#buildings").append('</select>');
                                                    $('#building').selectpicker('refresh');
                                                    $("#building_l").show();
                                                }else{
                                                    $("#building").empty();
                                                    $("#building_l").hide();
                                                }
                                            }
                                        });

                                    }else{
                                        $("#building").empty();
                                    }

                                });


                            </script>




                                    {!! Form::submit(trans('بحث'), ['class' => ' col-md-3', 'onclick' => 'myFunction()']) !!}

                       {{-- <a href="/cp/exams/services/home" class="button col-md-3">{{trans('settings.back')}}</a>--}}
                            {!! Form::close() !!}






                    </div>
                </div>
            </div>
        </div>
</div>
    @endsection