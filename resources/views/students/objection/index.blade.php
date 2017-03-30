@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            @include('errors.errors')



            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">شروط نظام الإعتراض على نتائج اختبارات طلاب التعليم عن بعد</div>

                    <div class="panel-body ">
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        يمكن للطالب الاعتراض على درجة مقررين فقط.                                    </li>
                                    <li class="list-group-item">
                                        تقديم معلومات غير صحيحة تؤثر على طلبات الطالب.                                    </li>
                                    <li class="list-group-item">
                                        يجب ذكر سبب الاعتراض بشكل واضح.                                    </li>
                                    <li class="list-group-item">
                                        تقوم لجنة التصحيح بإعادة التصحيح والرد على الطلب .                                    </li>
                                    <li class="list-group-item">
                                        يمكن للطالب تقديم طلب الاعتراض خلال 6 أيام فقط من تاريخ إعلان النتائج.                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">


                <div class="panel panel-default">
                    <div class="alert alert-danger" role="alert">
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        تم اغلاق التقديم
                    </div>
                    <div class="panel-heading">{{trans('objection.applicants')}}</div>

                    <div class="panel-body ">
                        <div class="row">


                            <div class="col-md-12">

                                {!! Form::open(['url' => '/students/objection/pin', 'method' => 'post']) !!}
                                <!--- SID Field --->
                                <div class="form-group">
                                    {!! Form::label('sid', trans('objection.sid').':') !!}
                                    {!! Form::text('sid', null, ['class' => 'form-control' ]) !!}
                                </div>
                                <label>
                                    {!! Form::checkbox('agree', '1', null,  ['id' => 'agree']) !!}
                                    أوفق على الإدلاء بالمعلومات الصحيحة وأتحمل كامل المسؤولية في حال كانت المعلومات غير صحيحة
                                </label>
                                    <div align="center">
                                        {!! Recaptcha::render() !!}
                                    </div>
                                    <br>
                                {!! Form::submit('تقدم', ['class' => 'form-control']) !!}
                                {!! Form::close() !!}
                            </div>

                        </div>
                    </div>
                </div>


                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('objection.lookup')}}</div>

                    <div class="panel-body ">
                        <div class="row">


                            <div class="col-md-12">
                            {!! Form::open(['url' => '/students/objection/view', 'method' => 'post']) !!}
                            <!--- SID Field --->
                                <div class="form-group">
                                    {!! Form::label('sid', 'الرقم الأكاديمي:') !!}
                                    {!! Form::text('sid', null, ['class' => 'form-control']) !!}
                                </div>
                                <!--- FID Field --->
                                <div class="form-group">
                                    {!! Form::label('id', 'رمز الطلب:') !!}
                                    {!! Form::text('id', null, ['class' => 'form-control']) !!}
                                </div>
                                {!! Form::submit('تحقق', ['class' => 'form-control']) !!}
                                {!! Form::close() !!}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection