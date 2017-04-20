@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>تحديث بيانات الطالب / الطالبة </b></div>

                    <div class="panel-body ">
                        @include('errors.errors')
                        @include('errors.status')
                        {{--{{dd($student)}}--}}
                        {{--{!! Form::model($student, array('action' => array('Std_updates@UpdateIndex', $student->SID))) !!}--}}
                        {!! Form::model($student, ['method' => 'PATCH', 'action' =>  ['Std_updates@CPeditInfo', $student->SID], 'files' => true]) !!}

                        {{--{!! Form::open(['url' => url('/students/Info/update/done'), 'method' => 'post',  'files' => true ,'class' => 'newsletter-form']) !!}--}}
                        <br>


                                <div class="row">
                                    <div class="col-md-4">
                                        <h4>الرقم الجامعي : {{$student->SID}} </h4>
                                        {!! Form::hidden('students_id', $student->SID) !!}
                                    </div>

                                    <div class="col-md-4">
                                        <h4>رقم الهوية/الإقامة : {{$student->NID}} </h4>
                                    </div>
                                    <div class="col-md-4">
                                    <h4>الاسم : {{$student->name}} </h4>
                                </div>
                                </div>
                        <hr style="	border-top: 3px solid #9d9d9d">

                        <h4 style="	color: #2e6da4">المعلومات الشخصية: </h4><hr>

                       <h4> <b>الاسم باللغة العربية</b></h4>
                                    <div class="row">

                                    <div class="col-md-3">

                                        <div class="form-group">
                                            {!! Form::label('name1', 'الاسم الأول') !!}
                                            {!! Form::text('name1',null ,['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                {!! Form::label('name2', 'اسم الأب') !!}
                                                {!! Form::text('name2',null ,['class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                {!! Form::label('name3', 'اسم الجد') !!}
                                                {!! Form::text('name3',null ,['class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                {!! Form::label('name4', 'اسم العائلة') !!}
                                                {!! Form::text('name4',null ,['class' => 'form-control']) !!}
                                            </div>
                                        </div>


                                    </div>
                        <h4><b>الاسم باللغة الانجليزية</b></h4>

                        <div class="row">

                            <div class="col-md-3">

                                <div class="form-group">
                                    {!! Form::label('Family name', '') !!}
                                    {!! Form::text('name5',null ,['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    {!! Form::label('Grandfather name', '') !!}
                                    {!! Form::text('name6',null ,['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    {!! Form::label('Father name', '') !!}
                                    {!! Form::text('name7',null ,['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    {!! Form::label('First name', '') !!}
                                    {!! Form::text('name8',null ,['class' => 'form-control']) !!}
                                </div>
                            </div>

                        </div>

                      <div class="row">
                       <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('NID', 'رقم الهوية/الإقامة') !!}
                                {!! Form::text('NID',null,['class' => 'form-control'] ) !!}
                            </div>
                       </div>

                          <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('Phone', 'رقم الجوال') !!}
                                {!! Form::text('Phone',null ,['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('Nationally', 'الجنسية') !!}
                                {!! Form::select('Nationally',$nationals ,null,['class' => 'form-control'] ) !!}

                            <div id="div_other_nationality" class="form-group">
                                <!--- other_nationality Field --->
                                <div class="form-group">
                                    {!! Form::label('other_nationality', trans('regform.specify').':') !!}
                                    {!! Form::text('other_nationality', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                       </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">





                                                        <style>
                                                            .datepicker,
                                                            .table-condensed {
                                                                width: 300px;
                                                                height:300px;
                                                            }
                                                        </style>

                                                        <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />

                                                        <!-- HTML Form (wrapped in a .bootstrap-iso div) -->
                                                        <div class="bootstrap-iso ">
                                                            <div class="container-fluid">
                                                                <div class="row">
                                                                    <div class="">
                                                                        <div class="form-group ">
                                                                            <label class="control-label col-sm-3 requiredField" for="Birth_day">
                                                                                {{trans('regform.birth_date')}}
                                                                            </label>
                                                                            <div class="">
                                                                                <div class="input-group">
                                                                                    {{--<div class="input-group-addon">
                                                                                        <i class="fa fa-calendar">
                                                                                        </i>
                                                                                    </div>--}}
                                                                                </div>
                                                                                @if($student->Birth_day)
                                                                                    <input class="form-control" id="Birth_day" name="Birth_day" placeholder="MM/DD/YYYY" value="{{$student->Birth_day}}" type="text" readonly />
                                                                                @else
                                                                                    <input class="form-control" id="Birth_day" name="Birth_day" placeholder="MM/DD/YYYY" type="text" readonly />
                                                                                    @endforelse
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="">
                                                                                <input name="_honey" style="display:none" type="text"/>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <!-- Extra JavaScript/CSS added manually in "Settings" tab -->
                                                        <!-- Include jQuery -->

                                                        <!-- Include Date Range Picker -->


                                                            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>

                                                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

                                                        <script>
                                                            $(document).ready(function(){
                                                                var date_input=$('input[name="Birth_day"]'); //our date input has the name "date"
                                                                var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
                                                                date_input.datepicker({
                                                                    format: 'd/mm/yyyy',
                                                                    container: container,
                                                                    todayHighlight: true,
                                                                    autoclose: true,
                                                                })
                                                            })
                                                        </script>


                         {{--  {!! Form::select('selectCalendar1', ['h' =>  trans('regform.hijri'),'g'=>  trans('regform.miladi')] , 'ummalqura' ,
                              ['class' => 'form-control', 'id'=> 'selectCalendar1']) !!}
                                {!! Form::text('date1', null, ['class' => 'form-control','readonly']) !!}
                              {!! Form::hidden('Birth_day', '',['id'=>'birth_date']) !!}--}}
                                                </div>
                                                <div id="cal"></div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    {!! Form::label('sex', 'الجنس') !!}
                                                    {!! Form::select('sex',array('' => 'اختر الجنس', 'M' => 'ذكر', 'F' => 'أنثى') ,null,['class' => 'form-control'] ) !!}
                                                </div>
                                            </div>
                                        </div>


                        <hr style="	border-top: 3px solid #9d9d9d">
                        <h4 style="	color: #2e6da4">معلومات  الشهادة الثانوية: </h4><hr>


                        <div class="row">


                            <div class="col-md-6">
                                <div class="form-group">


                                        <style>
                                            .datepicker,
                                            .table-condensed {
                                                width: 300px;
                                                height:300px;
                                            }
                                        </style>

                                        <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />

                                        <!-- HTML Form (wrapped in a .bootstrap-iso div) -->
                                        <div class="bootstrap-iso ">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="">
                                                        <div class="form-group ">
                                                            <label class="control-label col-sm-3 requiredField" for="Graduation_Date">
                                                                تاريخ التخرج:
                                                            </label>
                                                            <div class="">
                                                                <div class="input-group">
                                                                    {{--<div class="input-group-addon">
                                                                        <i class="fa fa-calendar">
                                                                        </i>
                                                                    </div>--}}
                                                                </div>
                                                                @if($student->Graduation_Date)
                                                                    <input class="form-control" id="Graduation_Date" name="Graduation_Date" placeholder="MM/DD/YYYY" value="{{$student->Graduation_Date}}" type="text" readonly />
                                                                @else
                                                                    <input class="form-control" id="Graduation_Date" name="Graduation_Date" placeholder="MM/DD/YYYY" type="text" readonly />
                                                                    @endforelse
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="">
                                                                <input name="_honey" style="display:none" type="text"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <!-- Extra JavaScript/CSS added manually in "Settings" tab -->
                                        <!-- Include jQuery -->

                                        <!-- Include Date Range Picker -->


                                        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>

                                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

                                        <script>
                                            //alert(document.getElementById('Graduation_Date').offsetWidth);
                                            $(document).ready(function(){
                                                var date_input=$('input[name="Graduation_Date"]'); //our date input has the name "date"
                                                var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
                                                //alert(container);
                                                date_input.datepicker({
                                                    format: 'd/mm/yyyy',
                                                    container: container,
                                                    todayHighlight: true,
                                                    autoclose: true,
                                                })
                                            })
                                        </script>


                                </div>
                                <div id="cal2"></div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('Graduation_Place', 'مكان التخرج') !!}
                                    {!! Form::text('Graduation_Place',null ,['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('School_name', 'اسم المدرسة') !!}
                                    {!! Form::text('School_name',null ,['class' => 'form-control']) !!}

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">

                                    {!! Form::label('HS_pers', 'النسبة الثانوية') !!}
                                    {!! Form::text('HS_pers',null,['class' => 'form-control'] ) !!}
                                </div>
                            </div>
                        </div>
                        <hr style="	border-top: 3px solid #9d9d9d">
                        <h4 style="	color: #2e6da4">المرفقات: </h4><hr>
                        <div class="row">



                        <div class="col-md-4">
                                <div class="form-group">

                                    <a href="{{asset('storage/'.$student->attachment1)}}" target="_blank" class="btn btn-primary">
                                        <span class="glyphicon glyphicon-paperclip"></span>  &nbsp;  شهادة الثانوية &nbsp;
                                    </a>
                                    <hr>
                                    <div class="form-group">
                                        {!! Form::label('attachment1', 'تحديث الشهادة الثانوية') !!}
                                        {!! Form::file('attachment1', ['class' => 'form-control','accept'=>'.pdf']) !!}

                                    </div>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">

                                    <a href="{{asset('storage/'.$student->attachment2)}}" target="_blank" class="btn btn-primary">
                                        <span class="glyphicon glyphicon-paperclip"></span> &nbsp;  الهوية الوطنية&nbsp;
                                    </a>
                                    <br> <br> <br>
                                    <div class="form-group">
                                        {!! Form::label('attachment2','تحديث الهوية الوطنية /الإقامة ') !!}
                                        {!! Form::file('attachment2', ['class' => 'form-control','accept'=>'.pdf']) !!}
                                    </div>
                                </div>
                            </div>  <div class="col-md-4">
                                <div class="form-group">
                                    @if($student->attachment3 != NULL)

                                        <a href="{{asset('storage/'.$student->attachment3)}}" target="_blank" class="btn btn-primary">
                                            <span class="glyphicon glyphicon-paperclip"></span> &nbsp; جواز السفر او الرخصة &nbsp;
                                        </a>
                                        <br> <br> <br>
                                    @else

                                    <br>
                                    <br> <br> <br>


                                        @endforelse
                                    <div class="form-group">
                                        {!! Form::label('attachment3','تحديث جواز السفر او الرخصة ') !!}
                                        {!! Form::file('attachment3', ['class' => 'form-control','accept'=>'.pdf']) !!}
                                    </div>
                                </div>
                            </div>

                        <hr>
                        <hr>
                            <br>

{{--
                            <a href="{{url('cp/students/Info/edit/'.$student->id)}}" class="button col-md-6">{{trans('settings.back')}}</a>
--}}

                        {!! Form::submit(trans('تحديث'), ['class' => ' col-md-3']) !!}
                        {!! Form::close() !!}




                    </div>




                    </div>
                            </div>
                            </div>
                            </div>
                            </div>

    <script >


        $('#Nationally').change(function () {
            nationalityOther();
            $('#other_nationality').focus();

        });

        function nationalityOther() {
            if($('#Nationally').val() === 'other'){
                if($('#other_nationality').val() === 'other') $('#other_nationality').val('');
                $('#div_other_nationality').show();
            }else {
                $('#other_nationality').val('other');
                $('#div_other_nationality').hide();
            }
        }

        nationalityOther();

        var cal = new Calendar(true, 0, true, false),
                calMode = cal.isHijriMode();

        $(document).ready(function () {

            var date = document.getElementById('date1');
            var birthDate = document.getElementById('birth_date');

            document.getElementById('cal').appendChild(cal.getElement());

            cal.callback = function() {
                setDateFields();
            };

            function setDateFields() {
                date.value = cal.getDate().getDateString();
                var g = (calMode === cal.isHijriMode()? cal.getDate().getGregorianDate()+"" : cal.getDate()+"");
                birthDate.value = g.substring(0,15);

            }
            $('#selectCalendar1').change(function() {
                if($(this).val() == 'h'){
                    cal.changeDateMode();
                    calMode = cal.isHijriMode();
                    cal.show();
                }else if($(this).val() == 'g'){
                    cal.changeDateMode();
                    calMode = !cal.isHijriMode();
                    cal.show();
                }
            });

        });

        var cal2 = new Calendar(true, 0, true, false),
                calMode2 = cal2.isHijriMode();

        $(document).ready(function () {

            var date = document.getElementById('date2');
            var birthDate = document.getElementById('Graduation_Date');

            document.getElementById('cal2').appendChild(cal2.getElement());

            cal2.callback = function() {
                setDateFields();
            };

            function setDateFields() {
                date.value = cal2.getDate().getDateString();
                var g = (calMode2 === cal2.isHijriMode()? cal2.getDate().getGregorianDate()+"" : cal2.getDate()+"");
                birthDate.value = g.substring(0,15);

            }
            $('#selectCalendar2').change(function() {
                if($(this).val() == 'h'){
                    cal2.changeDateMode();
                    calMode2 = cal2.isHijriMode();
                    cal2.show();
                }else if($(this).val() == 'g'){
                    cal2.changeDateMode();
                    calMode2 = !cal2.isHijriMode();
                    cal2.show();
                }
            });

        });
</script>

    @endsection