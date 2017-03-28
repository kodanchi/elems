@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('warehouse.asset')}}  </div>

                    <div class="panel-body newsletter-form">
                        <div class="row">

                            @include('errors.status')
                            <div class="col-md-12 newsletter-form">
                                <h4>{{trans('warehouse.dlcode')}}:  {{$asset->DL_code}}</h4>

                                <hr>

                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>{{trans('warehouse.sn')}}:  {{$asset->SN}} </h5>
                                    </div>

                                    <div class="col-md-6">
                                        <h5>{{trans('warehouse.type')}}:   {{$asset->type}} </h5>
                                    </div>

                                    <div class="col-md-6">
                                        <h5>{{trans('warehouse.brand')}}:   {{$asset->brand}} </h5>
                                    </div>


                                    <div class="col-md-6">
                                        <h5>{{trans('warehouse.status')}}:  {{trans('warehouse.assetStatus.'.$asset->status)}}</h5>
                                    </div>


                                    <div class="col-md-6">
                                        <h5>{{trans('warehouse.warranty')}}:
                                            <?php if ($warranty){ ?>
                                            {{$warranty->warranty_name}}
                                            <?php }
                                            else {?>
                                            لا يوجد
                                            <?php }?>
                                        </h5>
                                    </div>


                                    <div class="col-md-6">
                                        <h5>{{trans('warehouse.expdate')}}:
                                            <?php if ($asset->exp_date){ ?>
                                            {{$asset->exp_date}}
                                            <?php }
                                            else {?>
                                            لا يوجد
                                            <?php }?>
                                        </h5>
                                    </div>


                                    @if($asset->trolley_id != '')
                                    <div class="col-md-6">
                                        <h5>{{trans('warehouse.trolleyid')}}:   {{$asset->trolley_id}} </h5>
                                    </div>
                                    @endif

                                    @if($asset->des != '')
                                    <div class="col-md-12">
                                        <h5>{{trans('warehouse.des')}}: {{$asset->des}} </h5>
                                    </div>
                                    @endif

                                </div>

                                <hr>

                            </div>
                            <div class="col-md-6">

                                <div class="col-md-6">

                                    {!! Form::open(['url' => url('cp/warehouse/edit/'.$asset->id), 'method' => 'get', 'id' => 'editForm']) !!}
                                    	{!! Form::submit('تعديل', ['class' => 'form-control']) !!}
                                    {!! Form::close() !!}
                                </div>

                                <div class="col-md-6">
                                    <a href="{{url('cp/warehouse/list')}}" class="button form-control">{{trans('warehouse.back')}}</a>
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

