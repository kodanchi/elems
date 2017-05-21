@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            @include('errors.errors')


            <div class="col-md-6 col-md-offset-3">



                <div class="panel panel-default">
                    <div class="panel-heading">إستعلام عن جدول المراقب</div>

                    <div class="panel-body ">
                        <div class="row">


                            <div class="col-md-12">
                            {!! Form::open(['url' => '/cp/exams/testers/view', 'method' => 'post']) !!}
                            <!--- SID Field --->
                                <div class="form-group">
                                    {!! Form::label('NID', 'الهوية الوطنية/ الإقامة:') !!}
                                    {!! Form::text('NID', null, ['class' => 'form-control']) !!}
                                </div>
                                <!--- NID Field --->

                                {!! Form::submit('استعراض', ['class' => 'form-control' ]) !!}
                              {{--  <a href="/cp/exams/services/home" class="button col-md-3">{{trans('settings.back')}}</a>--}}
                                {!! Form::close() !!}
                                <button id="btnBack" name="btnBack"  class="btn btn-block btn-default col-md-3" onclick="location.href='{{url('/cp/exams/services/home')}}';">رجوع</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection