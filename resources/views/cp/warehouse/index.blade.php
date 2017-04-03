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
            <div class="col-md-12">
                @include('errors.errors')
                <div class="panel panel-default">
                    <div class="panel-heading"></div>



                    <div class="panel-body newsletter-form">

                        <div class="row" class="col-md-11" >
                            <div class="col-md-2">
                                <div class="center">

                                    <a href="{{url('cp/warehouse/list')}}">
                                <img src="{{asset('storage/Equipments_B.svg')}}" alt="E-Learning" width="500px"  height="100px">
                      <h4 style="text-align: center">أجهزة العمادة</h4></a></div>


                            </div><!--/.col-md-4-->
                            <div class="col-md-2">
                                <div class="center">
                                    <a href="{{url('cp/warehouse/warranty')}}">
                                    <img src="{{asset('storage/Insurance_B.svg')}}" alt="E-Learning" width="500px"  height="120px">
                                 <h4 style="text-align: center">الضمان</h4></a>
                                </div>


                            </div><!--/.col-md-4-->
                            <div class="col-md-2">
                                <div class="center">
                                    <a href="{{url('cp/warehouse/employees')}}">
                                    <img src="{{asset('storage/Employees_B.svg')}}" alt="E-Learning" width="500px" height="120px">
                            <h4 style="text-align: center">الموظفين</h4></a>
                                </div>


                                <hr>


                            </div><!--/.col-md-4-->
                            <div class="col-md-2">
                                <div class="center">
                                    <a href="{{url('cp/warehouse/rooms')}}" >
                                    <img src="{{asset('storage/Rooms_B.svg')}}" alt="E-Learning" width="500px"  height="120px" class="img-circle">

                                <h4 style="text-align: center">القاعات</h4></a></div>

                            </div><!--/.col-md-4-->
                            <div class="col-md-2">
                                <div class="center">
                                    <a href="{{url('cp/warehouse/reservations')}}">
                                    <img src="{{asset('storage/Booking_B.svg')}}" alt="E-Learning" width="500px"  height="120px">
                                  <h4 style="text-align: center">الحجوزات</h4></a>
                                </div>


                            </div>
                            <div class="col-md-2" >
                            <div class="center">
                                    <a href="{{url('cp/warehouse/reports')}}">
                                    <img src="{{asset('storage/print_B.svg')}}" alt="E-Learning" width="500px"  height="120px">
                                    <h4 style="text-align: center">طباعة التقارير</h4></a>
                                </div>


                            </div><!--/.col-md-4-->

                    </div><!--/.row-->


                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection