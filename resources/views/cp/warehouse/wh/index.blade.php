@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-11 col-md-offset-1">
                @include('errors.errors')
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('warehouse.title')}}  | عدد النتائج: {{$WHassets->count()}}</div>


                    <div class="panel-body ">

                        @include('cp.warehouse.wh.search')

                        <div class="col col-md-9">
                            <table class="table table-stripped table-hover">
                                <thead class="">
                                <th class="text-center">{{trans('warehouse.sn')}}</th>
                                <th class="text-center">{{trans('warehouse.dlcode')}}</th>
                                <th class="text-center">{{trans('warehouse.type')}}</th>
                                <th class="text-center">{{trans('warehouse.status')}}</th>
                                <th class="text-center">{{trans('warehouse.view')}}</th>
                                </thead>
                                <tbody>
                                @foreach($WHassets as $asset)
                                    <tr class="text-center">
                                        <td>{{$asset->SN}}</td>
                                        <td>{{$asset->DL_code}}</td>
                                        <td>{{trans('warehouse.assetTypes.'.$asset->type)}}</td>
                                        <td>{{trans('warehouse.assetStatus.'.$asset->status)}}</td>
                                        <td><a href="{{url('cp/warehouse/view/'.$asset->id)}}">
                                                <span class="glyphicon glyphicon-circle-arrow-right"></span>
                                            </a></td>
                                    </tr>
                                @endforeach
                                @if($WHassets->isEmpty())
                                    <tr class="text-center">
                                        <td colspan="4">{{trans('warehouse.noRes')}}</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            <div>{{$WHassets->links()}}</div>



                        </div>




                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection