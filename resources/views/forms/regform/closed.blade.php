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
                                    <h4>إنتهت فترة التقديم على مراقبة إختبارات التعلم عن بعد.</h4>
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