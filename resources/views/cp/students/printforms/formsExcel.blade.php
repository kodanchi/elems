@extends('layouts.app')

@section('content')


    {{--<div id="spinner" style="z-index: 500">
        <img id="img-spinner" src="{{asset('storage/spinner.gif')}}" alt="loading..." height="50 px" width="50 px">
    </div>--}}
    <div class="container ">
        <div class="row ">
            <div class="col-md-6 col-md-offset-3">
                @include('errors.errors')
                @include('errors.status')
                <div class="panel panel-default">

                    <div class="panel-heading">كشوفات الطلاب إكسل</div>

                    <div class="panel-body ">




                                   <?php
                                   for ($x = 0; $x < sizeof($filesExcel); $x++) {
                                   ?>
                                       <a href="{{url('cp/printforms/printExcel/'.$filesExcel[$x]->file_name)}}">
                                   <h4> كشف رقم {{$x+1}}</h4>
                                    </a>
                                   <?php
                                   }
                                   ?>
                        <br>
                                    <br>




                    </div>
                </div>
            </div>
        </div>
</div>
    @endsection