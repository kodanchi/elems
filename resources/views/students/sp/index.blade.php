@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            @include('errors.errors')



            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">شروط قبول الأعذار لاختبارات طلاب التعليم عن بعد</div>

                    <div class="panel-body ">
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        حالات الأعذار الطبية: إحضار تقرير طبي باللغة العربية ومختوم بالختم الرسمي من المستشفى، وينص بشكل واضح على مدة الإجازة المرضية .
                                    </li>
                                    <li class="list-group-item">
                                        حالات أعذار حوادث السير: إحضار خطاب أو تقرير من المرور أو شركة نجم يثبت وقوع الحادث .
                                    </li>
                                    <li class="list-group-item">
                                        حالات أعذار الوفاة: إحضار ما يثبت ذلك (شهادة الوفاة أو تصريح الدفن أو تقرير طبي)
                                    </li>
                                    <li class="list-group-item">
                                        تقديم أصل العذر وليس الصورة منه .
                                    </li>
                                    <li class="list-group-item">
                                        تقديم عذر الطالب/ ـة في مدة لا تتجاوز خمسة أيام من تاريخ الاختبار المعني.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">


                <div class="panel panel-default">
                   {{-- <div class="alert alert-danger" role="alert">
        --}}{{--                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        تم اغلاق التقديم
                    </div>--}}
                    <div class="panel-heading">{{trans('sp.applicants')}}</div>

                    <div class="panel panel-default">

                    <div class="panel-body ">
                        <div class="row">


                            <div class="col-md-12">

                                {!! Form::open(['url' => '/students/sp/pin', 'method' => 'post']) !!}
                                <!--- SID Field --->
                                <div class="form-group">
                                    {!! Form::label('sid', trans('sp.sid').':') !!}
                                    {!! Form::text('sid', null, ['class' => 'form-control' ]  ) !!}
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
                    <div class="panel-heading">{{trans('sp.lookup')}}</div>

                    <div class="panel-body ">
                        <div class="row">


                            <div class="col-md-12">
                            {!! Form::open(['url' => '/students/sp/view', 'method' => 'post']) !!}
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
    </div>

    @endsection