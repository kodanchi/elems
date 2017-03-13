@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-11 col-md-offset-1">
                @include('errors.errors')
                <div class="panel panel-default">

<h5>X</h5>

                    <h5>أرفع الملف سيم سيم ترتيب</h5>
                    {!! Form::open(['url' => '/cp/students/finance/import/up', 'method' => 'post', 'files' => true ,'class'=>'newsletter-form' ]) !!}

                    <div class="form-group">
                        {!! Form::label('import_file') !!}
                        {!! Form::file('import_file', ['class' => 'form-control','accept'=>'.xlsx']) !!}
                        <small>يرفق ملف Excel </small>
                        <small class="red">الحجم المسموح: 4MB أو أقل</small>
                    </div>

                    {!! Form::submit('أرفع', ['class' => ' col-md-3']) !!}


                </div>
            </div>
        </div>
    </div>

    @endsection