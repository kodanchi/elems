@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('warehouse.asset')}}  | {{$asset->id}}</div>

                    <div class="panel-body newsletter-form">
                        <div class="row">

                            @include('errors.status')
                            <div class="col-md-12 newsletter-form">
                                <h4>{{trans('warehouse.sn')}}:  {{$asset->SN}}</h4>

                                <hr>

                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>{{trans('warehouse.dlcode')}}:  {{$asset->DL_code}} </h5>
                                    </div>

                                    <div class="col-md-6">
                                        <h5>{{trans('warehouse.type')}}:   {{trans('warehouse.assetTypes.'.$asset->type)}} </h5>
                                    </div>

                                    <div class="col-md-6">
                                        <h5>{{trans('warehouse.brand')}}:   {{$asset->brand}} </h5>
                                    </div>


                                    <div class="col-md-6">
                                        <h5>{{trans('warehouse.status')}}:  {{trans('warehouse.assetStatus.'.$asset->status)}}</h5>
                                    </div>


                                    <div class="col-md-6">
                                        <h5>{{trans('warehouse.warranty')}}:    {{$asset->warranty}} </h5>
                                    </div>


                                    <div class="col-md-6">
                                        <h5>{{trans('warehouse.expdate')}}: {{$asset->exp_date}} </h5>
                                    </div>


                                    <div class="col-md-6">
                                        <h5>{{trans('warehouse.trolleyid')}}:   {{$asset->trolley_id}} </h5>
                                    </div>


                                    <div class="col-md-12">
                                        <h5>{{trans('warehouse.des')}}: {{$asset->des}} </h5>
                                    </div>

                                </div>

                                <hr>

                            </div>
                            <div class="col-md-6">

                                <div class="col-md-6">
                                    <a href="{{url('cp/warehouse/edit/'.$asset->id)}}" class="button form-control">{{trans('warehouse.edit')}}</a>
                                </div>

                                <div class="col-md-6">
                                    <a href="{{url('cp/warehouse/list')}}" class="button form-control">{{trans('warehouse.back')}}</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection