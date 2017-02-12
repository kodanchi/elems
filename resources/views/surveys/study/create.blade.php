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

                                {!! Form::open(['url' => '/survey/study/', 'method' => 'post', 'files' => true,'class'=>'newsletter-form']) !!}



                                <div class="col-md-12">
                                    <!--- Q1 Field --->
                                    <div class="form-group">
                                        {!! Form::label('answer', trans('surveys.q1').':') !!}
                                        {!! Form::select('answer', $answers , null , ['class' => 'form-control']) !!}
                                    </div>
                                </div>


                                </br>
                                {!! Form::hidden('question_id', 'q1', ['id' => 'q1']) !!}
                                {!! Form::hidden('hsid', $hsid, ['id' => 'hsid']) !!}
                                {!! Form::submit('إرسال', ['class' => ' col-md-3']) !!}

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="application/javascript">
        $(document).ready(function () {


            $('#SID').mask("r000000000", {
                'translation': {
                    0: {
                        pattern: /[0-9*]/
                    },
                    'r':{
                        pattern: /[2/]/,
                        fallback: '1'
                    }

                },placeholder: "2XXXXXXXX"
            });

            $('#NID').mask("r000000000", {
                'translation': {
                    0: {
                        pattern: /[0-9*]/
                    },
                    'r':{
                        pattern: /[1/]/,
                        fallback: '1'
                    }

                },placeholder: "1XXXXXXXX"
            });


        });
    </script>
    @endsection