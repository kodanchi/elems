@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-12">
                @include('errors.status')

                <div class="panel panel-default">
                    <div class="panel-heading">بيانات الضمان  </div>

                    <div class="panel-body newsletter-form">
                        <div class="row">

                            <div class="col-md-12 newsletter-form">
                                <h4>اسم الضمان:  {{$asset->warranty_name}}</h4>

                                <hr>

                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>العنوان:  {{$asset->location}} </h5>
                                    </div>

                                    <div class="col-md-6">
                                        <h5>اسم المندوب:   {{$asset->contact_name}} </h5>
                                    </div>

                                    <div class="col-md-6">
                                        <h5>رقم جوال المندوب:   {{$asset->contact_phone}} </h5>
                                    </div>

                                    <div class="col-md-6">
                                        <h5>ايميل المندوب:   {{$asset->contact_email}} </h5>
                                    </div>

                                    <div class="col-md-6">
                                        <h5>ايميل الشركة:   {{$asset->company_email}} </h5>
                                    </div>



                                </div>

                                <hr>

                            </div>
                            <div class="col-md-6">

                                <div class="col-md-6">

                                    {!! Form::open(['url' => url('cp/warehouse/warranty/edit/'.$asset->id), 'method' => 'get', 'id' => 'editForm']) !!}
                                    	{!! Form::submit('تعديل', ['class' => 'form-control']) !!}
                                    {!! Form::close() !!}
                                </div>

                                <div class="col-md-6">
                                    <a href="{{url('cp/warehouse/warranty')}}" class="button form-control">{{trans('warehouse.back')}}</a>
                                </div>
                                <script type="text/javascript" src="/js/jquery-2.0.0.min.js"></script>
                                <script >



                                    $('#editForm').submit( function(e) {
                                        e.preventDefault();
                                        var currentForm = this;
                                        bootbox.confirm({
                                            size: "small",
                                            message: "هل أنت متأكد من التعديل؟",
                                            buttons: {

                                                cancel: {
                                                    label: 'إلغاء',
                                                    className: 'btn-danger'
                                                },
                                                confirm: {
                                                    label: 'نعم',
                                                    className: 'btn-success'
                                                }
                                            },
                                            callback: function (result) {
                                                if(result){
                                                    currentForm.submit();
                                                }
                                            }
                                        });

                                    });

                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection

