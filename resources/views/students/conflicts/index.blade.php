@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            @include('errors.errors')



            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">شروط اختبارات التعارض لطلاب التعليم عن بعد</div>

                    <div class="panel-body ">
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        يكون الاختبار الاول لطلاب التعارض الساعة 4 عصراً ويمتد وقت الاختبارين إلى الساعة الثامنة مساءاً.
                                    </li>
                                    <li class="list-group-item">
                                        في يوم الاختبار يقوم الطالب باختبار المقرر في المستوى الأدنى له أولاً ثم مقرر المستوى الأعلى المستويات موضحة في جدول الاختبارات النهائية.
                                    </li>
                                    <li class="list-group-item">
                                        بعد الانتهاء من الاختبار الأول يتاح للطالب في أي وقت اختبار المقرر الثاني مباشرة .
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">


                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('conflict.applicants')}}</div>

                    <div class="panel-body ">
                        <div class="row">


                            <div class="col-md-12">

                                {!! Form::open(['url' => '/students/conflict/pin', 'method' => 'post']) !!}
                                <!--- SID Field --->
                                <div class="form-group">
                                    {!! Form::label('sid', trans('conflict.sid').':') !!}
                                    {!! Form::text('sid', null, ['class' => 'form-control']) !!}
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
                    <div class="panel-heading">{{trans('conflict.lookup')}}</div>

                    <div class="panel-body ">
                        <div class="row">


                            <div class="col-md-12">
                            {!! Form::open(['url' => '/students/conflict/view', 'method' => 'post']) !!}
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