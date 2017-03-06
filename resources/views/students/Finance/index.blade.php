@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            @include('errors.errors')



            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">تعليمات استخدام نظام طلب المساعدة لطلاب التعليم عن بعد</div>

                    <div class="panel-body ">
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="list-group">
                                    <ul class="list-group-item">
                                      يتوجّب إدخال الطلب من قِبلْ الطالب ويشترط تفعيل الطلب من خلال البريد الجامعي.
                                    </ul>
                                    <ul class="list-group-item">



                                        يجب على الطالب تحديد نوع الطلب بعناية وعدم إرسال طلبات لجهات ليست لها علاقة بالطلب وذلك على النحو التالي:
<br><hr>
                                 <b>  التسجيل</b>
                                        : للاستفسارات عن تسجيل المقررات ومعالجة مشاكل التسجيل وما يخص سجلات الطالب.

                                        <br>
                                        <b>  المالية</b>
                                        :  للشؤون المالية والرسوم الدراسية وما يتبعه.<br>
                                        <b>   الشؤون الأكاديمية</b>
                                        : كل ما يتعلق بشؤون التدريس والجداول الدراسية وجودة العملية التعليمية والتواصل مع الكلية والقسم الأكاديمي.<br>
                                        <b>  الخريجين</b>
                                        :  لاستقبال طلبات الخريجين واستفساراتهم أثناء تخرجهم.<br>
                                        <b>   الدعم الفني</b>
                                        : للاستفسار عند حدوث مشكلة فنّية تتعلق بالحساب أو الدخول أو ما شابهه.
       <br>
                                        <b>   البلاك بورد:</b>
                                        : لوجود أي مشكلة تظهر للطالب في البلاك بورد



</ul>
                                    <li class="list-group-item">
                                        لا يسمح للطالب تكرار الطلب حتى يعالج الطلب الحالي.                              </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">


                <div class="panel panel-default">
                    <div class="panel-heading">{{'نموذج للتقدم لطلب دعم فني'}}</div>

                    <div class="panel-body ">
                        <div class="row">


                            <div class="col-md-12">

                                {!! Form::open(['url' => 'helpdesk/pin', 'method' => 'post']) !!}
                                <!--- SID Field --->
                                <div class="form-group">
                                    {!! Form::label('sid', trans('objection.sid').':') !!}
                                    {!! Form::text('sid', null, ['class' => 'form-control']) !!}
                                </div>
                                <label>
                                    {!! Form::checkbox('agree', '1', null,  ['id' => 'agree']) !!}
                                    أوفق على الإدلاء بالمعلومات الصحيحة وأتحمل كامل المسؤولية في حال كانت المعلومات غير صحيحة
                                </label>
                                </br>
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
                            {!! Form::open(['url' => '/helpdesk/view', 'method' => 'post']) !!}
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