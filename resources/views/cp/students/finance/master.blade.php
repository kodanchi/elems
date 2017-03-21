@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-11 col-md-offset-1">
                @include('errors.errors')
                <div class="panel panel-default">
                    <div class="panel-heading"> قيد </div>

                    <div class="panel-body ">

                        <div class="col col-md-12">

                            @if($forms)
                            <table class="table table-stripped table-hover">
                                <thead class="">
                                <th class="text-center">الرقم التسلسلي</th>
                                <th class="text-center">رقم الحساب</th>
                                {{--<th class="text-center">اسم الحساب</th>--}}
                                <th class="text-center">رقم القيد</th>
                                <th class="text-center">المدين</th>
                                <th class="text-center">الدائن</th>
                                <th class="text-center">الوقت والتاريخ</th>
                                <th class="text-center">معرف المستخدم</th>
                                <th class="text-center">التفاصيل</th>
                                </thead>
                                <tbody>

                                @foreach($forms as $form)
                                    <tr class="text-center">
                                        <td>{{$form->sequence}}</td>
                                        <td>{{$form->account_id}}</td>
                                        {{--<td>{{$form->account_name}}</td>--}}
                                        <td>{{$form->voucher_id}}</td>
                                        <td>{{$form->credit}}</td>
                                        <td>{{$form->debit}}</td>
                                        <td>{{$form->time}}</td>
                                        <td>{{str_replace(substr($form->time, 19, 4), '', $form->time)}}</td>
                                        <td>{{$form->user_id}}</td>
                                        <td>{{$form->description}}</td>
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

                        <p><a href="{{url('/cp/students/finance/NewVoucher')}}" class="btn btn-info form-control button">إضافة قيد جديد</a></p>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection