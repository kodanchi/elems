@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-11 col-md-offset-1">
                @include('errors.errors')
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('regform.applicants')}}</div>


                    <div class="panel-body ">

                        @include('forms.regform.search')

                        <div class="col col-md-9">
                            <table class="table table-stripped table-hover">
                                <thead class="">
                                <th class="text-center">{{trans('regform.name')}}</th>
                                <th class="text-center">{{trans('regform.NID')}}</th>
                                <th class="text-center">{{trans('regform.department')}}</th>
                                <th class="text-center">{{trans('regform.view')}}</th>
                                </thead>
                                <tbody>
                                @foreach($forms as $form)
                                    <tr class="text-center">
                                        <td>{{$form->fname." ".$form->faname." ".$form->lname}}</td>
                                        <td>{{$form->NID}}</td>
                                        <td>{{$form->department}}</td>
                                        <td><a href="{{LaravelLocalization::getLocalizedURL(null,'cp/form/emr/'.$form->id.'/view')}}">
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
                        </div>




                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection