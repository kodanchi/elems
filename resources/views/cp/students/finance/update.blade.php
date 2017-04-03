@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">تحديث بيانات الطالب</div>

                    <div class="panel-body ">
                        <div class="row">

                            @include('errors.status')
                            @include('errors.errors')
                            <div class="col-md-12 newsletter-form">

                                {!! Form::model($student, array('action' => array('FinanceController@UpdateIndex', $student->student_id))) !!}

                                <div class="row">
                                    <div class="col-md-6">
                                        <!--- Full name  --->
                                        <div class="form-group">
                                            {!! Form::label('name', trans('objection.name').':') !!}
                                            {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <!--- SID  --->
                                        <div class="form-group">
                                            {!! Form::label('student_id', trans('objection.sid').':') !!}
                                            {!! Form::text('student_id', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-md-6">
                                        <!--- NID  --->
                                        <div class="form-group">
                                            {!! Form::label('national_id', trans('objection.nid').':') !!}
                                            {!! Form::text('national_id', null, ['class' => 'form-control']) !!}
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

                                </div>


                                <br>
                                <br>
                                {!! Form::submit('تحديث', ['class' => ' col-md-3']) !!}

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

    @endsection