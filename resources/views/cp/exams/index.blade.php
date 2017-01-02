@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            @include('errors.errors')
            <div class="col col-md-3">
                <a class="btn btn-default" href="{{url('cp/exams/new')}}">{{trans('exams.new')}}</a>
            </div>
            <div class="col-md-11 col-md-offset-1">

                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('exams.schedule')}}</div>



                    <div class="panel-body ">




                        <div class="col col-md-12">
                            <table class="table table-stripped table-hover">
                                <thead class="">
                                <th class="text-center">ID</th>
                                <th class="text-center">{{trans('exams.major')}}</th>
                                <th class="text-center">{{trans('exams.course')}}</th>
                                <th class="text-center">{{trans('exams.lvl')}}</th>
                                <th class="text-center">{{trans('exams.term')}}</th>
                                <th class="text-center">{{trans('exams.date')}}</th>
                                </thead>
                                <tbody>
                                @foreach($forms as $form)
                                    @foreach($form as $date)
                                        <tr class="text-center">
                                            <td>{{$date->id}}</td>
                                            <td>{{$date->major}}</td>
                                            <td>{{$date->des}}</td>
                                            <td>{{$date->lvl}}</td>
                                            <td>{{$date->term}}</td>
                                            <td>{{$date->date}}</td>
                                            <td><a href="{{url('cp/exams/delete/'.$date->id)}}">Delete</a></td>
                                        </tr>
                                    @endforeach
                                @endforeach
                                @if(empty($forms))
                                    <tr class="text-center">
                                        <td colspan="10">{{trans('cp.noRes')}}</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>




                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection