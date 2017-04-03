@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-12">
                @include('errors.errors')
                <div class="panel panel-default">
                    <div class="panel-heading">طباعة التقارير</div>

                        <div class="panel-body ">
                            <div class="col col-md-10">
                                {!! Form::open(['url' => '/cp/warehouse/reports/new/', 'method' => 'post', 'files' => true ,'class'=>'newsletter-form' ]) !!}

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('reports', 'إصدار التقرير') !!}
                                            {!! Form::select('reports',array('' => 'اختر التقرير', '1' => 'العهد لدى الموظفين', '2' => 'العهد في القاعات' , '3' => ' حجوزات القاعات', '4' => 'الضمانات') ,null,['class' => 'form-control'] ) !!}
                                        </div>
                                        <br>
                                        <br>

                                        <div id="div_report1" class="form-group">
                                            <!--- other_nationality Field --->
                                            <div class="form-group">
                                                {!! Form::label('report1', 'اصدار العهد للموظفين:') !!}
                                                <select name="report1" id="report1" class="form-control selectpicker" data-live-search="true" required>
                                                    <option value="" selected>اسم الموظف</option>
                                                    <option value="all" selected>كل الموظفين</option>
                                                    @foreach ($employees as $emp)
                                                            <option {{--@if($user->name!=="Abdullah1" && $user->name!=="abdulla2")--}}value="{{$emp->name}}">{{--@if($user->name!=="Abdullah1" && $user->name!=="abdulla2")--}}{{$emp->name}}{{--@endif--}}</option>
                                                    @endforeach
                                                </select>
                                                <hr>
                                                {!! Form::submit('تصدير',  ['class' => 'form-control' , 'name'=> 'emp' , 'value'=> 'emp' ]) !!}
                                            </div>
                                        </div>

                                        <div id="div_report2" class="form-group">
                                            <!--- other_nationality Field --->
                                            <div class="form-group">
                                                {!! Form::label('report2', ' العهد في القاعات:') !!}
                                                <select name="report2" id="report2" class="form-control selectpicker" data-live-search="true" required>
                                                    <option value="" selected>اسم القاعة</option>
                                                    <option value="all" selected>كل القاعات</option>
                                                    @foreach ($rooms as $room)
                                                        <option {{--@if($user->name!=="Abdullah1" && $user->name!=="abdulla2")--}}value="{{$room->name}}">{{--@if($user->name!=="Abdullah1" && $user->name!=="abdulla2")--}}{{$room->name}}{{--@endif--}}</option>
                                                    @endforeach
                                                </select>
                                                <hr>
                                                {!! Form::submit('تصدير',  ['class' => 'form-control' , 'name'=> 'room' , 'value'=> 'room' ]) !!}
                                            </div>
                                        </div>
                                        <div id="div_report3" class="form-group">
                                            <!--- other_nationality Field --->
                                            <div class="form-group">
                                                {!! Form::label('report3', ' حجوزات القاعات:') !!}
                                                <br>
                                                <div class="form-group col-md-12" style="float: right">
                                                <select name="report3" id="report3" class="form-control selectpicker" data-live-search="true" required>
                                                    <option value="" selected>اسم الشخص</option>
                                                    <option value="all" selected>كل الحجوزات</option>
                                                    @foreach ($schedules as $schedule)
                                                        <option {{--@if($user->name!=="Abdullah1" && $user->name!=="abdulla2")--}}value="{{$schedule->guest_name}}">{{--@if($user->name!=="Abdullah1" && $user->name!=="abdulla2")--}}{{$schedule->guest_name}}{{--@endif--}}</option>
                                                    @endforeach
                                                </select>
                                                    </div>
                                                <div class="form-group col-md-6" style="float: left">
                                                    <select name="report3-1" id="report3-1" class="form-control selectpicker" data-live-search="true" required>
                                                        <option value="" selected>الشهر</option>
                                                        <option value="all" selected>كل الشهور</option>
                                                        <option value='1'>January</option>
                                                        <option value='2'>February</option>
                                                        <option value='3'>March</option>
                                                        <option value='4'>April</option>
                                                        <option value='5'>May</option>
                                                        <option value='6'>June</option>
                                                        <option value='7'>July</option>
                                                        <option value='8'>August</option>
                                                        <option value='9'>September</option>
                                                        <option value='10'>October</option>
                                                        <option value='11'>November</option>
                                                        <option value='12'>December</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-6" style="float: left">
                                                    <select name="report3-2" id="report2" class="form-control selectpicker" data-live-search="true" required>
                                                        <option value="" selected>اسم القاعة</option>
                                                        <option value="all" selected>كل القاعات</option>
                                                        @foreach ($rooms as $room)
                                                            <option {{--@if($user->name!=="Abdullah1" && $user->name!=="abdulla2")--}}value="{{$room->name}}">{{--@if($user->name!=="Abdullah1" && $user->name!=="abdulla2")--}}{{$room->name}}{{--@endif--}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <hr>
                                                {!! Form::submit('تصدير',  ['class' => 'form-control' , 'name'=> 'reserve' , 'value'=> 'reserve' ]) !!}
                                            </div>
                                        </div>
                                        <div id="div_report4" class="form-group">
                                            <!--- other_nationality Field --->
                                            <div class="form-group">
                                                {!! Form::label('report4', ' الضمانات:') !!}
                                                <select name="report4" id="report4" class="form-control selectpicker" data-live-search="true" required>
                                                    <option value="" selected>اسم الضمان</option>
                                                    <option value="all" selected>كل الضمانات</option>
                                                    @foreach ($warranties as $warranty)
                                                        <option {{--@if($user->name!=="Abdullah1" && $user->name!=="abdulla2")--}}value="{{$warranty->warranty_name}}">{{--@if($user->name!=="Abdullah1" && $user->name!=="abdulla2")--}}{{$warranty->warranty_name}}{{--@endif--}}</option>
                                                    @endforeach
                                                </select>
                                                <hr>
                                                {!! Form::submit('تصدير',  ['class' => 'form-control' , 'name'=> 'warranty' , 'value'=> 'warranty' ]) !!}

                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
        <script type="text/javascript">

            $(document).ready(function () {
                $('#div_report1').hide();
                $('#div_report2').hide();
                $('#div_report3').hide();
                $('#div_report4').hide();
            });

            $('#reports').change(function () {
               reportforadmin1();
                //$('#report1').focus();

            });

            function reportforadmin1() {
                if($('#reports').val() === '1'){
                    /*$('#report2').val('2');
                    $('#report3').val('3');
                    $('#report4').val('4');*/
                    $('#div_report2').hide();
                    $('#div_report3').hide();
                    //$('#div_report3-1').hide();
                    $('#div_report4').hide();
                    if($('#report1').val() === '1') $('#report1').val('');
                    $('#div_report1').show();
                }else if($('#reports').val() === '2'){
                    //$('#report1').val('1');
                    /*$('#report1').val('1');
                    $('#report3').val('3');
                    $('#report4').val('4');*/
                    $('#div_report1').hide();
                    $('#div_report3').hide();
                    //$('#div_report3-1').hide();
                    $('#div_report4').hide();
                    if($('#report2').val() === '2') $('#report2').val('');
                    $('#div_report2').show();
                }else if($('#reports').val() === '3'){
                    //$('#report2').val('2');
                    /*$('#report1').val('1');
                    $('#report2').val('2');
                    $('#report4').val('4');*/
                    $('#div_report2').hide();
                    $('#div_report1').hide();
                    $('#div_report4').hide();
                    if($('#report3').val() === '3') $('#report3').val('');
                    $('#div_report3').show();
                    //$('#div_report3-1').show();
                }else if($('#reports').val() === '4'){
                    //$('#report4').val('4');
                    /*$('#report1').val('1');
                    $('#report2').val('2');
                    $('#report3').val('3');*/
                    $('#div_report1').hide();
                    $('#div_report2').hide();
                    $('#div_report3').hide();
                    //$('#div_report3-1').hide();
                    if($('#report4').val() === '4') $('#report4').val('');
                    $('#div_report4').show();
                } else {
                    /*$('#report1').val('1');
                    $('#report2').val('2');
                    $('#report3').val('3');
                    $('#report4').val('4');*/
                    $('#div_report1').hide();
                    $('#div_report2').hide();
                    $('#div_report3').hide();
                    //$('#div_report3-1').hide();
                    $('#div_report4').hide();
                }
            }

            /*reportforadmin1();


            $('#reports').change(function () {
                reportforadmin2();
                //$('#report2').focus();

            });

            function reportforadmin2() {
                if($('#reports').val() === '2'){
                    if($('#report2').val() === '2') $('#report2').val('');
                    $('#div_report2').show();
                }else {
                    $('#report2').val('2');
                    $('#div_report2').hide();
                }
            }

            reportforadmin2();

            $('#reports').change(function () {
                reportforadmin3();
                //$('#report3').focus();

            });

            function reportforadmin3() {
                if($('#reports').val() === '3'){
                    if($('#report3').val() === '3') $('#report3').val('');
                    $('#div_report3').show();
                }else {
                    $('#report3').val('3');
                    $('#div_report3').hide();
                }
            }

            reportforadmin3();


            $('#reports').change(function () {
                reportforadmin4();
                //$('#report4').focus();

            });

            function reportforadmin4() {
                if($('#reports').val() === '4'){
                    if($('#report4').val() === '4') $('#report4').val('');
                    $('#div_report4').show();
                }else {
                    $('#report4').val('4');
                    $('#div_report4').hide();
                }
            }

            reportforadmin4();*/


</script>
    @endsection