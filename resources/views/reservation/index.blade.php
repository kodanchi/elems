@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            @include('errors.errors')



            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">شروط حجز القاعات بعمادة التعليم الإلكتروني</div>

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
                    <div class="panel-heading">{{trans('warehouse.newGuest')}}</div>

                    <div class="panel-body newsletter-form">
                        <div class="row">


                            <div class="col-md-12">

                                <a href="{{url('reservation/newGuest')}}" class="button form-control">{{trans('warehouse.clickForRegister')}}</a>
                            </div>

                        </div>
                    </div>
                </div>


                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('warehouse.existGuest')}}</div>

                    <div class="panel-body ">
                        <div class="row">


                            <div class="col-md-12">
                            {!! Form::open(['url' => '/reservation/check', 'method' => 'post']) !!}
                            <!--- Email Field --->
                                <div class="form-group">
                                    {!! Form::label('email', trans('warehouse.email').':') !!}
                                    {!! Form::email('email', null, ['class' => 'form-control']) !!}
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