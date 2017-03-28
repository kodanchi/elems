@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            @include('errors.errors')



            <div class="col-md-6 col-md-offset-3">

                <div class="panel panel-default">
                    <div class="panel-heading">تحديث بيانات الطالب / الطالبة</div>

                    <div class="panel-body ">
                        <div class="row">
                            <p><a href="{{url('/cp/students/Info/export')}}" class="btn btn-default form-control button">تصدير الروابط </a></p>
                            <div class="col-md-12">

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection