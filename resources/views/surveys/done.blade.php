@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('surveys.applicants')}}</div>

                    <div class="panel-body ">
                        <div class="row">

                            @include('errors.errors')

                            <div class="col-md-12">
                                <h4>نشكر لك مشاركتك في الإستطلاع و نتمنى لك التوفيق و السداد</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection