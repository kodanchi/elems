@extends('layouts.app')
<script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
<link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">
@section('content')

    <style>
        #spinner {
            position: fixed;
            top: 50%;
            left: 50%;
        }
    </style>

    {{--<div id="spinner" style="z-index: 500">
        <img id="img-spinner" src="{{asset('storage/spinner.gif')}}" alt="loading..." height="50 px" width="50 px">
    </div>--}}
    <div class="container ">
        <div class="row ">
            <div class="col-md-12">
                @include('errors.errors')
                @include('errors.status')
                <div class="panel panel-default">

                    <div class="panel-heading"> تصدير كشوفات إحصائيات المراكز</div>

                    <div class="panel-body ">



                        <div>
            {!! Form::open(['url' => '/cp/printforms/statisticsForm', 'method' => 'post', 'files' => true ,'class'=>'newsletter-form' ]) !!}


                            <div class="row">
                                <div class="row">
                           <div class="col col-md-3 col-md-offset-1">
                                    {!! Form::label('date', '   التاريخ:') !!}
                                    {!! Form::date('date', null, ['class' => 'form-control', 'required']) !!}
                                </div>
                                </div>
                                    <br>
                                    <div class="row">
                                <div class="col col-md-3 col-md-offset-1">
                                    {!! Form::label('center', '  المركز:') !!}
                                    <select name="center" class="form-control"  required>
                                        <option value="">المركز</option>
                                        <?php
                                        for ($x = 0; $x < sizeof($centers); $x++) {
                                        ?>
                                        <option value="{{ $centers[$x]->id }}">{{ $centers[$x]->name}}</option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                </div>
{{--<h4>text here</h4>--}}


<br>
<br>
                                <div class="row">
                                    <div class="col col-md-5 col-md-offset-1">

                                    {!! Form::submit(trans('بحث'), ['class' => ' col-md-3', 'onclick' => 'myFunction()']) !!}


                            {!! Form::close() !!}



                        </div> </div></div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    @endsection