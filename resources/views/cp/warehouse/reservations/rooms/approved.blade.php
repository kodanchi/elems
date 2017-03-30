@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-11 col-md-offset-1">
                @include('errors.errors')
                @include('errors.status')
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('warehouse.rooms')}}  | عدد النتائج: {{sizeof($events)}}</div>


                    <div class="panel-body ">



                        <div class="col col-md-12">
                            <table class="table table-stripped table-hover">
                                <thead class="">
                                <th class="text-center">اسم الشخص</th>
                                <th class="text-center">ايميل الشخص</th>
                                <th class="text-center">هاتف الشخص</th>
                                <th class="text-center">{{trans('warehouse.roomsName')}}</th>
                                <th class="text-center">السبب</th>
                                <th class="text-center">من</th>
                                <th class="text-center">إلى</th>
                                <th class="text-center">حذف</th>
                                </thead>
                                <tbody>
                                @foreach($events as $event)
                                    <tr class="text-center">
                                        <td>{{$event->guest_name}}</td>
                                        <td>{{$event->guest_email}}</td>
                                        <td>{{$event->phone}}</td>
                                        <td>{{$event->room_name}}</td>
                                        <td>{{$event->purpose}}</td>
                                        <td>{{str_replace(substr($event->start_date, 16, 7), '', $event->start_date)}}</td>
                                        <td>{{str_replace(substr($event->end_date, 16, 7), '', $event->end_date)}}</td>
                                        {{--<td>{{strlen($event->des) > 15 ? substr($event->des,0,15).'...':$event->des}}</td>--}}
                                        <td>
                                            {!! Form::open(['url' => url('cp/warehouse/reservation/approved/delete/'.$event->id), 'method' => 'get', 'id' => 'editForm']) !!}

                                            {{Form::button('<span class="glyphicon glyphicon-trash alert-danger"></span>', array('type' => 'submit', 'style' => 'background-color: white'))}}
                                            {!! Form::close() !!}

                                           {{-- <a href="{{url('cp/warehouse/reservation/approved/delete/'.$event->id)}}">
                                                <span class="glyphicon glyphicon-trash alert-danger"></span>
                                            </a>--}}
                                        </td>
                                    </tr>
                                @endforeach

                                @if(sizeof($event)==0)
                                    <tr class="text-center">
                                        <td colspan="5">{{trans('warehouse.noRes')}}</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            {{--<div>{{$event->links()}}</div>--}}



                        </div>

                        <div class="col-md-6 newsletter-form">

                            <div class="col-md-6">
                                <a href="{{url('cp/warehouse/reservations')}}" class="button form-control">{{trans('warehouse.back')}}</a>
                            </div>

                            <script type="text/javascript" src="/js/jquery-2.0.0.min.js"></script>
                            <script >

                                $('#editForm').submit( function(e) {
                                    e.preventDefault();
                                    var currentForm = this;
                                    bootbox.confirm({
                                        size: "small",
                                        message: "هل أنت متأكد من الحذف؟",
                                        buttons: {

                                            cancel: {
                                                label: 'تراجع',
                                                className: 'btn-default'
                                            },
                                            confirm: {
                                                label: 'نعم',
                                                className: 'btn-danger'
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



    @endsection