@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-11 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">المتقدمين</div>

                    <div class="panel-body">
                        <table class="table table-stripped table-hover">
                            <thead>
                                <th>Name</th>
                                <th>National/Eqama ID</th>
                                <th>Department</th>
                                <th>View</th>
                            </thead>
                            <tbody>
                                @foreach($forms as $form)
                                    <tr>
                                        <td>{{$form->fname." ".$form->faname." ".$form->lname}}</td>
                                        <td>{{$form->NID}}</td>
                                        <td>{{$form->department}}</td>
                                        <td><a href="{{url('form/'.$form->id)}}">
                                                <span class="glyphicon glyphicon-circle-arrow-right"></span>
                                            </a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection