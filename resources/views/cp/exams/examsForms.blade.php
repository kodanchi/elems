@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            @include('errors.errors')


            <div class="col-md-12 col-md-offset-1"">



                <div class="panel panel-default">
                    <div class="panel-heading">طباعة النماذج</div>

                    <div class="panel-body ">
                        <div class="row">


                            <div class="col-md-12">
<br>






                                <div class="col-md-4">
                                    <a href="{{asset('storage/examA1.pdf')}}" target="_blank" class="btn btn-primary">
                                        <span class="glyphicon glyphicon-paperclip" ></span>  &nbsp;  الأخطاء الشائعة
                                    </a>
                                </div>


                                <div class="col-md-4">
                                    <a href="{{asset('storage/examA2.pdf')}}" target="_blank" class="btn btn-primary">
                                        <span class="glyphicon glyphicon-paperclip"></span>  &nbsp;  إرشادات هامة  &nbsp;
                                    </a>
                                </div>

                                <div class="col-md-4">
                                    <a href="{{asset('storage/examA3.pdf')}}" target="_blank" class="btn btn-primary">
                                        <span class="glyphicon glyphicon-paperclip"></span>  &nbsp;  مسؤوليات ومهام مسؤول اللجنة &nbsp;
                                    </a>
                                </div>








                            </div>
                            <hr>
                            <br>
                            <br>
                            <br>



                            <div class="row">


                                <div class="col-md-12">







                                    <div class="col-md-4">
                                        <a href="{{asset('storage/examA4.pdf')}}" target="_blank" class="btn btn-primary">
                                            <span class="glyphicon glyphicon-paperclip"></span>  &nbsp;  مسؤوليات ومهام مشرف المركز &nbsp;
                                        </a>
                                    </div>

                                    <div class="col-md-4">
                                        <a href="{{asset('storage/examA5.pdf')}}" target="_blank" class="btn btn-primary">
                                            <span class="glyphicon glyphicon-paperclip"></span>  &nbsp;  مهام ومسؤوليات المراقب &nbsp;
                                        </a>
                                    </div>

                                    <div class="col-md-4">
                                        <a href="{{asset('storage/examA6.pdf')}}" target="_blank" class="btn btn-primary">
                                            <span class="glyphicon glyphicon-paperclip"></span>  &nbsp;  تقييم المراقب &nbsp;
                                        </a>
                                    </div>









                                </div>


                            </div>
                            <hr>
                            <br>

                            <div class="row">


                                <div class="col-md-12">

                                    <div class="col-md-4">
                                        <a href="{{asset('storage/examA7.pdf')}}" target="_blank" class="btn btn-primary">
                                            <span class="glyphicon glyphicon-paperclip"></span>  &nbsp;  تعهد البطاقة الجامعية &nbsp;
                                        </a>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="{{asset('storage/examA8.pdf')}}" target="_blank" class="btn btn-primary">
                                            <span class="glyphicon glyphicon-paperclip"></span>  &nbsp;  محضر غش &nbsp;
                                        </a>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="{{asset('storage/examA9.jpg')}}" target="_blank" class="btn btn-primary">
                                            <span class="glyphicon glyphicon-paperclip"></span>  &nbsp;  نموذج إجابة &nbsp;
                                        </a>
                                    </div>
                        </div>
                        </div>
                            <br>


                            <div class="row">


                                <div class="col-md-12">

                                    <div class="col-md-4">
                                        <a href="{{asset('storage/examA10.pdf')}}" target="_blank" class="btn btn-primary">
                                            <span class="glyphicon glyphicon-paperclip"></span>  &nbsp;  نموذج تسجيل ملاحظة على مراقب&nbsp;
                                        </a>
                                    </div>

                                </div>
                            </div>
                    </div>
            </div>
        </div>
    </div>

@endsection