@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-11 col-md-offset-1">
                @include('errors.errors')
                @include('errors.status')
                <div class="panel panel-default">
{{--
                    <div class="panel-heading">{{trans('cp.surv_title')}} | عدد النتائج: {{$forms->count()}}</div>
--}}
                    <div class="panel-heading">{{trans('cp.surv_title')}} | عدد النتائج: {{$totalResult->count()}}</div>


                    <div class="panel-body ">


                        @include('cp.surveys.search')


                        <div class="col col-md-9">
                            <table class="table table-stripped table-hover">
                                <thead class="">
                                <th class="text-center">{{trans('surveys.SID')}}</th>
                                <th class="text-center">{{trans('surveys.QID')}}</th>
                                <th class="text-center">{{trans('surveys.answer')}}</th>
                                <th class="text-center">{{trans('surveys.createAt')}}</th>
                                </thead>
                                <tbody>
                                @foreach($forms as $form)
                                    <tr class="text-center">
                                        <td>{{$form->sid}}</td>
                                        <td>{{$form->Question_id}}</td>
                                        <td>{{$form->Answer}}</td>
                                        <td>{{$form->created_at}}</td>

                                    </tr>
                                @endforeach
                                @if($forms->isEmpty())
                                    <tr class="text-center">
                                        <td colspan="4">{{trans('cp.noRes')}}</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                            {{$forms->links()}}
                        </div>




                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection