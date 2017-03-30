@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">إضافة قيد جديد</div>

                    <div class="panel-body ">
                        <div class="row">

                            @include('errors.status')
                            @include('errors.errors')
                            <div class="col-md-12 newsletter-form">

                                {!! Form::open(['url' => '/cp/students/finance/NewVoucher/add', 'method' => 'post', 'files' => true ,'class'=>'newsletter-form' ]) !!}

                                <div class="row">
                                    <div class="col-md-6">
                                        <!--- Full name  --->
                                        <div class="form-group">
                                            {!! Form::label('account_id_1','من رقم حساب:') !!}
                                            <select name="account_id_1" id="account_id_1" class="form-control selectpicker" data-live-search="true" required>
                                                <option value="" selected>اختر حساب</option>
                                                    @foreach ($account as $acnt)
                                                        <option value="{{$acnt->account_no}}">
                                                                {{$acnt->account_no}} - {{$acnt->account_name}}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <!--- Full name  --->
                                        <div class="form-group">
                                            {!! Form::label('account_id_2','إلى رقم حساب:') !!}
                                            <select name="account_id_2" id="account_id_2" class="form-control selectpicker" data-live-search="true" required>
                                                <option value="" selected>اختر حساب</option>
                                                @foreach ($account as $acnt)
                                                    <option value="{{$acnt->account_no}}">
                                                        {{$acnt->account_no}} - {{$acnt->account_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    {{--<div class="col-md-6">
                                        <!--- SID  --->
                                        <div class="form-group">
                                            {!! Form::label('voucher_id',' رقم القيد:') !!}
                                            {!! Form::text('voucher_id', null, ['class' => 'form-control', 'required']) !!}
                                        </div>
                                    </div>--}}

                                    {{--<div class="col-md-6">

                                        <!--- Gender  --->
                                        <div class="form-group">
                                            {!! Form::label('time', '  الوقت والتاريخ:') !!}
                                            {!! Form::date('time', null, ['class' => 'form-control', 'required']) !!}
                                        </div>
                                    </div>--}}

                                    <div class="col-md-6">
                                        <!--- NID  --->
                                        <div class="form-group">
                                            {!! Form::label('amount', ' المبلغ:') !!}
                                            {!! Form::number('amount', null, ['class' => 'form-control', 'min'=>'0.001', 'step'=>'0.001', 'required']) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <!--- Select Field --->
                                        <div class="form-group">
                                            {!! Form::hidden('user_id', $systemUserID) !!}
                                            {!! Form::label('user_name', 'معرف المستخدم:') !!}
                                            {!! Form::text('user_name', $systemUserName ,['class' => 'form-control', 'required', 'readonly']) !!}
                                        </div>
                                    </div>

                                </div>
                                <div class="row">


                                    {{--<div class="col-md-6">
                                        <!--- NID  --->
                                        <div class="form-group">
                                            {!! Form::label('credit', ' المدين :') !!}
                                            {!! Form::text('credit', null, ['class' => 'form-control', 'required']) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <!--- Select Field --->
                                        <div class="form-group">
                                            {!! Form::label('debit', 'الدائن:') !!}
                                            {!! Form::text('debit',null ,['class' => 'form-control', 'required']) !!}
                                        </div>
                                    </div>--}}



                                </div>

                                <div class="row">

                                </div>

                                <div class="row">

                                    <div class="col-md-6">
                                        <!--- Select Field --->
                                        <div class="form-group">
                                            {!! Form::label('description', 'التفاصيل:') !!}
                                            {!! Form::textarea('description',null ,['class' => 'form-control', 'required']) !!}
                                        </div>
                                    </div>



                                </div>

                                <br>
                                <br>
                                {!! Form::submit('تنفيذ', ['class' => ' col-md-3', 'onclick'=>'return foo();'] ) !!}

                                <a href="{{url('cp/students/finance/voucher')}}" class=" button col-md-3 ">إلغاء</a>
                                {!! Form::close() !!}
                            </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function foo()
        {
            //alert("Submit button clicked! ");
            //document.getElementById('form-id').action = "approve/reject/"+recipient+"/"+document.getElementById('reason').value;
            var account_id_1 = $("#account_id_1").val();
            var account_id_2 = $("#account_id_2").val();
            if(account_id_1 == account_id_2) {
                // is not a and is not b
                alert("يجب أن ");
                return false;
            }
            return true;
        }
    </script>

    @endsection