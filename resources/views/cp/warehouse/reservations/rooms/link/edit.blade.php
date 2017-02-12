@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-7 col-md-offset-3">
                @include('errors.errors')
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{trans('warehouse.editLink')}}
                        @if($roomAsset->status == 1)
                        <a href="{{url('cp/warehouse/rooms/link/delete/'.$roomAsset->id)}}" title="إلغاء العهدة" class="pull-right">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                        </a>
                            {{--@else
                            <a href="{{url('cp/warehouse/employees/link/delete/'.$roomAsset->id)}}" title="إلغاء العهدة" class="pull-right">
                                <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
                            </a>--}}
                            @endif

                    </div>


                    <div class="panel-body newsletter-form ">

                        {!! Form::model($roomAsset, ['url' => ['cp/warehouse/rooms/link/update', $roomAsset->id], 'method' => 'Patch']) !!}

                        <div class="col-md-12">
                            <p>{{trans('warehouse.name')." : ".$room->name}}</p>
                            <p>{{trans('warehouse.des')." : ".$room->email}}</p>
                        </div>
                        <div class="col-md-12">
                            <!--- Asset Field --->
                            <div class="form-group">
                                {!! Form::label('asset_id', trans('warehouse.asset').':') !!}
                                {!! Form::select('asset_id', $assets , null , ['class' => 'form-control selectpicker','data-live-search'=> 'true']) !!}
                            </div>
                        </div>


                        <div class="col-md-6">
                            {!! Form::hidden('room_id', $room->id, ['id' => 'id']) !!}

                            {!! Form::submit('تحديث', ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-md-6">
                            <a href="{{url('cp/warehouse/rooms/view/'.$room->id)}}" class="form-control button">رجوع</a>
                        </div>

                        {!! Form::close() !!}


                        </div>




                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection