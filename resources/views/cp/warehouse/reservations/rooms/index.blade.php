@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-11 col-md-offset-1">
                @include('errors.errors')
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('warehouse.rooms')}}  | عدد النتائج: {{$rooms->count()}}</div>


                    <div class="panel-body ">

                        @include('cp.warehouse.reservations.rooms.search')

                        <div class="col col-md-9">
                            <table class="table table-stripped table-hover">
                                <thead class="">
                                <th class="text-center">{{trans('warehouse.id')}}</th>
                                <th class="text-center">{{trans('warehouse.roomsName')}}</th>
                                <th class="text-center">{{trans('warehouse.max')}}</th>
                                <th class="text-center">{{trans('warehouse.roomsDes')}}</th>
                                <th class="text-center">{{trans('warehouse.edit')}}</th>
                                <th class="text-center">{{trans('warehouse.view')}}</th>
                                </thead>
                                <tbody>
                                @foreach($rooms as $room)
                                    <tr class="text-center">
                                        <td>{{$room->id}}</td>
                                        <td>{{$room->name}}</td>
                                        <td>{{$room->max}}</td>
                                        <td>{{strlen($room->des) > 15 ? substr($room->des,0,15).'...':$room->des}}</td>
                                        <td><a href="{{url('cp/warehouse/rooms/edit/'.$room->id)}}">
                                                <span class="glyphicon glyphicon-circle-arrow-right"></span>
                                            </a></td>
                                        <td><a href="{{url('cp/warehouse/rooms/view/'.$room->id)}}">
                                                <span class="glyphicon glyphicon-circle-arrow-right"></span>
                                            </a></td>
                                    </tr>
                                @endforeach
                                @if($rooms->isEmpty())
                                    <tr class="text-center">
                                        <td colspan="5">{{trans('warehouse.noRes')}}</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            <div>{{$rooms->links()}}</div>



                        </div>




                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection