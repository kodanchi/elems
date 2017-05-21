@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            @include('errors.errors')
            @include('errors.status')

            <style>
                /*.btn-primary {
                    color: #fff;
                    background-color: #0495c9;
                    border-color: #357ebd;
                }*/
                /*.btn-primary:hover, .btn-primary:focus, .btn-primary:active, .btn-primary.active, .open>.dropdown-toggle.btn-primary {
                    background-color: #008aa0;
                    border-color: #008aa0;
                }*/
            </style>

            <div class="col-md-12">



                <div class="panel panel-default">
                    <div class="panel-heading">طباعة النماذج</div>

                    <div class="panel-body ">
                        <div class="row">


                            <br>

                            <div class="row">
                            <div class="col-md-12">

                                <div class="col-md-4">
                                    <a href="{{asset('storage/examA1.pdf')}}" target="_blank" class="btn btn-primary btn-block">الأخطاء الشائعة</a>
                                </div>

                                <div class="col-md-4">
                                    <a href="{{asset('storage/examA2.pdf')}}" target="_blank" class="btn btn-primary btn-block">إرشادات هامة</a>
                                </div>

                                <div class="col-md-4">
                                    <a href="{{asset('storage/examA3.pdf')}}" target="_blank" class="btn btn-primary btn-block">
                                         &nbsp;  مسؤوليات ومهام مسؤول اللجنة &nbsp;
                                    </a>
                                </div>

                            </div>
                            </div>
                            <hr>

                            <div class="row">

                                <div class="col-md-12">

                                    <div class="col-md-4">
                                        <a href="{{asset('storage/examA4.pdf')}}" target="_blank" class="btn btn-primary btn-block">
                                            &nbsp;  مسؤوليات ومهام مشرف المركز &nbsp;
                                        </a>
                                    </div>

                                    <div class="col-md-4">
                                        <a href="{{asset('storage/examA5.pdf')}}" target="_blank" class="btn btn-primary btn-block">
                                            &nbsp;  مهام ومسؤوليات المراقب &nbsp;
                                        </a>
                                    </div>

                                    <div class="col-md-4">
                                        <a href="{{asset('storage/examA6.pdf')}}" target="_blank" class="btn btn-primary btn-block">
                                            &nbsp;  تقييم المراقب &nbsp;
                                        </a>
                                    </div>

                                </div>

                            </div>
                            <hr>

                            <div class="row">


                                <div class="col-md-12">

                                    <div class="col-md-4 center-block">
                                        <a href="{{asset('storage/examA7.pdf')}}" target="_blank" class="btn btn-primary btn-block">
                                            &nbsp;  تعهد البطاقة الجامعية &nbsp;
                                        </a>
                                    </div>
                                    <div class="col-md-4 center-block">
                                        <a href="{{asset('storage/examA8.pdf')}}" target="_blank" class="btn btn-primary btn-block">
                                            &nbsp;  محضر غش &nbsp;
                                        </a>
                                    </div>
                                    <div class="col-md-4 center-block">
                                        <a href="{{asset('storage/examA9new.pdf')}}" target="_blank" class="btn btn-primary btn-block">
                                            &nbsp;  نموذج إجابة &nbsp;
                                        </a>
                                    </div>
                        </div>
                        </div>
                            <hr>



                            <div class="row">

                                <div class="col-md-12 center-block text-center">

                                    <div class="col-md-4 center-block text-center">
                                        <a href="{{asset('storage/examA10.pdf')}}" target="_blank" class="btn btn-primary btn-block center-block text-center">
                                            &nbsp;  نموذج تسجيل ملاحظة على مراقب&nbsp;
                                        </a>
                                    </div>

                                </div>
                            </div>
                    </div>
            </div>
        </div>
        </div>
        </div>
        </div>


@endsection