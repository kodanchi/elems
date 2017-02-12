@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-7 col-md-offset-3">
                @include('errors.errors')
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('warehouse.RoomCreate')}} </div>


                    <div class="panel-body newsletter-form ">



                        {!! Form::open(['url' => url('cp/warehouse/rooms/'), 'method' => 'post']) !!}

                            <div class="col-md-6">
                                <!--- Name Field --->
                                <div class="form-group">
                                    {!! Form::label('name', trans('warehouse.roomsName').':') !!}
                                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!--- Max Field --->
                                <div class="form-group">
                                    {!! Form::label('max', trans('warehouse.max').':') !!}
                                    {!! Form::number('max', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <!--- Des Field --->
                                <div class="form-group">
                                    {!! Form::label('des', trans('warehouse.roomsDes').':') !!}
                                    {!! Form::textarea('des', null, ['class' => 'form-control']) !!}
                                </div>

                            </div>

                            <div class="col-md-6">
                                {!! Form::submit('إضافة', ['class' => 'form-control']) !!}
                            </div>
                            <div class="col-md-6">
                                <a href="{{url('cp/warehouse/rooms')}}" class="form-control button">رجوع</a>
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