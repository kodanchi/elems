@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            @include('errors.errors')
            @include('errors.status')


            <div class="col-md-6 col-md-offset-3">

                <div class="panel panel-default">
                    <div class="panel-heading">تحديث بيانات الطالب / الطالبة</div>

                    <div class="panel-body ">
                        <div class="row">

                            <div class="col-md-12">
                            {!! Form::open(['url' => '/students/Info/update/', 'method' => 'post']) !!}
                            <!--- SID Field --->
                                <div class="form-group">
                                    {!! Form::label('SID', 'الرقم الأكاديمي:') !!}
                                    {!! Form::text('SID', null, ['class' => 'form-control']) !!}
                                </div>
                                <!--- NID Field --->
                                <div class="form-group">
                                    {!! Form::label('NID', 'رقم الهوية/الإقامة:') !!}
                                    {!! Form::text('NID', null, ['class' => 'form-control']) !!}
                                </div>
                                {!! Form::submit('التالي', ['class' => 'form-control']) !!}
                                {!! Form::close() !!}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection