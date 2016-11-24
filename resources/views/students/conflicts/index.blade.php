@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('students.applicants')}}</div>

                    <div class="panel-body ">
                        <div class="row">

                            @include('errors.errors')
                            <div class="col-md-6">
                                {!! Form::open(['url' => '/students/conflict/view', 'method' => 'post']) !!}
                                	<!--- SID Field --->
                                	<div class="form-group">
                                	    {!! Form::label('sid', 'الرقم الأكاديمي:') !!}
                                	    {!! Form::text('sid', null, ['class' => 'form-control']) !!}
                                	</div>
                                    <!--- FID Field --->
                                    <div class="form-group">
                                        {!! Form::label('id', 'رمز الطلب:') !!}
                                        {!! Form::text('id', null, ['class' => 'form-control']) !!}
                                    </div>
                                    {!! Form::submit('تحقق', ['class' => 'form-control']) !!}
                                {!! Form::close() !!}
                            </div>
                            <div class="col-md-6">

                                {!! Form::open(['url' => '/students/conflict/agree', 'method' => 'get']) !!}
                                <label>
                                    {!! Form::checkbox('agree', '1', null,  ['id' => 'agree']) !!}
                                    أوفق على الإدلاء بالمعلومات الصحيحة وأتحمل كامل المسؤولية في حال كانت المعلومات غير صحيحة
                                </label>
                                </br>
                                {!! Form::submit('تقدم', ['class' => ' col-md-6 col-md-offset-3']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection