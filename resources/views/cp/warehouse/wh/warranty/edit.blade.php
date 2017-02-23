@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-7 col-md-offset-3">
                @include('errors.errors')
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('warehouse.editAsset')}} </div>


                    <div class="panel-body newsletter-form ">

                        {!! Form::model($asset, ['url' => ['cp/warehouse/warranty/update/', $asset->id], 'method' => 'post']) !!}


                        <div class="col-md-12">
                            <!--- Warranty Name Field --->
                            <div class="form-group">
                                {!! Form::label('warranty_name', 'اسم الوكيل:') !!}
                                {!! Form::text('warranty_name', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <!--- Location Field --->
                            <div class="form-group">
                                {!! Form::label('location', 'عنوان الوكيل:') !!}
                                {!! Form::text('location', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!--- Contact Name Field --->
                            <div class="form-group">
                                {!! Form::label('contact_name', 'اسم المندوب:') !!}
                                {!! Form::text('contact_name', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!--- Contact Phone Field --->
                            <div class="form-group">
                                {!! Form::label('contact_phone', 'رقم جوال المندوب:') !!}
                                {!! Form::number('contact_phone', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!--- Contact Email Field --->
                            <div class="form-group">
                                {!! Form::label('contact_email', 'ايميل المندوب') !!}
                                {!! Form::email('contact_email', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!--- Company Phone Field --->
                            <div class="form-group">
                                {!! Form::label('company_phone', 'رقم جوال الشركة:') !!}
                                {!! Form::number('company_phone', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <!--- Company Email Field --->
                            <div class="form-group">
                                {!! Form::label('company_email', 'ايميل الشركة:') !!}
                                {!! Form::email('company_email', null,  ['class' => 'form-control'] ) !!}
                            </div>
                        </div>

                        <div class="col-md-6">
                                {!! Form::submit('موافق', ['class' => 'form-control']) !!}
                            </div>
                            <div class="col-md-6">
                                <a href="{{url('cp/warehouse/warranty/view/'.$asset->id)}}" class="form-control button">رجوع</a>
                            </div>

                        {!! Form::close() !!}


                        </div>

                    <script type="application/javascript">
                        $('#brand').change(function () {
                            brandsOther();
                        });
                        $('#type').change(function () {
                            typeOther();
                        });
                        $('#warranty').change(function () {
                            warrantyOther();
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
                        function typeOther() {
                            if($('#type').val() === 'other'){
                                if($('#other_type').val() === 'other') $('#other_type').val('');
                                $('#div_other_type').show();
                                $('#other_type').focus();
                            }else {
                                $('#other_type').val('other');
                                $('#div_other_type').hide();
                            }
                        }
                        function warrantyOther() {
                            if($('#warranty').val() === 'other'){
                                $('#div_other_warranty').show();
                            }else {
                                $('#div_other_warranty').hide();
                            }
                        }

                        $(document).ready(function () {

                            brandsOther();
                            typeOther();
                            warrantyOther();
                        });
                    </script>


                    </div>
                </div>
            </div>
        </div>
    </div>



    @endsection