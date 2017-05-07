@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-12">
                @include('errors.errors')
                @include('errors.status')
                <div class="panel panel-default">

                    <div class="panel-heading">{{trans('الطلبات')}}  | عدد النتائج: {{$totalResult->count()}}</div>

                    <div class="panel-body ">

                        @include('cp.students.Info.search')

                        <div class="col col-md-10">

                            <table class="table table-stripped table-hover">
                                <thead class="">
                                <th class="text-center">{{trans('sp.sid')}}</th>
                                <th class="text-center">{{trans('sp.nid')}}</th>
                                <th class="text-center">{{trans('sp.con_status')}}</th>
                                @if(Auth::User()->getRole() == 'admin' )
                                    <th class="text-center">عيّنت ل</th>
                                @else
                                    <th></th>

                                @endif
                                <th class="text-center">{{trans('sp.view')}}</th>


                                </thead>
                                <tbody>
                         @foreach($forms as $form)
                                    <tr >
                                        <td class="text-center">{{$form->SID}}</td>
                                        <td class="text-center"> {{$form->NID}}</td>
                                        <td class="text-center">{{trans('StdInfoStatus.'.$form->status)}}</td>
                                        @if(Auth::User()->getRole() == 'admin' )
                                            <td class="text-center">{{$form->username}}</td>
                                        @else
                                            <td></td>

                                        @endforelse
                                        <td class="text-center"><a href="{{url('cp/students/Info/view/'.$form->id)}}">
                                                <span class="glyphicon glyphicon-circle-arrow-right"></span>
                                            </a></td>
                                <tr>

                                @endforeach
                                </tbody>
                                        </table>

                                        <div>{{$forms->links()}}</div>


                        </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection