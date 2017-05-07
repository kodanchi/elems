@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-12">
                <div class="panel panel-default">

                    <div class="panel-heading">{{'نموذج طلب خدمة:'}}</div>

                    <div class="panel-body ">
                        <div class="row">

                            @include('errors.errors')
                            <div class="col-md-12 newsletter-form">

                                {!! Form::open(['url' => '/helpdesk/new', 'method' => 'post', 'files' => true ,'class'=>'newsletter-form' ]) !!}

                                <div class="row">
                                    <div class="col-md-6">
                                        <!--- Full name  --->
                                        <div class="form-group">
                                            {!! Form::label('name', trans('objection.name').':') !!}
                                            {{$student->name}}
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <!--- SID  --->
                                        <div class="form-group">
                                            {!! Form::label('SID', trans('objection.sid').':') !!}
                                            {{$student->sid}}
                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-md-6">
                                        <!--- NID  --->
                                        <div class="form-group">
                                            {!! Form::label('NID', trans('objection.nid').':') !!}
                                            {{$student->nid}}
                                        </div>
                                    </div>


                                    <div class="col-md-6">

                                        <!--- Gender  --->
                                        <div class="form-group">
                                            {!! Form::label('gender', trans('objection.gender').':') !!}
                                            {{trans('studentGender.'.$student->gender)}}
                                        </div>
                                    </div>



                                </div>


                                <div class="row">



                                    <div class="col-md-6">
                                        <!--- Select Field --->
                                        <div class="form-group">
                                            {!! Form::label('serviceType', 'نوع الخدمة:') !!}
                                            {!! Form::select('serviceType', $serviceType ,null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <!--- Select Field --->
                                        <div class="form-group">
                                            {!! Form::label('major', 'التخصص :') !!}
                                            {{trans('majorCodes.'.$student->major)}}
                                        </div>
                                    </div>
                                </div>











                                    <div class="row">

                                        <div class="col-md-6">
                                            <!--- Subject Field --->
                                            <div class="form-group">
                                                {!! Form::label('subject', 'الموضوع:') !!}
                                                {!! Form::text('subject', null, ['class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="col col-md-6">
                                            <!--- Upload Field --->
                                            <div class="form-group">
                                                {!! Form::label('file_L', trans('sp.attach').':') !!}
                                                {!! Form::file('file', ['class' => 'form-control','accept'=>'.pdf','id'=>'file']) !!}
                                                <small>يرفق ملف pdf </small>
                                                <small class="red">الحجم المسموح: 4MB أو أقل</small>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">


                                        <div class="col-md-6">
                                            <!--- Reason Field --->
                                            <!--- reason Field --->
                                            <div class="form-group">
                                                {!! Form::label('des', 'شرح المشكلة:') !!}
                                                {!! Form::textarea('des', null, ['class' => 'form-control']) !!}
                                            </div>
                                        </div>

                                </div>


                                <div class="col-md-12 ">
                                    <label>
                                        {!! Form::checkbox('agree', '1', null,  ['id' => 'agree']) !!}
                                        أوفق على الإدلاء بالمعلومات الصحيحة وأتحمل كامل المسؤولية في حال كانت المعلومات غير صحيحة
                                    </label>
                                </div>
                        <br>
                        <br>
                        {!! Form::submit('تقدم', ['class' => ' col-md-3']) !!}

                                    <a href="{{url('/helpdesk')}}" class=" button col-md-3 ">رجوع</a>
                                {!! Form::close() !!}
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

        $('#file').bind('change', function() {
            //alert(this.files[0].size);
            if (this.files[0].size>4000095) {
                //this.files[0].size gets the size of your file.
                alert("حجم الملف يجب ان يكون أقل من 4 ميجابايت");
                $("#file").val('');
            }
        });
    </script>
    @endsection