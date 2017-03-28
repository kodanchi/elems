@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-7 col-md-offset-3">
                @include('errors.errors')
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('warehouse.addNewLink')}} </div>


                    <div class="panel-body newsletter-form ">

                        {!! Form::open(['url' => url('cp/warehouse/rooms/link'), 'method' => 'post']) !!}


                            <div class="col-md-12">
                                <p>{{trans('إسم القاعة ')." : ".$room->name}}</p>
                                <p>{{trans('موقع القاعة')." : ".$room->des}}</p>
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
                                {!! Form::submit('إضافة', ['class' => 'form-control']) !!}
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

    <script type="application/javascript">
        $('#brand').change(function () {
           brandsOther();


        });
        function brandsOther() {
            if($('#brand').val() === 'other'){
                if($('#other_brand').val() === 'other') $('#other_brand').val('');
                $('#div_other_brand').show();
                $('#other_brand').focus();
            }else {
                $('#other_brand').val('other');
                $('#div_other_brand').hide();
            }
        }

        $(document).ready(function () {

            brandsOther();
        });
    </script>

    @endsection