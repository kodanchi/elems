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

                    <div class="panel-heading">تصدير كشوفات الطلاب</div>

                    <div class="panel-body ">




                        <p><a href="{{url('/cp/printforms/dates')}}" class="btn btn-primary form-control button">PDF</a></p>
                        <p><a href="{{url('/cp/printforms/excel/dates')}}" class="btn btn-primary form-control button">EXCEL</a></p>



                    </div>
                </div>
            </div>
        </div>
</div>
    @endsection