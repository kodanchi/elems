@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-6 col-md-offset-3">
            @include('errors.errors')
            @include('errors.status')


                <div class="panel panel-default">
                    <div class="panel-heading">إثبات حضور للاختبارت النهائية</div>

                    <div class="panel-body ">
                        <div class="row">

                            {!! Form::open(['url' => '/cp/examapprove/view', 'method' => 'post']) !!}
                            <!--- SID Field --->
                                <div class="form-group">
                                    {!! Form::label('sid', 'الرقم الأكاديمي:') !!}
                                    {!! Form::text('sid', null, ['class' => 'form-control']) !!}
                                </div>
                                <!--- NID Field --->
                                <div class="form-group">
                                    {!! Form::label('nid', 'رقم الهوية/الإقامة:') !!}
                                    {!! Form::text('nid', null, ['class' => 'form-control']) !!}
                                </div>

                                {!! Form::submit('اصدار اثبات حضور', ['class' => 'col-md-3']) !!}
                                {{--<a href="/cp/exams/services/home" class="button btn-default">رجوع</a>--}}

                                {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection