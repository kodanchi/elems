@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('warehouse.resourcesLink')}}  | {{$room->name}}</div>

                    <div class="panel-body newsletter-form">
                        <div class="row">

                            @include('errors.status')
                            <div class="col-md-12 newsletter-form">
                                <h4>معلومة دلالية:  {{$room->des}}</h4>
                                <h4>{{trans('warehouse.max')}}:  {{$room->max}}</h4>


                                <hr>

                                <div class="row">

                                    <div class="col-md-12">
                                        <h4>{{trans('warehouse.currResources')}}</h4>
                                        <hr>
                                        <table class="table table-stripped table-hover">
                                            <thead class="">

                                            <th class="text-center"></th>
                                            <th class="text-center">{{trans('warehouse.type')}}</th>
                                            <th class="text-center">{{trans('warehouse.sn')}}</th>
                                            <th class="text-center">{{trans('warehouse.status')}}</th>
                                            <th class="text-center">موديل الجهاز</th>
                                            <th class="text-center">تاريخ التعديل</th>

                                            <th class="text-center">{{trans('warehouse.edit')}}</th>
                                            </thead>
                                            <tbody>
                                            <?php  $x=1; ?>
                                            @foreach($assets as $asset)
                                                <tr class="text-center">
                                                    <td>{{$x}}</td>
                                                    <?php  $x++; ?>
                                                    <td>{{$asset->type}}</td>
                                                    <td>{{$asset->SN}}</td>
                                                    <td>{{$asset->status}}</td>
                                                    <td>{{$asset->brand}}</td>
                                                    <td>{{$asset->updated_at}}</td>
                                                    <td><a href="{{url('cp/warehouse/rooms/link/edit/'.$room->id.'/'.$asset->id)}}">
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
                                        <h4>{{trans('warehouse.delResources')}}</h4>
                                        <hr>
                                        <table class="table table-stripped table-hover">
                                            <thead class="">
                                            <th class="text-center">{{trans('warehouse.type')}}</th>
                                            <th class="text-center">{{trans('warehouse.sn')}}</th>
                                            <th class="text-center">{{trans('warehouse.status')}}</th>
                                            <th class="text-center">{{trans('warehouse.added_at')}}</th>
                                            </thead>
                                            <tbody>
                                            @foreach($delAssets as $asset)
                                                <tr class="text-center">
                                                    <td>{{$asset->type}}</td>
                                                    <td>{{$asset->SN}}</td>
                                                    <td>{{$asset->status}}</td>
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
                                    <a href="{{url('cp/warehouse/rooms/link/new/'.$room->id)}}" class="button form-control">{{trans('warehouse.addNewDevice')}}</a>
                                </div>

                                <div class="col-md-6">
                                    <a href="{{url('cp/warehouse/rooms')}}" class="button form-control">{{trans('warehouse.back')}}</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection