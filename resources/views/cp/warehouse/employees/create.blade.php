@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-7 col-md-offset-3">
                @include('errors.errors')
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('warehouse.newAsset')}} </div>


                    <div class="panel-body newsletter-form ">

                        {!! Form::open(['url' => url('cp/warehouse/employees'), 'method' => 'post']) !!}



                            <!--- Email Field --->
                            <div class="form-group">
                                {!! Form::label('email', trans('warehouse.email').':') !!}
                                {!! Form::email('email', null, ['class' => 'form-control']) !!}
                            </div>


                            <!--- Name Field --->
                            <div class="form-group">
                                {!! Form::label('name',  trans('warehouse.name').':') !!}
                                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            </div>


                            <!--- Phone Field --->
                            <div class="form-group">
                                {!! Form::label('phone',trans('warehouse.phone').':') !!}
                                {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                            </div>


                            <div class="col-md-6">
                                {!! Form::submit('إضافة', ['class' => 'form-control']) !!}
                            </div>
                            <div class="col-md-6">
                                <a href="{{url('cp/warehouse/employees/')}}" class="form-control button">رجوع</a>
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