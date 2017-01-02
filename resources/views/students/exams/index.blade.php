@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            @include('errors.errors')

{{--

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
            </div>--}}

            <div class="col-md-6 col-md-offset-3">



                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('exams.lookup')}}</div>

                    <div class="panel-body ">
                        <div class="row">


                            <div class="col-md-12">
                            {!! Form::open(['url' => '/students/exams/lookup', 'method' => 'post']) !!}
                            <!--- SID Field --->
                                <div class="form-group">
                                    {!! Form::label('sid', 'الرقم الأكاديمي:') !!}
                                    {!! Form::text('sid', null, ['class' => 'form-control']) !!}
                                </div>
                                <!--- NID Field --->
                                <div class="form-group">
                                    {!! Form::label('nid', 'رقم الهوية/الإقامة:') !!}
                                    {!! Form::text('nid', null, ['class' => 'form-control']) !!}
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