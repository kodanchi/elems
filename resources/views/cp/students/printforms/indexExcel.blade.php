@extends('layouts.app')

@section('content')


    <div class="container ">
        <div class="row ">
            <div class="col-md-6 col-md-offset-3">
                @include('errors.errors')
                @include('errors.status')
                <div class="panel panel-default">

                    <div class="panel-heading"> تصدير كشوفات الطلاب</div>

                    <div class="panel-body ">



            {!! Form::open(['url' => '/cp/printforms/getExcelForms', 'method' => 'post', 'files' => true ,'class'=>'newsletter-form' ]) !!}

                        {!! Form::label('date_l','التاريخ', ['id' => 'date_l']) !!}
                            <select name="date" class="form-control selectpicker" id="date" style="width:350px" data-live-search="true" required>
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

                            <script type="text/javascript">
                                $(document).ready(function() { $("#center_l").hide();});
                                //$('.selectpicker').selectpicker();
                                $('#date').change(function(){
                                    var date = $(this).val();
                                    if(date){
                                        $.ajax({
                                            type:"GET",
                                            url:"{{url('cp/printforms/searches/centers')}}?date="+date,
                                            success:function(res){
                                                if(res){
                                                    $("#center").empty();
                                                    $("#centers").append('<select name="center" id="center" class="form-control selectpicker" style="width:350px" data-live-search="true" required>');
                                                    var x=0;
                                                    @if(in_array('admin',Auth::user()->getAllroles()))
                                                    $.each(res,function(key,value){
                                                        if (x==0){
                                                            $("#center").append('<option value="">اختر المركز</option>');
                                                            $("#center").append('<option value="0">DL</option>');
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
                                                    $("#center_l").hide();
                                                }
                                            }
                                        });

                                    }else{
                                        $("#center").empty();
                                    }
                                });
                            </script>



{{--<h4>text here</h4>--}}


<br>
<br>


                                    {!! Form::submit(trans('بحث'), ['class' => ' col-md-3', 'onclick' => 'myFunction()']) !!}
                {{--        <a href="/cp/exams/services/home" class="button col-md-3">{{trans('settings.back')}}</a>--}}

                            {!! Form::close() !!}







                </div>
            </div>
        </div>
    </div>


</div>
    @endsection