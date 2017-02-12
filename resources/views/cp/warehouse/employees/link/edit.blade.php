@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-7 col-md-offset-3">
                @include('errors.errors')
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{trans('warehouse.editLink')}}
                        @if($empAsset->status == 1)
                            {!! Form::open(['url' => url('cp/warehouse/employees/link/delete/'.$empAsset->id), 'method' => 'get', 'id' => 'delForm', 'class'=>'pull-right']) !!}
                                <button class="btn btn-default btn-sm" title="حذف" type="submit"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
                            {!! Form::close() !!}

                            {{--@else
                            <a href="{{url('cp/warehouse/employees/link/delete/'.$empAsset->id)}}" title="إلغاء العهدة" class="pull-right">
                                <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
                            </a>--}}
                            @endif

                    </div>


                    <div class="panel-body newsletter-form ">

                        {!! Form::model($empAsset, ['url' => ['cp/warehouse/employees/link/update', $empAsset->id], 'method' => 'Patch']) !!}

                        <div class="col-md-12">
                            <p>{{trans('warehouse.name')." : ".$employee->name}}</p>
                            <p>{{trans('warehouse.email')." : ".$employee->email}}</p>
                        </div>
                        <div class="col-md-12">
                            <!--- Asset Field --->
                            <div class="form-group">
                                {!! Form::label('asset_id', trans('warehouse.asset').':') !!}
                                {!! Form::select('asset_id', $assets , null , ['class' => 'form-control selectpicker','data-live-search'=> 'true']) !!}
                            </div>
                        </div>

                        <div class="col-md-12">
                            <!--- Asset Link Type --->
                            <div class="form-group">
                                {!! Form::label('link_type', trans('warehouse.linkType').':') !!}
                                {!! Form::select('link_type', $linkTypes , null , ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <!--- note Field --->
                            <div class="form-group">
                                {!! Form::label('note', trans('warehouse.note').':') !!}
                                {!! Form::textarea('note', null, ['class' => 'form-control']) !!}
                            </div>

                        </div>

                        <div class="col-md-6">
                            {!! Form::hidden('employee_id', $employee->id, ['id' => 'id']) !!}

                            {!! Form::submit('تحديث', ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-md-6">
                            <a href="{{url('cp/warehouse/employees/view/'.$employee->id)}}" class="form-control button">رجوع</a>
                        </div>

                        {!! Form::close() !!}


                        </div>

                    <script type="text/javascript" src="/js/jquery-2.0.0.min.js"></script>
                    <script >



                        $('#delForm').submit( function(e) {
                            e.preventDefault();
                            var currentForm = this;
                            bootbox.confirm({
                                size: "small",
                                message: "هل أنت متأكد من إلغاء العهدة؟",
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

    @endsection