@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-7 col-md-offset-3">
                @include('errors.errors')
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('warehouse.newAsset')}} </div>


                    <div class="panel-body newsletter-form ">

                        {!! Form::open(['url' => url('cp/warehouse/'), 'method' => 'post']) !!}

                        <!--- SN Field --->
                        <div class="form-group">
                            {!! Form::label('SN', trans('warehouse.sn').':') !!}
                            {!! Form::text('SN', null, ['class' => 'form-control']) !!}
                        </div>

                            <!--- DL-Code Field --->
                            <div class="form-group">
                                {!! Form::label('DL_code', trans('warehouse.dlcode').':') !!}
                                {!! Form::text('DL_code', null, ['class' => 'form-control']) !!}
                            </div>

                            <!--- type Field --->
                            <div class="form-group">
                                {!! Form::label('type', trans('warehouse.type').':') !!}
                                {!! Form::select('type', $assetTypes , null , ['class' => 'form-control']) !!}
                            </div>

                            <!--- Status Field --->
                            <div class="form-group">
                                {!! Form::label('status', trans('warehouse.status').':') !!}
                                {!! Form::select('status', $assetStatus , null , ['class' => 'form-control']) !!}
                            </div>

                            <!--- Brand Field --->
                            <div class="form-group">
                                {!! Form::label('brand', trans('warehouse.brand').':') !!}
                                {!! Form::select('brand', $assetBrands , null , ['class' => 'form-control']) !!}
                            </div>
                            <!--- Other Brand Field --->
                            <div id="div_other_brand" class="form-group">
                                <!--- Other Brand Field --->
                                <div class="form-group">
                                    {!! Form::label('other_brand', trans('warehouse.specify').':') !!}

                                    {!! Form::text('other_brand', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            
                            <!--- Warranty Field --->
                            <div class="form-group">
                                {!! Form::label('warranty', trans('warehouse.warranty').':') !!}
                                {!! Form::text('warranty', null, ['class' => 'form-control']) !!}
                            </div>

                            <!--- Expiration Date Field --->
                            <div class="form-group">
                                {!! Form::label('exp_date', trans('warehouse.expdate').':') !!}
                                {!! Form::date('exp_date', null, ['class' => 'form-control']) !!}
                            </div>

                            <!--- Trolly ID Field --->
                            <div class="form-group">
                                {!! Form::label('trolley_id', trans('warehouse.trolleyid').':') !!}
                                {!! Form::text('trolley_id', null, ['class' => 'form-control']) !!}
                            </div>
                            
                            <!--- Des Field --->
                            <div class="form-group">
                                {!! Form::label('des', trans('warehouse.des').':') !!}
                                {!! Form::textarea('des', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Form::submit('إضافة', ['class' => 'form-control']) !!}
                            </div>
                            <div class="col-md-6">
                                <a href="{{url('cp/warehouse/')}}" class="form-control button">رجوع</a>
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