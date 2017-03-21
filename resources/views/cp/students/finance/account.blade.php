@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-11 col-md-offset-1">
                @include('errors.errors')
                @include('errors.status')
                <div class="panel panel-default">
                    <div class="panel-heading"> حساب </div>

                    <div class="panel-body ">

                        <div class="col col-md-12">

                            @if($forms)
                            <table class="table table-stripped table-hover">
                                <thead class="">
                                <th class="text-center">رقم الحساب</th>
                                <th class="text-center">اسم الحساب</th>
                                <th class="text-center">نوع الحساب</th>
                                <th class="text-center">تاريخ إنشاء الحساب</th>
                                </thead>
                                <tbody>

                                @foreach($forms as $form)
                                    <tr class="text-center">
                                        <td>{{$form->account_no}}</td>
                                        <td>{{$form->account_name}}</td>
                                        <td>{{$form->account_type}}</td>
                                        <td>{{str_replace(substr($form->created_at, 19, 4), '', $form->created_at)}}</td>
                                    </tr>

                                @endforeach
                                @if(!$forms)
                                    <tr class="text-center">
                                        <td colspan="4">{{trans('cp.noRes')}}</td>
                                    </tr>
                                @endif

                                </tbody>
                            </table>

                            <div></div>

                                @endif
                        </div>


                        <div class="col col-md-2">

                        <p><a href="{{url('/cp/students/finance/account/add')}}" class="btn btn-info form-control button">إضافة حساب جديد</a></p>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection