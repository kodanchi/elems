@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-7 col-md-offset-3">
                @include('errors.errors')
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('warehouse.addNewLink')}} </div>


                    <div class="panel-body newsletter-form ">

                        {!! Form::open(['url' => url('cp/warehouse/employees/link'), 'method' => 'post']) !!}


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
                                {!! Form::submit('إضافة', ['class' => 'form-control']) !!}
                            </div>
                            <div class="col-md-6">
                                <a href="{{url('cp/warehouse/employees/view/'.$employee->id)}}" class="form-control button">رجوع</a>
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