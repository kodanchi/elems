@extends('layouts.app')

@section('content')
    <style>
        a:hover {
            color: #204d74;
        }

        a:link {
            text-decoration: none;
        }
    </style>


    <div class="container ">
        <div class="row ">
            <div class="col-md-10 col-md-offset-1">
                @include('errors.errors')
                @include('errors.status')
                <div class="panel panel-default">
                    <div class="panel-heading">خدمات الاختبارت</div>



                    <div class="panel-body newsletter-form">

                        <div class="row col-md-12 " >

                            <div class="col-md-2">
                                <div class="center">
                                    <a href="{{url('students/exams/lookup')}}">
                                {{--<img src="{{asset('storage/sec.png')}}" alt="E-Learning" width="400px"  height="100px" class="img-circle">--}}
                                <img src="{{asset('storage/secN.png')}}" alt="E-Learning" width="300px"  height="72px" class="img-circle">
                                <h4 style="text-align: center">جدول الطالب</h4></a></div>
                            </div><!--/.col-md-4-->



                            <div class="col-md-2">
                                <div class="center">
                                    <a href="{{url('cp/printforms/dates')}}">
                                    {{--<img src="{{asset('storage/list.png')}}" alt="E-Learning" width="400px"  height="120px" class="img-circle">--}}
                                    <img src="{{asset('storage/listN.png')}}" alt="E-Learning" width="300px"  height="72px" class="img-circle">
                                 <h4 style="text-align: center">كشوفات الطلاب</h4></a>
                                </div>
                            </div><!--/.col-md-4-->







                            <div class="col-md-2">
                                <div class="center">
                                    <a href="{{url('cp/exams/testers')}}" >
                                    {{--<img src="{{asset('storage/reg.png')}}" alt="E-Learning" width="400px"  height="120px" class="img-circle">--}}
                                    <img src="{{asset('storage/regN.png')}}" alt="E-Learning" width="300px"  height="72px" class="img-circle">

                                <h4 style="text-align: center">تحضير المراقبين</h4></a></div>


                            </div>


                                <div class="col-md-2" >
                                    <div class="center">
                                        <a href="{{url('/cp/exams/StudentsAbsenceExport')}}">
                                            {{--<img src="{{asset('storage/sec.png')}}" alt="E-Learning" width="500px"  height="120px" class="img-circle">--}}
                                            <img src="{{asset('storage/report-card-icon-3N.png')}}" alt="E-Learning" width="300px"  height="72px" class="img-circle">
                                            <h4 style="text-align: center">تصدير الطلاب المتغيبين </h4></a>
                                    </div>
                                </div>









                            <div class="col-md-2">
                                <div class="center">
                                    <a href="{{url('cp/exams/absence')}}">
                                    {{--<img src="{{asset('storage/attendencd.png')}}" alt="E-Learning" width="500px"  height="120px" class="img-circle">--}}
                                    <img src="{{asset('storage/icon-employee-time-attendanceN.png')}}" alt="E-Learning" width="300px"  height="72px" class="img-circle">
                                  <h4 style="text-align: center">غياب الطلاب</h4></a>
                                </div>
                            </div>



                                <div class="col-md-2" >
                                    <div class="center">
                                        <a href="{{url('/cp/printforms/statistics')}}">
                                            {{--<img src="{{asset('storage/stas.png')}}" alt="E-Learning" width="500px"  height="120px" class="img-circle">--}}
                                            <img src="{{asset('storage/analysis-icon-14N.png')}}" alt="E-Learning" width="300px"  height="72px" class="img-circle">
                                            <h4 style="text-align: center">إحصائيات الطلاب بالمراكز</h4></a>
                                    </div>
                                </div>












                                <div class="col-md-2" >
                                    <div class="center">
                                        <a href="{{url('/cp/exams/testersCenters')}}">
                                            {{--<img src="{{asset('storage/print22.png')}}" alt="E-Learning" width="500px"  height="120px" class="img-circle">--}}
                                            <img src="{{asset('storage/print_iconN.png')}}" alt="E-Learning" width="300px"  height="72px" class="img-circle">
                                            <h4 style="text-align: center">طباعة أسماء المراقبين</h4></a>
                                    </div>
                                </div>

                                <div class="col-md-2" >
                                    <div class="center">
                                        <a href="{{url('/cp/exams/testers/search')}}">
                                            {{--<img src="{{asset('storage/sec.png')}}" alt="E-Learning" width="500px"  height="120px" class="img-circle">--}}
                                            <img src="{{asset('storage/secN.png')}}" alt="E-Learning" width="300px"  height="72px" class="img-circle">
                                            <h4 style="text-align: center">جدول المراقبين</h4></a>
                                    </div>
                                </div>








                                @if(in_array('admin',Auth::user()->getAllroles()))
                                <div class="col-md-2" >
                                    <div class="center">
                                        <a href="{{url('/cp/exams/testers/testersAllocation')}}">
                                            {{--<img src="{{asset('storage/dis.png')}}" alt="E-Learning" width="500px"  height="120px" class="img-circle">--}}
                                            <img src="{{asset('storage/disN.png')}}" alt="E-Learning" width="300px"  height="72px" class="img-circle">
                                            <h4 style="text-align: center">تعيين المراقبين لللمراكز</h4></a>
                                    </div>


                                </div><!--/.col-md-4-->
                                @endif

                                    @if(in_array('admin',Auth::user()->getAllroles()))
                                    <div class="col-md-2" >
                                        <div class="center">
                                            <a href="{{url('cp/examapprove')}}">
                                                {{--<img src="{{asset('storage/Approve.png')}}" alt="E-Learning" width="500px"  height="120px" class="img-circle">--}}
                                                <img src="{{asset('storage/ApproveN.png')}}" alt="E-Learning" width="300px"  height="72px" class="img-circle">
                                                <h4 style="text-align: center">إثبات حضور اختبار</h4></a>
                                        </div>
                                    </div>
                                    @endif




                                <div class="col-md-2" >
                                    <div class="center">
                                        <a href="{{url('/cp/exams/testersPresenceExport')}}">
                                            {{--<img src="{{asset('storage/stas.png')}}" alt="E-Learning" width="500px"  height="120px" class="img-circle">--}}
                                            <img src="{{asset('storage/report-iconN.png')}}" alt="E-Learning" width="300px"  height="72px" class="img-circle">
                                            <h4 style="text-align: center">تصدير بيانات حضور المراقبين</h4></a>
                                    </div>
                                </div>




                                @if(in_array('admin',Auth::user()->getAllroles()))
                                    <div class="col-md-2">
                                        <div class="center">
                                            <a href="{{url('cp/form/emr/evaluation')}}">
                                                {{--<img src="{{asset('storage/rate.png')}}" alt="E-Learning" width="400px" height="120px" class="img-circle" >--}}
                                                <img src="{{asset('storage/rateN.png')}}" alt="E-Learning" width="300px" height="72px" class="img-circle" >
                                                <h4 style="text-align: center">تقييم المراقبين</h4></a>
                                        </div>

                                    </div><!--/.col-md-4-->
                                @endif




</div>

                        </div>





                        <!--/.row-->
                            </div>

                    </div>

            </div>
        </div>
    </div>

    @endsection