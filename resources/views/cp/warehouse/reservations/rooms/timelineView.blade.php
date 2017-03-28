@extends('layouts.app')

@section('content')

    <script src="http://cdn.alloyui.com/3.0.1/aui/aui-min.js"></script>
    <link href="http://cdn.alloyui.com/3.0.1/aui-css/css/bootstrap.min.css" rel="stylesheet">

    <div class="container ">
        <div class="row ">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"> جدول القاعات والحجوزات </div>

                    <div class="panel-body newsletter-form">
                        <div class="row">

                            @include('errors.status')
                            @include('errors.errors')

                            <div class="col-md-12 newsletter-form">
                                <div id="wrapper">
                                    <div id="myScheduler"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 newsletter-form">
                                <div class="col-md-4" style="float: right">
                                    <a href="{{url('cp/warehouse/reservation/approve')}}" class="btn-info form-control text-center" >الطلبات الجديدة</a>
                                </div>
                                <div class="col-md-4" style="float: right">
                                    <a href="{{url('cp/warehouse/reservation/approved')}}" class="btn-success form-control text-center" >الطلبات المقبولة</a>
                                </div>
                                <div class="col-md-4" style="float: left">
                                    <a href="{{url('cp/warehouse')}}" class="button form-control" >{{trans('warehouse.back')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        YUI().use(
                'aui-scheduler',
                function(Y) {
                    var events = [

                        @foreach($events as $event)
                            {
                                content: '{{$event->room_name}}' + '<br>' + '{{$event->guest_name}}' + '<br>' + '{{$event->purpose}}',
                                disabled: true,
                                endDate: new Date({{date('Y, m, d, H,i',strtotime("-1 month", strtotime($event->end_date)))}}),
                                startDate: new Date({{date('Y, m, d, H,i',strtotime("-1 month", strtotime($event->start_date)))}})
                            },
                        @endforeach
                    ];
/*window.alert(events[0].endDate + ' x ' + events[0].startDate);*/
                    var weekView = new Y.SchedulerWeekView();

                    new Y.Scheduler(
                            {
                                boundingBox: '#myScheduler',
                                items: events,
                                render: true,
                                views: [weekView]
                            }
                    );
                }
        );
    </script>
    @endsection