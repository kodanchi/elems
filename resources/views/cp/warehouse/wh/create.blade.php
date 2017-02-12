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
                            <!--- Other Type Field --->
                            <div id="div_other_type" class="form-group">
                                <!--- Other Type Field --->
                                <div class="form-group">
                                    {!! Form::label('other_type', trans('warehouse.specify').':') !!}
                                    {!! Form::text('other_type', null, ['class' => 'form-control']) !!}
                                </div>
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
                                {!! Form::select('warranty', $assetWarranty , null , ['class' => 'form-control']) !!}


                            </div>

                           <div class="row">


                               <div id="div_other_warranty" class="form-group">
                                   <!--- Other warranty Field --->

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
                                   <div class="col-md-6">
                                       <!--- Company Email Field --->
                                       <div class="form-group">
                                           {!! Form::label('company_email', 'ايميل الشركة:') !!}
                                           {!! Form::email('company_email', null,  ['class' => 'form-control'] ) !!}
                                       </div>
                                   </div>

                                   <div class="col-md-6">
                                       <!--- Company Email Field --->

                                   </div>

                               </div>
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
                                <a href="{{url('cp/warehouse/list')}}" class="form-control button">رجوع</a>
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
                if($('#other_warranty').val() === 'other') $('#other_warranty').val('');
                $('#div_other_warranty').show();
                $('#other_warranty').focus();
            }else {
                $('#other_warranty').val('other');
                $('#div_other_warranty').hide();
            }
        }

        $(document).ready(function () {

            brandsOther();
            typeOther();
            warrantyOther();
        });
    </script>

    @endsection