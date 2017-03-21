@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-12">
                <div class="panel panel-default">

                    <div class="panel-heading">{{'نموذج إضافة بيانات طالب:'}}</div>

                    <div class="panel-body ">
                        <div class="row">

                            @include('errors.errors')
                            @include('errors.status')
                            <div class="col-md-12 newsletter-form">


                                {!! Form::open(['url' => '/cp/students/finance/create/AddNew', 'method' => 'post', 'files' => true ,'class'=>'newsletter-form' ]) !!}

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
                                        <div class="row">

                                    <div class="col-md-6">
                                        <!--- SID  --->
                                        <div class="form-group">
                                            {!! Form::label('student_id', trans('objection.sid').':') !!}
                                            {!! Form::text('student_id', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>



                                    <div class="col-md-6">
                                        <!--- NID  --->
                                        <div class="form-group">
                                            {!! Form::label('national_id', trans('objection.nid').':') !!}
                                            {!! Form::text('national_id', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                        </div>
                                <div class="row">

                                    <div class="col-md-6">

                                        <!--- Gender  --->
                                        <div class="form-group">
                                            {!! Form::label('gender', trans('objection.gender').':') !!}
                                            {!! Form::select('gender' , array('' => 'اختر الجنس', 'M' => 'ذكر', 'F' => 'أنثى'), null ,['class' => 'form-control']) !!}

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <!--- Select Field --->
                                        <div class="form-group">
                                            {!! Form::label('status', 'حالة الطالب:') !!}
                                            {!! Form::text('status',null ,['class' => 'form-control', ]) !!}

                                        </div>
                                    </div>

                                </div>




                                <div class="row">




                                <div class="col-md-6">
                                    <!--- Select Field --->
                                    <div class="form-group">
                                        {!! Form::label('status_disc', 'تفصيل الحالة:') !!}
                                        {!! Form::text('status_disc',null ,['class' => 'form-control', ]) !!}
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <!--- Select Field --->
                                    <div class="form-group">
                                        {!! Form::label('general_major', 'التخصص العام:') !!}
                                        {!! Form::text('general_major',null ,['class' => 'form-control', ]) !!}
                                    </div>
                                </div>
                                </div>

                                <div class="row">

                                <div class="col-md-6">
                                    <!--- Select Field --->
                                    <div class="form-group">
                                        {!! Form::label('acad_group', 'المجموعة الأكاديمية :') !!}
                                        {!! Form::text('acad_group',null ,['class' => 'form-control']) !!}
                                    </div>
                                </div>


                            <div class="col-md-6">
                                <!--- Select Field --->
                                <div class="form-group">
                                    {!! Form::label('GPA', 'المعدل:') !!}
                                    {!! Form::text('GPA',null ,['class' => 'form-control']) !!}
                                </div>
                            </div>
                                    </div>




                                <div class="row">

                            <div class="col-md-6">
                                <!--- Select Field --->
                                <div class="form-group">
                                    {!! Form::label('student_level', 'مستوى المرحلة الدراسية:') !!}
                                    {!! Form::select('student_level', array(
                                    '' => 'اختر المستوى الدراسي', 'L1' => 'المستوى الأول',
                                    'L2' => 'المستوى الثاني','L3' => 'المستوى الثالث' ,
                                    'L4' => 'المستوى الرابع','L5' => 'المستوى الخامس' ,
                                    'L6' => 'المستوى السادس','L7' => 'المستوى السابع' ,
                                    'L8' => 'المستوى الثامن','L9' => 'المستوى التاسع' ,
                                    'L10' => 'المستوى العاشر','L11' => 'المستوى الحادي عشر' ,
                                    'L12' => 'المستوى الثاني عشر' ) , null ,['class' => 'form-control']) !!}

                                </div>
                            </div>


                                    <div class="col-md-6">
                                        <!--- Select Field --->
                                        <div class="form-group">
                                            {!! Form::label('major', 'التخصص :') !!}
                                            {!! Form::select('major' , array('' => 'اختر التخصص', 'ABADL' => 'ABADL', 'ISLDL' => 'ISLDL' ,'SOCDL' => 'SOCDL'), null ,['class' => 'form-control']) !!}

                                        </div>
                                    </div>
                                </div>



                        <br>
                        <br>

                        {!! Form::submit('تقدم', ['class' => ' col-md-3']) !!}

                                    <a href="{{url('cp/students/finance')}}" class=" button col-md-3 ">رجوع</a>
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
                </div>
            </div>
        </div>

    <script type="application/javascript">
        $(document).ready(function () {


            $('#SID').mask("r000000000", {
                'translation': {
                    0: {
                        pattern: /[0-9*]/
                    },
                    'r':{
                        pattern: /[2/]/,
                        fallback: '1'
                    }

                },placeholder: "2XXXXXXXX"
            });

            $('#NID').mask("r000000000", {
                'translation': {
                    0: {
                        pattern: /[0-9*]/
                    },
                    'r':{
                        pattern: /[1/]/,
                        fallback: '1'
                    }

                },placeholder: "1XXXXXXXX"
            });


        });
    </script>
    @endsection