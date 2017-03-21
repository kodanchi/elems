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

                                        <div class="col-md-10">
                                            <div class="row text-justify" style="margin-right: 1px; font-weight: 500; font-size: larger">
                                                عزيزي الطالب/الطالبة:
                                                فحيث أنك أحد المستفيدين من مبادرة (ضوء) المقدم من عمادة التعليم الإلكتروني والتعلم عن بعد بجامعة الإمام عبدالرحمن بن فيصل والتي مقتضاها إعفاء الحالات الإنسانية من رسوم الدراسة لمن تنطبق عليهم شروط الإعفاء.
                                                ولما لمشاركتكم من دور هام في استمرار المبادرة فإننا نأمل منك التكرم بالمشاركة في هذا الاستبيان والذي لن يستغرق من وقتك أكثر من دقيقة.

                                            </div>
                                            </br>
                                            </br>
                                            {{--<div class="row">
                                                <div class="col-md-10">
                                                    {!! Form::hidden('question_No', '7') !!}
                                                    {!! Form::hidden('question_disc1', trans('surveys.q1')) !!}
                                                    {!! Form::label('qid1', trans('surveys.q1').':') !!}
                                                    {!! Form::select('qid1', $answers , null , ['class' => 'form-control', 'required']) !!}
                                                </div>
                                            </div>
                                            </br>--}}
                                            <div class="row">
                                                <div class="col-md-8">
                                                    {!! Form::hidden('question_disc2', trans('surveys.q2')) !!}
                                                    {!! Form::label('qid2', trans('surveys.q2').':') !!}
                                                    {!! Form::select('qid2', $answers2 , null , ['class' => 'form-control', 'required']) !!}
                                                </div>
                                                <div id="res2" class="col-md-2">
                                                    {!! Form::label('resultPer2', trans('surveys.result').' :') !!}
                                                    {!! Form::text('resultPer2', '' , ['class' => 'form-control', 'readonly']) !!}
                                                </div>
                                            </div>
                                            </br>
                                            <div class="row">
                                                <div class="col-md-8">
                                                    {!! Form::hidden('question_disc3', trans('surveys.q3')) !!}
                                                    {!! Form::label('qid3', trans('surveys.q3').':') !!}
                                                    {!! Form::select('qid3', $answers2 , null , ['class' => 'form-control', 'required']) !!}
                                                </div>
                                                <div id="res3" class="col-md-2">
                                                    {!! Form::label('resultPer3', trans('surveys.result').' :') !!}
                                                    {!! Form::text('resultPer3', '' , ['class' => 'form-control', 'readonly']) !!}
                                                </div>
                                            </div>
                                            </br>
                                            <div class="row">
                                                <div class="col-md-8">
                                                    {!! Form::hidden('question_disc4', trans('surveys.q4')) !!}
                                                    {!! Form::label('qid4', trans('surveys.q4').':') !!}
                                                    {!! Form::select('qid4', $answers2 , null , ['class' => 'form-control', 'required']) !!}
                                                </div>
                                                <div id="res4" class="col-md-2">
                                                    {!! Form::label('resultPer4', trans('surveys.result').' :') !!}
                                                    {!! Form::text('resultPer4', '' , ['class' => 'form-control', 'readonly']) !!}
                                                </div>
                                            </div>
                                            </br>
                                            <div class="row">
                                                <div class="col-md-8">
                                                    {!! Form::hidden('question_disc5', trans('surveys.q5')) !!}
                                                    {!! Form::label('qid5', trans('surveys.q5').':') !!}
                                                    {!! Form::select('qid5', $answers2 , null , ['class' => 'form-control', 'required']) !!}
                                                </div>
                                                <div id="res5" class="col-md-2">
                                                    {!! Form::label('resultPer5', trans('surveys.result').' :') !!}
                                                    {!! Form::text('resultPer5', '' , ['class' => 'form-control', 'readonly']) !!}
                                                </div>
                                            </div>
                                            </br>
                                            <div class="row">
                                                <div class="col-md-8">
                                                    {!! Form::hidden('question_disc6', trans('surveys.q6')) !!}
                                                    {!! Form::label('qid6', trans('surveys.q6').':') !!}
                                                    {!! Form::select('qid6', $answers2 , null , ['class' => 'form-control', 'required']) !!}
                                                </div>
                                                <div id="res6" class="col-md-2">
                                                    {!! Form::label('resultPer6', trans('surveys.result').' :') !!}
                                                    {!! Form::text('resultPer6', '' , ['class' => 'form-control', 'readonly']) !!}
                                                </div>
                                            </div>
                                            </br>
                                            <div class="row">
                                                <div class="col-md-8">
                                                    {!! Form::hidden('question_disc7', trans('surveys.q7')) !!}
                                                    {!! Form::label('qid7', trans('surveys.q7').':') !!}
                                                    {!! Form::select('qid7', $answers2 , null , ['class' => 'form-control', 'required']) !!}
                                                </div>
                                                <div id="res7" class="col-md-2">
                                                    {!! Form::label('resultPer7', trans('surveys.result').' :') !!}
                                                    {!! Form::text('resultPer7', '' , ['class' => 'form-control', 'readonly']) !!}
                                                </div>
                                            </div>
                                            </br>
                                            <div class="row">
                                                <div id="totRes" class="col-md-2">
                                                    {!! Form::label('totalResult', trans('surveys.totalResult').' :') !!}
                                                    {!! Form::text('totalResult', '' , ['class' => 'form-control', 'readonly']) !!}
                                                </div>
                                            </div>

                                            </br>
                                            <div class="row">
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
            $('#res2').hide();
            $('#res3').hide();
            $('#res4').hide();
            $('#res5').hide();
            $('#res6').hide();
            $('#res7').hide();
            $('#totRes').hide();

        });

        $('#qid2').change(function () {
            //window.alert($('#qid2').val());
            resultLabel2();
            resultTotal();
            //$('#other_nationality').focus();

        });

        $('#qid3').change(function () {
            //window.alert($('#qid2').val());
            resultLabel3();
            resultTotal();
            //$('#other_nationality').focus();

        });

        $('#qid4').change(function () {
            //window.alert($('#qid2').val());
            resultLabel4();
            resultTotal();
            //$('#other_nationality').focus();

        });

        $('#qid5').change(function () {
            //window.alert($('#qid2').val());
            resultLabel5();
            resultTotal();
            //$('#other_nationality').focus();

        });

        $('#qid6').change(function () {
            //window.alert($('#qid2').val());
            resultLabel6();
            resultTotal();
            //$('#other_nationality').focus();

        });

        $('#qid7').change(function () {
            //window.alert($('#qid2').val());
            resultLabel7();
            resultTotal();
            //$('#other_nationality').focus();

        });


        function resultLabel2() {
            if($('#qid2').val() === 'أوافق بشدة'){
                //window.alert($('#resultPer2').val());
                //if($('#other_nationality').val() === 'other') $('#other_nationality').val('');
                $('#resultPer2').val('100');
                //window.alert($('#resultPer3').val());
                if((typeof($('#resultPer2').val()) != "undefined" && $('#resultPer2').val() !== '') && (typeof($('#resultPer3').val()) != "undefined" && $('#resultPer3').val() !== '') && (typeof($('#resultPer4').val()) != "undefined" && $('#resultPer4').val() !== '') && (typeof($('#resultPer5').val()) != "undefined" && $('#resultPer5').val() !== '') && (typeof($('#resultPer6').val()) != "undefined" && $('#resultPer6').val() !== '') && (typeof($('#resultPer7').val()) != "undefined" && $('#resultPer7').val() !== '')) {
                    $('#totalResult').val(((parseInt($('#resultPer2').val()) + parseInt($('#resultPer3').val()) + parseInt($('#resultPer4').val()) + parseInt($('#resultPer5').val()) + parseInt($('#resultPer6').val()) + parseInt($('#resultPer7').val()))/6).toFixed(2));
                }
                $('#res2').show();
            }
            else if($('#qid2').val() === 'أوافق'){
                //window.alert($('#resultPer2').val());
                //if($('#other_nationality').val() === 'other') $('#other_nationality').val('');
                $('#resultPer2').val('80');
                if((typeof($('#resultPer2').val()) != "undefined" && $('#resultPer2').val() !== '') && (typeof($('#resultPer3').val()) != "undefined" && $('#resultPer3').val() !== '') && (typeof($('#resultPer4').val()) != "undefined" && $('#resultPer4').val() !== '') && (typeof($('#resultPer5').val()) != "undefined" && $('#resultPer5').val() !== '') && (typeof($('#resultPer6').val()) != "undefined" && $('#resultPer6').val() !== '') && (typeof($('#resultPer7').val()) != "undefined" && $('#resultPer7').val() !== '')) {
                    $('#totalResult').val(((parseInt($('#resultPer2').val()) + parseInt($('#resultPer3').val()) + parseInt($('#resultPer4').val()) + parseInt($('#resultPer5').val()) + parseInt($('#resultPer6').val()) + parseInt($('#resultPer7').val()))/6).toFixed(2));
                }
                //window.alert($('#resultPer2').val());
                $('#res2').show();
            }
            else if($('#qid2').val() === 'محايد'){
                //window.alert($('#resultPer2').val());
                //if($('#other_nationality').val() === 'other') $('#other_nationality').val('');
                $('#resultPer2').val('60');
                if((typeof($('#resultPer2').val()) != "undefined" && $('#resultPer2').val() !== '') && (typeof($('#resultPer3').val()) != "undefined" && $('#resultPer3').val() !== '') && (typeof($('#resultPer4').val()) != "undefined" && $('#resultPer4').val() !== '') && (typeof($('#resultPer5').val()) != "undefined" && $('#resultPer5').val() !== '') && (typeof($('#resultPer6').val()) != "undefined" && $('#resultPer6').val() !== '') && (typeof($('#resultPer7').val()) != "undefined" && $('#resultPer7').val() !== '')) {
                    $('#totalResult').val(((parseInt($('#resultPer2').val()) + parseInt($('#resultPer3').val()) + parseInt($('#resultPer4').val()) + parseInt($('#resultPer5').val()) + parseInt($('#resultPer6').val()) + parseInt($('#resultPer7').val()))/6).toFixed(2));
                }
                //window.alert($('#resultPer2').val());
                $('#res2').show();
            }
            else if($('#qid2').val() === 'لا أوافق'){
                //window.alert($('#resultPer2').val());
                //if($('#other_nationality').val() === 'other') $('#other_nationality').val('');
                $('#resultPer2').val('40');
                if((typeof($('#resultPer2').val()) != "undefined" && $('#resultPer2').val() !== '') && (typeof($('#resultPer3').val()) != "undefined" && $('#resultPer3').val() !== '') && (typeof($('#resultPer4').val()) != "undefined" && $('#resultPer4').val() !== '') && (typeof($('#resultPer5').val()) != "undefined" && $('#resultPer5').val() !== '') && (typeof($('#resultPer6').val()) != "undefined" && $('#resultPer6').val() !== '') && (typeof($('#resultPer7').val()) != "undefined" && $('#resultPer7').val() !== '')) {
                    $('#totalResult').val(((parseInt($('#resultPer2').val()) + parseInt($('#resultPer3').val()) + parseInt($('#resultPer4').val()) + parseInt($('#resultPer5').val()) + parseInt($('#resultPer6').val()) + parseInt($('#resultPer7').val()))/6).toFixed(2));
                }
                //window.alert($('#resultPer2').val());
                $('#res2').show();
            }
            else if($('#qid2').val() === 'لا أوافق بشدة'){
                //window.alert($('#resultPer2').val());
                //if($('#other_nationality').val() === 'other') $('#other_nationality').val('');
                $('#resultPer2').val('20');
                if((typeof($('#resultPer2').val()) != "undefined" && $('#resultPer2').val() !== '') && (typeof($('#resultPer3').val()) != "undefined" && $('#resultPer3').val() !== '') && (typeof($('#resultPer4').val()) != "undefined" && $('#resultPer4').val() !== '') && (typeof($('#resultPer5').val()) != "undefined" && $('#resultPer5').val() !== '') && (typeof($('#resultPer6').val()) != "undefined" && $('#resultPer6').val() !== '') && (typeof($('#resultPer7').val()) != "undefined" && $('#resultPer7').val() !== '')) {
                    $('#totalResult').val(((parseInt($('#resultPer2').val()) + parseInt($('#resultPer3').val()) + parseInt($('#resultPer4').val()) + parseInt($('#resultPer5').val()) + parseInt($('#resultPer6').val()) + parseInt($('#resultPer7').val()))/6).toFixed(2));
                }
                //window.alert($('#resultPer2').val());
                $('#res2').show();
            }
            else {
                $('#qid2').val('');
                $('#totalResult').val('');
                $('#res2').hide();
                $('#totRes').hide();
            }
        }

        function resultTotal() {
            //window.alert($('#resultPer2').val());
            if((typeof($('#resultPer2').val()) != "undefined" && $('#resultPer2').val() !== '') && (typeof($('#resultPer3').val()) != "undefined" && $('#resultPer3').val() !== '') && (typeof($('#resultPer4').val()) != "undefined" && $('#resultPer4').val() !== '') && (typeof($('#resultPer5').val()) != "undefined" && $('#resultPer5').val() !== '') && (typeof($('#resultPer6').val()) != "undefined" && $('#resultPer6').val() !== '') && (typeof($('#resultPer7').val()) != "undefined" && $('#resultPer7').val() !== '')){

                //window.alert($('#resultPer2').val());
                $('#totRes').show();
            }
            else {
                $('#totRes').hide();
            }
        }


        function resultLabel2() {
            if($('#qid2').val() === 'أوافق بشدة'){
                //window.alert($('#resultPer2').val());
                //if($('#other_nationality').val() === 'other') $('#other_nationality').val('');
                $('#resultPer2').val('100');
                //window.alert($('#resultPer3').val());
                if((typeof($('#resultPer2').val()) != "undefined" && $('#resultPer2').val() !== '') && (typeof($('#resultPer3').val()) != "undefined" && $('#resultPer3').val() !== '') && (typeof($('#resultPer4').val()) != "undefined" && $('#resultPer4').val() !== '') && (typeof($('#resultPer5').val()) != "undefined" && $('#resultPer5').val() !== '') && (typeof($('#resultPer6').val()) != "undefined" && $('#resultPer6').val() !== '') && (typeof($('#resultPer7').val()) != "undefined" && $('#resultPer7').val() !== '')) {
                    $('#totalResult').val(((parseInt($('#resultPer2').val()) + parseInt($('#resultPer3').val()) + parseInt($('#resultPer4').val()) + parseInt($('#resultPer5').val()) + parseInt($('#resultPer6').val()) + parseInt($('#resultPer7').val()))/6).toFixed(2));
                }
                $('#res2').show();
            }
            else if($('#qid2').val() === 'أوافق'){
                //window.alert($('#resultPer2').val());
                //if($('#other_nationality').val() === 'other') $('#other_nationality').val('');
                $('#resultPer2').val('80');
                if((typeof($('#resultPer2').val()) != "undefined" && $('#resultPer2').val() !== '') && (typeof($('#resultPer3').val()) != "undefined" && $('#resultPer3').val() !== '') && (typeof($('#resultPer4').val()) != "undefined" && $('#resultPer4').val() !== '') && (typeof($('#resultPer5').val()) != "undefined" && $('#resultPer5').val() !== '') && (typeof($('#resultPer6').val()) != "undefined" && $('#resultPer6').val() !== '') && (typeof($('#resultPer7').val()) != "undefined" && $('#resultPer7').val() !== '')) {
                    $('#totalResult').val(((parseInt($('#resultPer2').val()) + parseInt($('#resultPer3').val()) + parseInt($('#resultPer4').val()) + parseInt($('#resultPer5').val()) + parseInt($('#resultPer6').val()) + parseInt($('#resultPer7').val()))/6).toFixed(2));
                }
                //window.alert($('#resultPer2').val());
                $('#res2').show();
            }
            else if($('#qid2').val() === 'محايد'){
                //window.alert($('#resultPer2').val());
                //if($('#other_nationality').val() === 'other') $('#other_nationality').val('');
                $('#resultPer2').val('60');
                if((typeof($('#resultPer2').val()) != "undefined" && $('#resultPer2').val() !== '') && (typeof($('#resultPer3').val()) != "undefined" && $('#resultPer3').val() !== '') && (typeof($('#resultPer4').val()) != "undefined" && $('#resultPer4').val() !== '') && (typeof($('#resultPer5').val()) != "undefined" && $('#resultPer5').val() !== '') && (typeof($('#resultPer6').val()) != "undefined" && $('#resultPer6').val() !== '') && (typeof($('#resultPer7').val()) != "undefined" && $('#resultPer7').val() !== '')) {
                    $('#totalResult').val(((parseInt($('#resultPer2').val()) + parseInt($('#resultPer3').val()) + parseInt($('#resultPer4').val()) + parseInt($('#resultPer5').val()) + parseInt($('#resultPer6').val()) + parseInt($('#resultPer7').val()))/6).toFixed(2));
                }
                //window.alert($('#resultPer2').val());
                $('#res2').show();
            }
            else if($('#qid2').val() === 'لا أوافق'){
                //window.alert($('#resultPer2').val());
                //if($('#other_nationality').val() === 'other') $('#other_nationality').val('');
                $('#resultPer2').val('40');
                if((typeof($('#resultPer2').val()) != "undefined" && $('#resultPer2').val() !== '') && (typeof($('#resultPer3').val()) != "undefined" && $('#resultPer3').val() !== '') && (typeof($('#resultPer4').val()) != "undefined" && $('#resultPer4').val() !== '') && (typeof($('#resultPer5').val()) != "undefined" && $('#resultPer5').val() !== '') && (typeof($('#resultPer6').val()) != "undefined" && $('#resultPer6').val() !== '') && (typeof($('#resultPer7').val()) != "undefined" && $('#resultPer7').val() !== '')) {
                    $('#totalResult').val(((parseInt($('#resultPer2').val()) + parseInt($('#resultPer3').val()) + parseInt($('#resultPer4').val()) + parseInt($('#resultPer5').val()) + parseInt($('#resultPer6').val()) + parseInt($('#resultPer7').val()))/6).toFixed(2));
                }
                //window.alert($('#resultPer2').val());
                $('#res2').show();
            }
            else if($('#qid2').val() === 'لا أوافق بشدة'){
                //window.alert($('#resultPer2').val());
                //if($('#other_nationality').val() === 'other') $('#other_nationality').val('');
                $('#resultPer2').val('20');
                if((typeof($('#resultPer2').val()) != "undefined" && $('#resultPer2').val() !== '') && (typeof($('#resultPer3').val()) != "undefined" && $('#resultPer3').val() !== '') && (typeof($('#resultPer4').val()) != "undefined" && $('#resultPer4').val() !== '') && (typeof($('#resultPer5').val()) != "undefined" && $('#resultPer5').val() !== '') && (typeof($('#resultPer6').val()) != "undefined" && $('#resultPer6').val() !== '') && (typeof($('#resultPer7').val()) != "undefined" && $('#resultPer7').val() !== '')) {
                    $('#totalResult').val(((parseInt($('#resultPer2').val()) + parseInt($('#resultPer3').val()) + parseInt($('#resultPer4').val()) + parseInt($('#resultPer5').val()) + parseInt($('#resultPer6').val()) + parseInt($('#resultPer7').val()))/6).toFixed(2));
                }
                //window.alert($('#resultPer2').val());
                $('#res2').show();
            }
            else {
                $('#qid2').val('');
                $('#resultPer2').val('');
                $('#totalResult').val('');
                $('#res2').hide();
                $('#totRes').hide();
            }
        }

        function resultLabel3() {
            if($('#qid3').val() === 'أوافق بشدة'){
                //window.alert($('#resultPer2').val());
                //if($('#other_nationality').val() === 'other') $('#other_nationality').val('');
                $('#resultPer3').val('100');
                if((typeof($('#resultPer2').val()) != "undefined" && $('#resultPer2').val() !== '') && (typeof($('#resultPer3').val()) != "undefined" && $('#resultPer3').val() !== '') && (typeof($('#resultPer4').val()) != "undefined" && $('#resultPer4').val() !== '') && (typeof($('#resultPer5').val()) != "undefined" && $('#resultPer5').val() !== '') && (typeof($('#resultPer6').val()) != "undefined" && $('#resultPer6').val() !== '') && (typeof($('#resultPer7').val()) != "undefined" && $('#resultPer7').val() !== '')) {
                    $('#totalResult').val(((parseInt($('#resultPer2').val()) + parseInt($('#resultPer3').val()) + parseInt($('#resultPer4').val()) + parseInt($('#resultPer5').val()) + parseInt($('#resultPer6').val()) + parseInt($('#resultPer7').val()))/6).toFixed(2));
                }
                //window.alert($('#resultPer2').val());
                $('#res3').show();
            }
            else if($('#qid3').val() === 'أوافق'){
                //window.alert($('#resultPer2').val());
                //if($('#other_nationality').val() === 'other') $('#other_nationality').val('');
                $('#resultPer3').val('80');
                if((typeof($('#resultPer2').val()) != "undefined" && $('#resultPer2').val() !== '') && (typeof($('#resultPer3').val()) != "undefined" && $('#resultPer3').val() !== '') && (typeof($('#resultPer4').val()) != "undefined" && $('#resultPer4').val() !== '') && (typeof($('#resultPer5').val()) != "undefined" && $('#resultPer5').val() !== '') && (typeof($('#resultPer6').val()) != "undefined" && $('#resultPer6').val() !== '') && (typeof($('#resultPer7').val()) != "undefined" && $('#resultPer7').val() !== '')) {
                    $('#totalResult').val(((parseInt($('#resultPer2').val()) + parseInt($('#resultPer3').val()) + parseInt($('#resultPer4').val()) + parseInt($('#resultPer5').val()) + parseInt($('#resultPer6').val()) + parseInt($('#resultPer7').val()))/6).toFixed(2));
                }
                //window.alert($('#resultPer2').val());
                $('#res3').show();
            }
            else if($('#qid3').val() === 'محايد'){
                //window.alert($('#resultPer2').val());
                //if($('#other_nationality').val() === 'other') $('#other_nationality').val('');
                $('#resultPer3').val('60');
                if((typeof($('#resultPer2').val()) != "undefined" && $('#resultPer2').val() !== '') && (typeof($('#resultPer3').val()) != "undefined" && $('#resultPer3').val() !== '') && (typeof($('#resultPer4').val()) != "undefined" && $('#resultPer4').val() !== '') && (typeof($('#resultPer5').val()) != "undefined" && $('#resultPer5').val() !== '') && (typeof($('#resultPer6').val()) != "undefined" && $('#resultPer6').val() !== '') && (typeof($('#resultPer7').val()) != "undefined" && $('#resultPer7').val() !== '')) {
                    $('#totalResult').val(((parseInt($('#resultPer2').val()) + parseInt($('#resultPer3').val()) + parseInt($('#resultPer4').val()) + parseInt($('#resultPer5').val()) + parseInt($('#resultPer6').val()) + parseInt($('#resultPer7').val()))/6).toFixed(2));
                }
                //window.alert($('#resultPer2').val());
                $('#res3').show();
            }
            else if($('#qid3').val() === 'لا أوافق'){
                //window.alert($('#resultPer2').val());
                //if($('#other_nationality').val() === 'other') $('#other_nationality').val('');
                $('#resultPer3').val('40');
                if((typeof($('#resultPer2').val()) != "undefined" && $('#resultPer2').val() !== '') && (typeof($('#resultPer3').val()) != "undefined" && $('#resultPer3').val() !== '') && (typeof($('#resultPer4').val()) != "undefined" && $('#resultPer4').val() !== '') && (typeof($('#resultPer5').val()) != "undefined" && $('#resultPer5').val() !== '') && (typeof($('#resultPer6').val()) != "undefined" && $('#resultPer6').val() !== '') && (typeof($('#resultPer7').val()) != "undefined" && $('#resultPer7').val() !== '')) {
                    $('#totalResult').val(((parseInt($('#resultPer2').val()) + parseInt($('#resultPer3').val()) + parseInt($('#resultPer4').val()) + parseInt($('#resultPer5').val()) + parseInt($('#resultPer6').val()) + parseInt($('#resultPer7').val()))/6).toFixed(2));
                }
                //window.alert($('#resultPer2').val());
                $('#res3').show();
            }
            else if($('#qid3').val() === 'لا أوافق بشدة'){
                //window.alert($('#resultPer2').val());
                //if($('#other_nationality').val() === 'other') $('#other_nationality').val('');
                $('#resultPer3').val('20');
                if((typeof($('#resultPer2').val()) != "undefined" && $('#resultPer2').val() !== '') && (typeof($('#resultPer3').val()) != "undefined" && $('#resultPer3').val() !== '') && (typeof($('#resultPer4').val()) != "undefined" && $('#resultPer4').val() !== '') && (typeof($('#resultPer5').val()) != "undefined" && $('#resultPer5').val() !== '') && (typeof($('#resultPer6').val()) != "undefined" && $('#resultPer6').val() !== '') && (typeof($('#resultPer7').val()) != "undefined" && $('#resultPer7').val() !== '')) {
                    $('#totalResult').val(((parseInt($('#resultPer2').val()) + parseInt($('#resultPer3').val()) + parseInt($('#resultPer4').val()) + parseInt($('#resultPer5').val()) + parseInt($('#resultPer6').val()) + parseInt($('#resultPer7').val()))/6).toFixed(2));
                }
                //window.alert($('#resultPer2').val());
                $('#res3').show();
            }
            else {
                $('#qid3').val('');
                $('#resultPer3').val('');
                $('#totalResult').val('');
                $('#res3').hide();
                $('#totRes').hide();
            }
        }

        function resultLabel4() {
            if($('#qid4').val() === 'أوافق بشدة'){
                //window.alert($('#resultPer2').val());
                //if($('#other_nationality').val() === 'other') $('#other_nationality').val('');
                $('#resultPer4').val('100');
                if((typeof($('#resultPer2').val()) != "undefined" && $('#resultPer2').val() !== '') && (typeof($('#resultPer3').val()) != "undefined" && $('#resultPer3').val() !== '') && (typeof($('#resultPer4').val()) != "undefined" && $('#resultPer4').val() !== '') && (typeof($('#resultPer5').val()) != "undefined" && $('#resultPer5').val() !== '') && (typeof($('#resultPer6').val()) != "undefined" && $('#resultPer6').val() !== '') && (typeof($('#resultPer7').val()) != "undefined" && $('#resultPer7').val() !== '')) {
                    $('#totalResult').val(((parseInt($('#resultPer2').val()) + parseInt($('#resultPer3').val()) + parseInt($('#resultPer4').val()) + parseInt($('#resultPer5').val()) + parseInt($('#resultPer6').val()) + parseInt($('#resultPer7').val()))/6).toFixed(2));
                }
                //window.alert($('#resultPer2').val());
                $('#res4').show();
            }
            else if($('#qid4').val() === 'أوافق'){
                //window.alert($('#resultPer2').val());
                //if($('#other_nationality').val() === 'other') $('#other_nationality').val('');
                $('#resultPer4').val('80');
                if((typeof($('#resultPer2').val()) != "undefined" && $('#resultPer2').val() !== '') && (typeof($('#resultPer3').val()) != "undefined" && $('#resultPer3').val() !== '') && (typeof($('#resultPer4').val()) != "undefined" && $('#resultPer4').val() !== '') && (typeof($('#resultPer5').val()) != "undefined" && $('#resultPer5').val() !== '') && (typeof($('#resultPer6').val()) != "undefined" && $('#resultPer6').val() !== '') && (typeof($('#resultPer7').val()) != "undefined" && $('#resultPer7').val() !== '')) {
                    $('#totalResult').val(((parseInt($('#resultPer2').val()) + parseInt($('#resultPer3').val()) + parseInt($('#resultPer4').val()) + parseInt($('#resultPer5').val()) + parseInt($('#resultPer6').val()) + parseInt($('#resultPer7').val()))/6).toFixed(2));
                }
                //window.alert($('#resultPer2').val());
                $('#res4').show();
            }
            else if($('#qid4').val() === 'محايد'){
                //window.alert($('#resultPer2').val());
                //if($('#other_nationality').val() === 'other') $('#other_nationality').val('');
                $('#resultPer4').val('60');
                if((typeof($('#resultPer2').val()) != "undefined" && $('#resultPer2').val() !== '') && (typeof($('#resultPer3').val()) != "undefined" && $('#resultPer3').val() !== '') && (typeof($('#resultPer4').val()) != "undefined" && $('#resultPer4').val() !== '') && (typeof($('#resultPer5').val()) != "undefined" && $('#resultPer5').val() !== '') && (typeof($('#resultPer6').val()) != "undefined" && $('#resultPer6').val() !== '') && (typeof($('#resultPer7').val()) != "undefined" && $('#resultPer7').val() !== '')) {
                    $('#totalResult').val(((parseInt($('#resultPer2').val()) + parseInt($('#resultPer3').val()) + parseInt($('#resultPer4').val()) + parseInt($('#resultPer5').val()) + parseInt($('#resultPer6').val()) + parseInt($('#resultPer7').val()))/6).toFixed(2));
                }
                //window.alert($('#resultPer2').val());
                $('#res4').show();
            }
            else if($('#qid4').val() === 'لا أوافق'){
                //window.alert($('#resultPer2').val());
                //if($('#other_nationality').val() === 'other') $('#other_nationality').val('');
                $('#resultPer4').val('40');
                if((typeof($('#resultPer2').val()) != "undefined" && $('#resultPer2').val() !== '') && (typeof($('#resultPer3').val()) != "undefined" && $('#resultPer3').val() !== '') && (typeof($('#resultPer4').val()) != "undefined" && $('#resultPer4').val() !== '') && (typeof($('#resultPer5').val()) != "undefined" && $('#resultPer5').val() !== '') && (typeof($('#resultPer6').val()) != "undefined" && $('#resultPer6').val() !== '') && (typeof($('#resultPer7').val()) != "undefined" && $('#resultPer7').val() !== '')) {
                    $('#totalResult').val(((parseInt($('#resultPer2').val()) + parseInt($('#resultPer3').val()) + parseInt($('#resultPer4').val()) + parseInt($('#resultPer5').val()) + parseInt($('#resultPer6').val()) + parseInt($('#resultPer7').val()))/6).toFixed(2));
                }
                //window.alert($('#resultPer2').val());
                $('#res4').show();
            }
            else if($('#qid4').val() === 'لا أوافق بشدة'){
                //window.alert($('#resultPer2').val());
                //if($('#other_nationality').val() === 'other') $('#other_nationality').val('');
                $('#resultPer4').val('20');
                if((typeof($('#resultPer2').val()) != "undefined" && $('#resultPer2').val() !== '') && (typeof($('#resultPer3').val()) != "undefined" && $('#resultPer3').val() !== '') && (typeof($('#resultPer4').val()) != "undefined" && $('#resultPer4').val() !== '') && (typeof($('#resultPer5').val()) != "undefined" && $('#resultPer5').val() !== '') && (typeof($('#resultPer6').val()) != "undefined" && $('#resultPer6').val() !== '') && (typeof($('#resultPer7').val()) != "undefined" && $('#resultPer7').val() !== '')) {
                    $('#totalResult').val(((parseInt($('#resultPer2').val()) + parseInt($('#resultPer3').val()) + parseInt($('#resultPer4').val()) + parseInt($('#resultPer5').val()) + parseInt($('#resultPer6').val()) + parseInt($('#resultPer7').val()))/6).toFixed(2));
                }
                //window.alert($('#resultPer2').val());
                $('#res4').show();
            }
            else {
                $('#qid4').val('');
                $('#resultPer4').val('');
                $('#totalResult').val('');
                $('#res4').hide();
                $('#totRes').hide();
            }
        }

        function resultLabel5() {
            if($('#qid5').val() === 'أوافق بشدة'){
                //window.alert($('#resultPer2').val());
                //if($('#other_nationality').val() === 'other') $('#other_nationality').val('');
                $('#resultPer5').val('100');
                if((typeof($('#resultPer2').val()) != "undefined" && $('#resultPer2').val() !== '') && (typeof($('#resultPer3').val()) != "undefined" && $('#resultPer3').val() !== '') && (typeof($('#resultPer4').val()) != "undefined" && $('#resultPer4').val() !== '') && (typeof($('#resultPer5').val()) != "undefined" && $('#resultPer5').val() !== '') && (typeof($('#resultPer6').val()) != "undefined" && $('#resultPer6').val() !== '') && (typeof($('#resultPer7').val()) != "undefined" && $('#resultPer7').val() !== '')) {
                    $('#totalResult').val(((parseInt($('#resultPer2').val()) + parseInt($('#resultPer3').val()) + parseInt($('#resultPer4').val()) + parseInt($('#resultPer5').val()) + parseInt($('#resultPer6').val()) + parseInt($('#resultPer7').val()))/6).toFixed(2));
                }
                //window.alert($('#resultPer2').val());
                $('#res5').show();
            }
            else if($('#qid5').val() === 'أوافق'){
                //window.alert($('#resultPer2').val());
                //if($('#other_nationality').val() === 'other') $('#other_nationality').val('');
                $('#resultPer5').val('80');
                if((typeof($('#resultPer2').val()) != "undefined" && $('#resultPer2').val() !== '') && (typeof($('#resultPer3').val()) != "undefined" && $('#resultPer3').val() !== '') && (typeof($('#resultPer4').val()) != "undefined" && $('#resultPer4').val() !== '') && (typeof($('#resultPer5').val()) != "undefined" && $('#resultPer5').val() !== '') && (typeof($('#resultPer6').val()) != "undefined" && $('#resultPer6').val() !== '') && (typeof($('#resultPer7').val()) != "undefined" && $('#resultPer7').val() !== '')) {
                    $('#totalResult').val(((parseInt($('#resultPer2').val()) + parseInt($('#resultPer3').val()) + parseInt($('#resultPer4').val()) + parseInt($('#resultPer5').val()) + parseInt($('#resultPer6').val()) + parseInt($('#resultPer7').val()))/6).toFixed(2));
                }
                //window.alert($('#resultPer2').val());
                $('#res5').show();
            }
            else if($('#qid5').val() === 'محايد'){
                //window.alert($('#resultPer2').val());
                //if($('#other_nationality').val() === 'other') $('#other_nationality').val('');
                $('#resultPer5').val('60');
                if((typeof($('#resultPer2').val()) != "undefined" && $('#resultPer2').val() !== '') && (typeof($('#resultPer3').val()) != "undefined" && $('#resultPer3').val() !== '') && (typeof($('#resultPer4').val()) != "undefined" && $('#resultPer4').val() !== '') && (typeof($('#resultPer5').val()) != "undefined" && $('#resultPer5').val() !== '') && (typeof($('#resultPer6').val()) != "undefined" && $('#resultPer6').val() !== '') && (typeof($('#resultPer7').val()) != "undefined" && $('#resultPer7').val() !== '')) {
                    $('#totalResult').val(((parseInt($('#resultPer2').val()) + parseInt($('#resultPer3').val()) + parseInt($('#resultPer4').val()) + parseInt($('#resultPer5').val()) + parseInt($('#resultPer6').val()) + parseInt($('#resultPer7').val()))/6).toFixed(2));
                }
                //window.alert($('#resultPer2').val());
                $('#res5').show();
            }
            else if($('#qid5').val() === 'لا أوافق'){
                //window.alert($('#resultPer2').val());
                //if($('#other_nationality').val() === 'other') $('#other_nationality').val('');
                $('#resultPer5').val('40');
                if((typeof($('#resultPer2').val()) != "undefined" && $('#resultPer2').val() !== '') && (typeof($('#resultPer3').val()) != "undefined" && $('#resultPer3').val() !== '') && (typeof($('#resultPer4').val()) != "undefined" && $('#resultPer4').val() !== '') && (typeof($('#resultPer5').val()) != "undefined" && $('#resultPer5').val() !== '') && (typeof($('#resultPer6').val()) != "undefined" && $('#resultPer6').val() !== '') && (typeof($('#resultPer7').val()) != "undefined" && $('#resultPer7').val() !== '')) {
                    $('#totalResult').val(((parseInt($('#resultPer2').val()) + parseInt($('#resultPer3').val()) + parseInt($('#resultPer4').val()) + parseInt($('#resultPer5').val()) + parseInt($('#resultPer6').val()) + parseInt($('#resultPer7').val()))/6).toFixed(2));
                }
                //window.alert($('#resultPer2').val());
                $('#res5').show();
            }
            else if($('#qid5').val() === 'لا أوافق بشدة'){
                //window.alert($('#resultPer2').val());
                //if($('#other_nationality').val() === 'other') $('#other_nationality').val('');
                $('#resultPer5').val('20');
                if((typeof($('#resultPer2').val()) != "undefined" && $('#resultPer2').val() !== '') && (typeof($('#resultPer3').val()) != "undefined" && $('#resultPer3').val() !== '') && (typeof($('#resultPer4').val()) != "undefined" && $('#resultPer4').val() !== '') && (typeof($('#resultPer5').val()) != "undefined" && $('#resultPer5').val() !== '') && (typeof($('#resultPer6').val()) != "undefined" && $('#resultPer6').val() !== '') && (typeof($('#resultPer7').val()) != "undefined" && $('#resultPer7').val() !== '')) {
                    $('#totalResult').val(((parseInt($('#resultPer2').val()) + parseInt($('#resultPer3').val()) + parseInt($('#resultPer4').val()) + parseInt($('#resultPer5').val()) + parseInt($('#resultPer6').val()) + parseInt($('#resultPer7').val()))/6).toFixed(2));
                }
                //window.alert($('#resultPer2').val());
                $('#res5').show();
            }
            else {
                $('#qid5').val('');
                $('#resultPer5').val('');
                $('#totalResult').val('');
                $('#res5').hide();
                $('#totRes').hide();
            }
        }

        function resultLabel6() {
            if($('#qid6').val() === 'أوافق بشدة'){
                //window.alert($('#resultPer2').val());
                //if($('#other_nationality').val() === 'other') $('#other_nationality').val('');
                $('#resultPer6').val('100');
                if((typeof($('#resultPer2').val()) != "undefined" && $('#resultPer2').val() !== '') && (typeof($('#resultPer3').val()) != "undefined" && $('#resultPer3').val() !== '') && (typeof($('#resultPer4').val()) != "undefined" && $('#resultPer4').val() !== '') && (typeof($('#resultPer5').val()) != "undefined" && $('#resultPer5').val() !== '') && (typeof($('#resultPer6').val()) != "undefined" && $('#resultPer6').val() !== '') && (typeof($('#resultPer7').val()) != "undefined" && $('#resultPer7').val() !== '')) {
                    $('#totalResult').val(((parseInt($('#resultPer2').val()) + parseInt($('#resultPer3').val()) + parseInt($('#resultPer4').val()) + parseInt($('#resultPer5').val()) + parseInt($('#resultPer6').val()) + parseInt($('#resultPer7').val()))/6).toFixed(2));
                }
                //window.alert($('#resultPer2').val());
                $('#res6').show();
            }
            else if($('#qid6').val() === 'أوافق'){
                //window.alert($('#resultPer2').val());
                //if($('#other_nationality').val() === 'other') $('#other_nationality').val('');
                $('#resultPer6').val('80');
                if((typeof($('#resultPer2').val()) != "undefined" && $('#resultPer2').val() !== '') && (typeof($('#resultPer3').val()) != "undefined" && $('#resultPer3').val() !== '') && (typeof($('#resultPer4').val()) != "undefined" && $('#resultPer4').val() !== '') && (typeof($('#resultPer5').val()) != "undefined" && $('#resultPer5').val() !== '') && (typeof($('#resultPer6').val()) != "undefined" && $('#resultPer6').val() !== '') && (typeof($('#resultPer7').val()) != "undefined" && $('#resultPer7').val() !== '')) {
                    $('#totalResult').val(((parseInt($('#resultPer2').val()) + parseInt($('#resultPer3').val()) + parseInt($('#resultPer4').val()) + parseInt($('#resultPer5').val()) + parseInt($('#resultPer6').val()) + parseInt($('#resultPer7').val()))/6).toFixed(2));
                }
                //window.alert($('#resultPer2').val());
                $('#res6').show();
            }
            else if($('#qid6').val() === 'محايد'){
                //window.alert($('#resultPer2').val());
                //if($('#other_nationality').val() === 'other') $('#other_nationality').val('');
                $('#resultPer6').val('60');
                if((typeof($('#resultPer2').val()) != "undefined" && $('#resultPer2').val() !== '') && (typeof($('#resultPer3').val()) != "undefined" && $('#resultPer3').val() !== '') && (typeof($('#resultPer4').val()) != "undefined" && $('#resultPer4').val() !== '') && (typeof($('#resultPer5').val()) != "undefined" && $('#resultPer5').val() !== '') && (typeof($('#resultPer6').val()) != "undefined" && $('#resultPer6').val() !== '') && (typeof($('#resultPer7').val()) != "undefined" && $('#resultPer7').val() !== '')) {
                    $('#totalResult').val(((parseInt($('#resultPer2').val()) + parseInt($('#resultPer3').val()) + parseInt($('#resultPer4').val()) + parseInt($('#resultPer5').val()) + parseInt($('#resultPer6').val()) + parseInt($('#resultPer7').val()))/6).toFixed(2));
                }
                //window.alert($('#resultPer2').val());
                $('#res6').show();
            }
            else if($('#qid6').val() === 'لا أوافق'){
                //window.alert($('#resultPer2').val());
                //if($('#other_nationality').val() === 'other') $('#other_nationality').val('');
                $('#resultPer6').val('40');
                if((typeof($('#resultPer2').val()) != "undefined" && $('#resultPer2').val() !== '') && (typeof($('#resultPer3').val()) != "undefined" && $('#resultPer3').val() !== '') && (typeof($('#resultPer4').val()) != "undefined" && $('#resultPer4').val() !== '') && (typeof($('#resultPer5').val()) != "undefined" && $('#resultPer5').val() !== '') && (typeof($('#resultPer6').val()) != "undefined" && $('#resultPer6').val() !== '') && (typeof($('#resultPer7').val()) != "undefined" && $('#resultPer7').val() !== '')) {
                    $('#totalResult').val(((parseInt($('#resultPer2').val()) + parseInt($('#resultPer3').val()) + parseInt($('#resultPer4').val()) + parseInt($('#resultPer5').val()) + parseInt($('#resultPer6').val()) + parseInt($('#resultPer7').val()))/6).toFixed(2));
                }
                //window.alert($('#resultPer2').val());
                $('#res6').show();
            }
            else if($('#qid6').val() === 'لا أوافق بشدة'){
                //window.alert($('#resultPer2').val());
                //if($('#other_nationality').val() === 'other') $('#other_nationality').val('');
                $('#resultPer6').val('20');
                if((typeof($('#resultPer2').val()) != "undefined" && $('#resultPer2').val() !== '') && (typeof($('#resultPer3').val()) != "undefined" && $('#resultPer3').val() !== '') && (typeof($('#resultPer4').val()) != "undefined" && $('#resultPer4').val() !== '') && (typeof($('#resultPer5').val()) != "undefined" && $('#resultPer5').val() !== '') && (typeof($('#resultPer6').val()) != "undefined" && $('#resultPer6').val() !== '') && (typeof($('#resultPer7').val()) != "undefined" && $('#resultPer7').val() !== '')) {
                    $('#totalResult').val(((parseInt($('#resultPer2').val()) + parseInt($('#resultPer3').val()) + parseInt($('#resultPer4').val()) + parseInt($('#resultPer5').val()) + parseInt($('#resultPer6').val()) + parseInt($('#resultPer7').val()))/6).toFixed(2));
                }
                //window.alert($('#resultPer2').val());
                $('#res6').show();
            }
            else {
                $('#qid6').val('');
                $('#resultPer6').val('');
                //window.alert('aaaaaaa');
                //window.alert($('#qid6').val());
                $('#totalResult').val('');
                $('#res6').hide();
                $('#totRes').hide();
            }
        }

        function resultLabel7() {
            if($('#qid7').val() === 'أوافق بشدة'){
                //window.alert($('#resultPer2').val());
                //if($('#other_nationality').val() === 'other') $('#other_nationality').val('');
                $('#resultPer7').val('100');
                if((typeof($('#resultPer2').val()) != "undefined" && $('#resultPer2').val() !== '') && (typeof($('#resultPer3').val()) != "undefined" && $('#resultPer3').val() !== '') && (typeof($('#resultPer4').val()) != "undefined" && $('#resultPer4').val() !== '') && (typeof($('#resultPer5').val()) != "undefined" && $('#resultPer5').val() !== '') && (typeof($('#resultPer6').val()) != "undefined" && $('#resultPer6').val() !== '') && (typeof($('#resultPer7').val()) != "undefined" && $('#resultPer7').val() !== '')) {
                    $('#totalResult').val(((parseInt($('#resultPer2').val()) + parseInt($('#resultPer3').val()) + parseInt($('#resultPer4').val()) + parseInt($('#resultPer5').val()) + parseInt($('#resultPer6').val()) + parseInt($('#resultPer7').val()))/6).toFixed(2));
                }
                //window.alert($('#resultPer2').val());
                $('#res7').show();
            }
            else if($('#qid7').val() === 'أوافق'){
                //window.alert($('#resultPer2').val());
                //if($('#other_nationality').val() === 'other') $('#other_nationality').val('');
                $('#resultPer7').val('80');
                if((typeof($('#resultPer2').val()) != "undefined" && $('#resultPer2').val() !== '') && (typeof($('#resultPer3').val()) != "undefined" && $('#resultPer3').val() !== '') && (typeof($('#resultPer4').val()) != "undefined" && $('#resultPer4').val() !== '') && (typeof($('#resultPer5').val()) != "undefined" && $('#resultPer5').val() !== '') && (typeof($('#resultPer6').val()) != "undefined" && $('#resultPer6').val() !== '') && (typeof($('#resultPer7').val()) != "undefined" && $('#resultPer7').val() !== '')) {
                    $('#totalResult').val(((parseInt($('#resultPer2').val()) + parseInt($('#resultPer3').val()) + parseInt($('#resultPer4').val()) + parseInt($('#resultPer5').val()) + parseInt($('#resultPer6').val()) + parseInt($('#resultPer7').val()))/6).toFixed(2));
                }
                //window.alert($('#resultPer2').val());
                $('#res7').show();
            }
            else if($('#qid7').val() === 'محايد'){
                //window.alert($('#resultPer2').val());
                //if($('#other_nationality').val() === 'other') $('#other_nationality').val('');
                $('#resultPer7').val('60');
                if((typeof($('#resultPer2').val()) != "undefined" && $('#resultPer2').val() !== '') && (typeof($('#resultPer3').val()) != "undefined" && $('#resultPer3').val() !== '') && (typeof($('#resultPer4').val()) != "undefined" && $('#resultPer4').val() !== '') && (typeof($('#resultPer5').val()) != "undefined" && $('#resultPer5').val() !== '') && (typeof($('#resultPer6').val()) != "undefined" && $('#resultPer6').val() !== '') && (typeof($('#resultPer7').val()) != "undefined" && $('#resultPer7').val() !== '')) {
                    $('#totalResult').val(((parseInt($('#resultPer2').val()) + parseInt($('#resultPer3').val()) + parseInt($('#resultPer4').val()) + parseInt($('#resultPer5').val()) + parseInt($('#resultPer6').val()) + parseInt($('#resultPer7').val()))/6).toFixed(2));
                }
                //window.alert($('#resultPer2').val());
                $('#res7').show();
            }
            else if($('#qid7').val() === 'لا أوافق'){
                //window.alert($('#resultPer2').val());
                //if($('#other_nationality').val() === 'other') $('#other_nationality').val('');
                $('#resultPer7').val('40');
                if((typeof($('#resultPer2').val()) != "undefined" && $('#resultPer2').val() !== '') && (typeof($('#resultPer3').val()) != "undefined" && $('#resultPer3').val() !== '') && (typeof($('#resultPer4').val()) != "undefined" && $('#resultPer4').val() !== '') && (typeof($('#resultPer5').val()) != "undefined" && $('#resultPer5').val() !== '') && (typeof($('#resultPer6').val()) != "undefined" && $('#resultPer6').val() !== '') && (typeof($('#resultPer7').val()) != "undefined" && $('#resultPer7').val() !== '')) {
                    $('#totalResult').val(((parseInt($('#resultPer2').val()) + parseInt($('#resultPer3').val()) + parseInt($('#resultPer4').val()) + parseInt($('#resultPer5').val()) + parseInt($('#resultPer6').val()) + parseInt($('#resultPer7').val()))/6).toFixed(2));
                }
                //window.alert($('#resultPer2').val());
                $('#res7').show();
            }
            else if($('#qid7').val() === 'لا أوافق بشدة'){
                //window.alert($('#resultPer2').val());
                //if($('#other_nationality').val() === 'other') $('#other_nationality').val('');
                $('#resultPer7').val('20');
                if((typeof($('#resultPer2').val()) != "undefined" && $('#resultPer2').val() !== '') && (typeof($('#resultPer3').val()) != "undefined" && $('#resultPer3').val() !== '') && (typeof($('#resultPer4').val()) != "undefined" && $('#resultPer4').val() !== '') && (typeof($('#resultPer5').val()) != "undefined" && $('#resultPer5').val() !== '') && (typeof($('#resultPer6').val()) != "undefined" && $('#resultPer6').val() !== '') && (typeof($('#resultPer7').val()) != "undefined" && $('#resultPer7').val() !== '')) {
                    $('#totalResult').val(((parseInt($('#resultPer2').val()) + parseInt($('#resultPer3').val()) + parseInt($('#resultPer4').val()) + parseInt($('#resultPer5').val()) + parseInt($('#resultPer6').val()) + parseInt($('#resultPer7').val()))/6).toFixed(2));
                }
                //window.alert($('#resultPer2').val());
                $('#res7').show();
            }
            else {
                $('#qid7').val('');
                $('#resultPer7').val('');
                //window.alert('aaaaaaa');
                //window.alert($('#qid6').val());
                $('#totalResult').val('');
                $('#res7').hide();
                $('#totRes').hide();
            }
        }
    </script>
@endsection