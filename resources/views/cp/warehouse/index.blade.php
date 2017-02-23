@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-11 col-md-offset-1">
                @include('errors.errors')
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('warehouse.title')}}</div>


                    <div class="panel-body newsletter-form">

                        <div class="col col-md-12">
                            <a href="{{url('cp/warehouse/list')}}" class="button">المعهودات</a>
                            <a href="{{url('cp/warehouse/warranty')}}" class="button">الضمان</a>
                            <a href="{{url('cp/warehouse/employees')}}" class="button">الموظفين</a>
                            <a href="{{url('cp/warehouse/rooms')}}" class="button">القاعات</a>
                            <a href="{{url('cp/warehouse/reservations')}}" class="button">الحجوزات</a>
                        </div>
                        <div class="col col-md-6">

                        </div>




                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection