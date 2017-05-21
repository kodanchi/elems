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
                            {!! Form::open(['url' => '/cp/exams/lookup/table', 'method' => 'post']) !!}
                            <!--- SID Field --->
                                <div class="form-group">
                                    {!! Form::label('indicator_l','طريقة البحث', ['id' => 'indicator_l']) !!}
                                    <select name="indicator" class="form-control selectpicker" id="date" style="width:350px" data-live-search="true" required>
                                        <option value="" style="direction: ltr">اختر طريقة البحث</option>
                                        <option value="sid" style="direction: ltr">الرقم الجامعي</option>
                                        <option value="nid" style="direction: ltr">الهوية</option>
                                    </select>
                                    <br>
                                    <br>
                                </div>
                                <!--- NID Field --->
                                <div class="form-group">
                                    {!! Form::text('id', null, ['class' => 'form-control']) !!}
                                </div>


                                {!! Form::submit('تحقق', ['class' => 'form-control']) !!}
                                {!! Form::close() !!}
                                <button id="btnBack" name="btnBack"  class="btn btn-block btn-default col-md-3" onclick="location.href='{{url('/cp/exams/services/home')}}';">رجوع</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection