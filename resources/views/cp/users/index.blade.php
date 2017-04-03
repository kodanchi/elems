@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-12">

                @include('errors.status')

                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('cp.users')}}</div>

                    <div class="panel-body ">
                        <table class="table table-stripped table-hover">
                            <thead class="">
                                <th class="text-center">{{trans('cp.name')}}</th>
                                <th class="text-center">{{trans('cp.role')}}</th>
                                <th class="text-center">{{trans('cp.email')}}</th>
                                <th class="text-center">{{trans('cp.edit')}}</th>
                                <th class="text-center">{{trans('cp.delete')}}</th>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr class="text-center">
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->role}}</td>
                                        <td>{{$user->email}}</td>
                                        <td><a href="{{LaravelLocalization::getLocalizedURL(null,'cp/users/'.$user->id.'/edit')}}">
                                                <span class="glyphicon glyphicon-pencil"></span>
                                            </a></td>
                                        <td><a href="{{LaravelLocalization::getLocalizedURL(null,'cp/users/'.$user->id.'/delete')}}">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>

                {{$users->links()}}
            </div>
        </div>
    </div>

    @endsection