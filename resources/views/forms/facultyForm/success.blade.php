@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-11 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"></div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col col-md-12">
                                <div>
                                    <h4>تم تسجيلك في النظام و استقبال طلبك بنجاح، طلبك هذا لا يعني ترشيحك للمشاركة. سنقوم بمراجعة طلبك و الرد عليك في حال تم ترشيحك. </h4>
                                </div>

                                @include('emails.helpContacts')
                            </div>

                        </div>

                        <br/>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection