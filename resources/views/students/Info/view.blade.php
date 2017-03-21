@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>تحديث بيانات الطالب / الطالبة </b></div>

                    <div class="panel-body ">
                        @include('errors.errors')
                        {{--{{dd($student)}}--}}
                        {{--{!! Form::model($student, array('action' => array('Std_updates@UpdateIndex', $student->SID))) !!}--}}
                        {!! Form::model($student, ['method' => 'PATCH', 'action' =>  ['Std_updates@UpdateIndex', $student->SID], 'files' => true]) !!}

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

                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('Phone', 'رقم الجوال') !!}
                                {!! Form::text('Phone',null ,['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('Nationally', 'الجنسية') !!}
                                {!! Form::select('Nationally',$nationals ,null,['class' => 'form-control'] ) !!}
                            </div>
                            <div id="div_other_nationality" class="form-group">
                                <!--- other_nationality Field --->
                                <div class="form-group">
                                    {!! Form::label('other_nationality', trans('regform.specify').':') !!}
                                    {!! Form::text('other_nationality', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                       {!! Form::label('date1', trans('regform.birth_date').':') !!}

                           {!! Form::select('selectCalendar1', ['h' =>  trans('regform.hijri'),'g'=>  trans('regform.miladi')] , 'ummalqura' ,
                              ['class' => 'form-control', 'id'=> 'selectCalendar1']) !!}
                                {!! Form::text('date1', null, ['class' => 'form-control','readonly']) !!}
                              {!! Form::hidden('Birth_day', '',['id'=>'birth_date']) !!}
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
                        <h4 style="	color: #2e6da4">المعلومات الثانوية: </h4><hr>


                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('Graduation_Place', 'مكان التخرج') !!}
                                    {!! Form::text('Graduation_Place',null ,['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">

                                    {!! Form::label('date2', 'تاريخ التخرج') !!}
                                    {!! Form::select('selectCalendar2', ['h' =>  trans('regform.hijri'),'g'=>  trans('regform.miladi')] , 'ummalqura' ,
                                       ['class' => 'form-control', 'id'=> 'selectCalendar2']) !!}
                                    {!! Form::text('date2', null, ['class' => 'form-control' , 'readonly']) !!}
                                    {!! Form::hidden('Graduation_Date', '',['id'=>'Graduation_Date']) !!}
                                </div>
                                <div id="cal2"></div>

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
                                    <div class="form-group">
                                        {!! Form::label('attachment1', 'إرفاق الشهادة الثانوية') !!}
                                        {!! Form::file('attachment1', ['class' => 'form-control','accept'=>'.pdf']) !!}

                                    </div>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-group">
                                        {!! Form::label('attachment2','إرفاق الهوية الوطنية ') !!}
                                        {!! Form::file('attachment2', ['class' => 'form-control','accept'=>'.pdf']) !!}
                                    </div>
                                </div>
                            </div>  <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-group">
                                        {!! Form::label('attachment3','إرفاق جواز السفر او الرخصة ') !!}
                                        {!! Form::file('attachment3', ['class' => 'form-control','accept'=>'.pdf']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <hr>


                        {!! Form::submit(trans('تحديث'), ['class' => ' col-md-3']) !!}
                        {!! Form::close() !!}




                    </div>




                    </div>
                            </div>
                            </div>
                            </div>
                            </div>

    <script type="text/javascript">


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