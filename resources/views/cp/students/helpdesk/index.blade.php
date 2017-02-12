@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-11 col-md-offset-1">
                @include('errors.errors')
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('الطلبات')}}  | عدد النتائج: {{$forms->count()}}</div>


                    <div class="panel-body ">

                        @include('cp.students.helpdesk.search')

                        <div class="col col-md-9">
                            <table class="table table-stripped table-hover">
                                <thead class="">
                                <th class="text-center">{{trans('sp.fid')}}</th>
                                <th class="text-center">{{trans('sp.sid')}}</th>
                                <th class="text-center">{{trans('الطلب')}}</th>
                                <th class="text-center">{{trans('sp.con_status')}}</th>
                                <th class="text-center">{{trans('sp.view')}}</th>
                                </thead>
                                <tbody>
                                @foreach($forms as $form)
                                    <tr class="text-center">
                                        <td>{{$form->fid}}</td>
                                        <td>{{$form->sid}}</td>
                                        <td>{{trans('serviceType.'.$form->serviceType)}}</td>
                                        <td>{{trans('status.'.$form->status)}}</td>
                                        <td><a href="{{url('cp/students/helpdesk/view/'.$form->id)}}">
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