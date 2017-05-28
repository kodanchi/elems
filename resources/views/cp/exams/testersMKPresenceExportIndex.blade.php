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

                    <div class="panel-heading"> تصدير أسماء المراقبين المحضرين من قبل لجنة التصحيح</div>

                    <div class="panel-body ">



                        {!! Form::open(['url' => 'cp/exams/testersMKPresenceExport/export', 'method' => 'post', 'files' => true ,'class'=>'newsletter-form' ]) !!}


                        {!! Form::label('date_l', 'اختر التاريخ:') !!}
                        <select name="date" class="form-control selectpicker" id="date" style="width:350px" data-live-search="true" required>
                            <option value="" style="direction: ltr">اختر التاريخ</option>
                            <?php
                            for ($x = 0; $x < sizeof($dates); $x++) {
                            ?>
                            <option value="{{ $dates[$x]->date }}">{{ $dates[$x]->date}} ({{ $dates[$x]->higri_date}})</option>
                            <?php
                            }
                            ?>
                        </select>


                        <br>
                        <br>
                        <br>
                        <br>

                        {!! Form::submit(trans('استعراض'), ['class' => ' col-md-3', 'onclick' => 'myFunction()']) !!}
                  {{--      <a href="/cp/exams/services/home" class="button btn-default">{{trans('settings.back')}}</a>--}}
                        {!! Form::close() !!}
                            <button id="btnBack" name="btnBack" style="height: 42px" class="btn btn-default col-md-3" onclick="location.href='{{url('/cp/exams/services/home')}}';">رجوع</button>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection