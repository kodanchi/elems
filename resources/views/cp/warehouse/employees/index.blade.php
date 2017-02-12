@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-11 col-md-offset-1">
                @include('errors.errors')
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('warehouse.emp_title')}}  | عدد النتائج: {{$users->count()}}</div>


                    <div class="panel-body ">

                        @include('cp.warehouse.employees.search')

                        <div class="col col-md-9">
                            <table class="table table-stripped table-hover">
                                <thead class="">
                                <th class="text-center">{{trans('warehouse.email')}}</th>
                                <th class="text-center">{{trans('warehouse.name')}}</th>
                                <th class="text-center">{{trans('warehouse.phone')}}</th>
                                <th class="text-center">{{trans('warehouse.edit')}}</th>
                                <th class="text-center">{{trans('warehouse.view')}}</th>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr class="text-center">
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->phone}}</td>
                                        <td><a href="{{url('cp/warehouse/employees/edit/'.$user->id)}}">
                                                <span class="glyphicon glyphicon-circle-arrow-right"></span>
                                            </a></td>
                                        <td><a href="{{url('cp/warehouse/employees/view/'.$user->id)}}">
                                                <span class="glyphicon glyphicon-circle-arrow-right"></span>
                                            </a></td>
                                    </tr>
                                @endforeach
                                @if($users->isEmpty())
                                    <tr class="text-center">
                                        <td colspan="5">{{trans('warehouse.noRes')}}</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            <div>{{$users->links()}}</div>



                        </div>




                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection