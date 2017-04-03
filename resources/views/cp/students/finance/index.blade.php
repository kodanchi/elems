@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-12 ">
                @include('errors.errors')
                @include('errors.status')
                <div class="panel panel-default">
                    <div class="panel-heading"> عدد النتائج | {{$forms->count()}}</div>


                    <div class="panel-body ">

                        @include('cp.students.finance.search')

                        <div class="col col-md-10">
                            <table class="table table-stripped table-hover">
                                <thead class="">
                                <th class="text-center">الرقم الأكاديمي</th>
                                <th class="text-center">الاسم</th>
                                <th class="text-center">الجنس</th>
                                <th class="text-center">الرصيد</th>
                                <th class="text-center">الخصم</th>
                                <th class="text-center">{{trans('sp.view')}}</th>
                                </thead>
                                <tbody>
                                @foreach($forms as $form)

                                    <tr class="text-center">
                                        <td>{{$form->student_id}}</td>
                                        <td>{{$form->name}}</td>
                                        <td>{{$form->gender}}</td>
                                        <td>{{$form->balance}}</td>
                                        @if($form->discount==0.5)
                                            <td>نصف المبلغ</td>
                                        @elseif($form->discount==0)
                                            <td>كامل المبلغ</td>
                                        @else
                                            <td>لا يوجد خصم</td>
                                        @endforelse
                                        <td><a href="{{url('cp/students/finance/edit/'.$form->student_id)}}">
                                                <span class="glyphicon glyphicon-circle-arrow-right"></span>
                                            </a></td>
                                    </tr>
                                @endforeach
                                @if($forms->isEmpty())
                                    <tr class="text-center">
                                        <td colspan="4">{{trans('cp.noRes')}}</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>

                            <div>{{$forms->links()}}</div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection