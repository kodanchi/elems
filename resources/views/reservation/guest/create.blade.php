@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-7 col-md-offset-3">
                @include('errors.errors')
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('warehouse.newGuest')}} </div>


                    <div class="panel-body newsletter-form ">

                        {!! Form::open(['url' => url('/reservation/guest/'), 'method' => 'post']) !!}






                            <div class="col-md-12">
                                <!--- NID Field --->
                                <div class="form-group">
                                    {!! Form::label('NID', trans('warehouse.NID').':') !!}
                                    {!! Form::number('NID', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <!--- Email Field --->
                                <div class="form-group">
                                    {!! Form::label('email', trans('warehouse.email').':') !!}
                                    {!! Form::email('email', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>


                            <div class="col-md-12">
                                <!--- Name Field --->
                                <div class="form-group">
                                    {!! Form::label('name',  trans('warehouse.name').':') !!}
                                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>


                            <div class="col-md-6">
                                <!--- Phone Field --->
                                <div class="form-group">
                                    {!! Form::label('phone',trans('warehouse.phoneOrCell').':') !!}
                                    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!--- Phone Ext Field --->
                                <div class="form-group">
                                    {!! Form::label('phone_ext', trans('warehouse.phone_ext').':') !!}
                                    {!! Form::text('phone_ext', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>


                            <div class="col-md-6">

                                <!--- Gender Field --->
                                <div class="form-group">
                                    {!! Form::label('gender', trans('warehouse.gender').':') !!}
                                    {!! Form::select('gender', trans('gender'), null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-6">

                                <!--- occupation Field --->
                                <div class="form-group">
                                    {!! Form::label('occupation', trans('warehouse.occupation').':') !!}
                                    {!! Form::text('occupation', null, ['class' => 'form-control']) !!}
                                </div>

                            </div>



                        <div class="col-md-12">
                            <label>
                                {!! Form::checkbox('agree', '1', null,  ['id' => 'agree']) !!}
                                أوفق على الإدلاء بالمعلومات الصحيحة وأتحمل كامل المسؤولية في حال كانت المعلومات غير صحيحة
                            </label>

                        </div>

                            <div class="col-md-6">
                                {!! Form::submit('التالي', ['class' => 'form-control']) !!}
                            </div>
                            <div class="col-md-6">
                                <a href="{{url('reservation/new/')}}" class="form-control button">رجوع</a>
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