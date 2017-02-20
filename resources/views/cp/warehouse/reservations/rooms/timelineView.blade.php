@extends('layouts.app')

@section('content')

    <script src="http://cdn.alloyui.com/3.0.1/aui/aui-min.js"></script>
    <link href="http://cdn.alloyui.com/3.0.1/aui-css/css/bootstrap.min.css" rel="stylesheet"></link>

    <div class="container ">
        <div class="row ">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"></div>

                    <div class="panel-body newsletter-form">
                        <div class="row">

                            @include('errors.status')
                            @include('errors.errors')

                            <div class="col-md-12 newsletter-form">
                                <div id="wrapper">
                                    <div id="myScheduler"></div>
                                </div>
                            </div>
                            <div class="col-md-6 newsletter-form">

                                <div class="col-md-6">
                                    <a href="{{url('cp/warehouse/rooms')}}" class="button form-control">{{trans('warehouse.back')}}</a>
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
                                content: '{{$event->purpose}}',
                                disabled: true,
                                endDate: new Date({{date('Y, m, d, H,i',strtotime($event->end_date))}}),
                                startDate: new Date({{date('Y, m, d, H,i',strtotime($event->start_date))}})
                            },
                        @endforeach
                    ];

                    var weekView = new Y.SchedulerWeekView();

                    new Y.Scheduler(
                            {
                                boundingBox: '#myScheduler',
                                date: new Date({{date('Y, m, d, H,i')}}),
                                items: events,
                                render: true,
                                views: [weekView]
                            }
                    );
                }
        );
    </script>
    @endsection