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



            {!! Form::open(['url' => '/cp/printforms/search', 'method' => 'post', 'files' => true ,'class'=>'newsletter-form' ]) !!}

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
                                                    $("#centers").append('<select name="center" id="center" class="form-control selectpicker" style="width:350px" data-live-search="true">');
                                                    var x=0;
                                                    $.each(res,function(key,value){
                                                        if (x==0){
                                                            $("#center").append('<option value="">اختر المركز</option>');
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





            <script type="text/javascript">
                $(document).ready(function() {
                    $('select[name="centers"]').on('change', function() {
                        var center_id = $(this).val();
                        if(center_id) {
                            $.ajax({
                                url: '/cp/printforms/ajax/'+center_id,
                                type: "GET",
                                dataType: "json",
                                success:function(data) {



                                    $('select[name="room"]').empty();
                                    $.each(data, function(key, value) {
                                        $('select[name="room"]').append('<option value="'+ value['room'] +'">'+ value['room'] +'</option>');
                                    });

                                }
                            });
                        }else{
                            $('select[name="room"]').empty();
                        }
                    });
                });
            </script>
</div>
    @endsection