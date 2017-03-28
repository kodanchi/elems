@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('warehouse.assetsLink')}}  | {{$employee->name}}</div>

                    <div class="panel-body newsletter-form">
                        <div class="row">

                            @include('errors.status')
                            <div class="col-md-12 newsletter-form">
                                <h4>الايميل:  {{$employee->email}}</h4>


                                <hr>

                                <div class="row">

                                    <div class="col-md-12">
                                        <h4>{{trans('warehouse.currAssets')}}</h4>
                                        <hr>
                                        <table class="table table-stripped table-hover">
                                            <thead class="">
                                            <th class="text-center">{{trans('warehouse.type')}}</th>
                                            <th class="text-center">{{trans('warehouse.sn')}}</th>
                                            <th class="text-center">{{trans('warehouse.linkType')}}</th>
                                            <th class="text-center">{{trans('warehouse.status')}}</th>
                                            <th class="text-center">{{trans('warehouse.note')}}</th>
                                            <th class="text-center">{{trans('warehouse.added_at')}}</th>
                                            <th class="text-center">{{trans('warehouse.edit')}}</th>
                                            </thead>
                                            <tbody>
                                            @foreach($assets as $asset)
                                                <tr class="text-center">
                                                    <td>{{$asset->type}}</td>
                                                    <td>{{$asset->SN}}</td>
                                                    <td>{{$asset->link_type}}</td>
                                                    <td>{{$asset->status}}</td>
                                                    <td>{{strlen($asset->note) > 15 ? substr($asset->note,0,15).'...':$asset->note}}</td>
                                                    <td>{{$asset->updated_at}}</td>
                                                    <td><a href="{{url('cp/warehouse/employees/link/edit/'.$employee->id.'/'.$asset->id)}}">
                                                            <span class="glyphicon glyphicon-circle-arrow-right"></span>
                                                        </a></td>

                                                </tr>
                                            @endforeach
                                            @if(empty($assets))
                                                <tr class="text-center">
                                                    <td colspan="7">{{trans('warehouse.noRes')}}</td>
                                                </tr>
                                            @endif
                                            </tbody>
                                        </table>

                                    </div>
                                    <div class="col-md-12">
                                        <h4>{{trans('warehouse.delAssets')}}</h4>
                                        <hr>
                                        <table class="table table-stripped table-hover">
                                            <thead class="">
                                            <th class="text-center">{{trans('warehouse.type')}}</th>
                                            <th class="text-center">{{trans('warehouse.sn')}}</th>
                                            <th class="text-center">{{trans('warehouse.linkType')}}</th>
                                            <th class="text-center">{{trans('warehouse.status')}}</th>
                                            <th class="text-center">{{trans('warehouse.note')}}</th>
                                            <th class="text-center">{{trans('warehouse.added_at')}}</th>
                                            </thead>
                                            <tbody>
                                            @foreach($delAssets as $asset)
                                                <tr class="text-center">
                                                    <td>{{$asset->type}}</td>
                                                    <td>{{$asset->SN}}</td>
                                                    <td>{{$asset->link_type}}</td>
                                                    <td>{{$asset->status}}</td>
                                                    <td>{{strlen($asset->note) > 15 ? substr($asset->note,0,15).'...':$asset->note}}</td>
                                                    <td>{{$asset->updated_at}}</td>


                                                </tr>
                                            @endforeach
                                            @if(empty($assets))
                                                <tr class="text-center">
                                                    <td colspan="7">{{trans('warehouse.noRes')}}</td>
                                                </tr>
                                            @endif
                                            </tbody>
                                        </table>

                                    </div>

                                </div>

                                <hr>

                            </div>
                            <div class="col-md-6">

                                <div class="col-md-6">
                                    <a href="{{url('cp/warehouse/employees/link/new/'.$employee->id)}}" class="button form-control">{{trans('warehouse.addNewLink')}}</a>
                                </div>

                                <div class="col-md-6">
                                    <a href="{{url('cp/warehouse/employees')}}" class="button form-control">{{trans('warehouse.back')}}</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection