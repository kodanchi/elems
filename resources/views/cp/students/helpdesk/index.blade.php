@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-12">
                @include('errors.errors')
                @include('errors.status')
                <div class="panel panel-default">
{{--
                    <div class="panel-heading">{{trans('الطلبات')}}  | عدد النتائج: {{$forms->count()}}</div>
--}}
                    <div class="panel-heading">{{trans('الطلبات')}}  | عدد النتائج: {{$totalResult->count()}}</div>

                    <div class="panel-body ">

                        @include('cp.students.helpdesk.search')

                        <div class="col col-md-10">

                            <table class="table table-stripped table-hover">
                                <thead class="">
                                <th class="text-center">{{trans('sp.fid')}}</th>
                                <th class="text-center">{{trans('sp.sid')}}</th>
                                <th class="text-center">الإدارة</th>
                                <th class="text-center">{{trans('sp.con_status')}}</th>
                                @if(Auth::User()->getRole() == 'admin' )
                                    <th class="text-center">تمت المعالجة عن طريق</th>
                                    <th class="text-center">تم تعيين الطلب إلى</th>
                                    @else
                                    <th></th>
                                    <th></th>




                                @endif

                                <th class="text-center">{{trans('sp.view')}}</th>


                                </thead>
                                <tbody>
                                @foreach($forms as $form)
                                    <tr class="text-center {{$hlclass = $form->username == Auth::User()->name ? 'success' : ''}}">
                                        <td>{{$form->fid}}</td>
                                        <td>{{$form->sid}}</td>
                                        <td>{{trans('serviceType.'.$form->serviceType)}}</td>

                                        <td>{{trans('HdStatus.'.$form->status)}}</td>
                                        @if(Auth::User()->getRole() == 'admin' and $form->status == 'closed')
                                            <td>{{$form->username}}</td>
                                          @else
                                            <td></td>

                                        @endif

                                        @if(Auth::User()->getRole() == 'admin' and $form->status == 'pending')
                                            <td>{{$form->username}}</td>
                                        @else
                                            <td></td>

                                        @endif
                                        <td><a href="{{url('cp/students/helpdesk/view/'.$form->id)}}">
                                                <span class="glyphicon glyphicon-circle-arrow-right"></span>
                                            </a></td>
                                    </tr>
                                @endforeach
                                @if($forms->isEmpty())
                                    <tr class="text-center">
                                        <td colspan="7">{{trans('cp.noRes')}}</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                            {{--{!! str_replace('/?', '?', $forms->render()) !!}--}}
                            {{--<h2>{{dd($searchRequest)}}</h2>--}}
                           @if(isset($searchText))
                            <div>{{$forms->appends(['search' => $searchText])->links()}}</div>
                                @else
                                <div>{{$forms->links()}}</div>
                                @endforelse
                            {{--<div>{{$forms->links()}}</div>--}}
                        </div>




                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection