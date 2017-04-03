@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-15 col-md-offset-1">


                @include('errors.errors')


                <div class="panel panel-default">
                    <div class="panel-heading"> <br> <h5>مرحبا:   {{$info[0]->fname}}  {{$info[0]->faname}} {{$info[0]->gfaname}} {{$info[0]->lname}} </h5>
                    </div>

                    <div class="panel-body">

                        {!! Form::open(['url' => '/form/emr/updateform/updateStatus', 'method' => 'post', 'files' => true ,'class'=>'newsletter-form' ]) !!}

                        {{ Form::hidden('NID', $info[0]->NID) }}

                        {!! Form::label('updatereg', '  تجديد الرغبة :') !!}
                                        <br>
                                        <br>
                        <div class="form-group">
                            <div class="col-md-4">
                                <label>

                            {{ Form::radio('choose',1, ['class' => 'field']) }}
                                    أرغب
                                </label>
                                </div>
                            <div class="col-md-4">

                                <label>
                            {{ Form::radio('choose',2, ['class' => 'field']) }}
                                    لاأرغب

                                </label>
                                </div>
                            <div class="col-md-4">
                                <label>

                            {{ Form::radio('choose',3, ['class' => 'field']) }}

                                    متردد
                                </label>
                                </div>

                        </div>

                        <br>
                        <br>
                        <br>


                        <div id="div_option1" class="form-group">
                            <div class="row">
                                <div id="div_center" class="col col-md-6">
                                    @if($info[0]->gender =='male')
                                    <div id="center_div">
                                        <h5>تحديد المركز :</h5>


                                        <div class="form-group">
                                            {!! Form::label('center_first', trans('regform.center_first').':') !!}<br>
                                            {!! Form::select('center_first',trans('centers_male'), ['class' => 'form-control']) !!}
                                        </div>
                                        <!--- Second Center Field --->
                                        <div class="form-group">
                                            {!! Form::label('center_second', 'المركز الذي ترغب المراقبة فيه كرغبة ثانية:') !!}<br>
                                            {!! Form::select('center_second',trans('centers_male'), ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    @endif

                                        @if($info[0]->gender =='female')
                                        <div id="center_div">
                                        <h5>تحديد المركز :</h5>

                                        <div class="form-group">
                                            {!! Form::label('center_first', trans('regform.center_first').':') !!} <br>
                                            {!! Form::select('center_first',trans('centers_female'), ['class' => 'form-control']) !!}
                                        </div>
                                        <!--- Second Center Field --->
                                        <div class="form-group">
                                            {!! Form::label('center_second',' المركز الذي ترغب المراقبة فيه كرغبة ثانية:') !!}<br>
                                            {!! Form::select('center_second',trans('centers_female'), ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                        @endif
                                </div>

                                        <div class="row">

                                            <div  class="col col-md-12">
                                                <div class="form-group">
                                                    <label>
                                                        {!! Form::checkbox('agree', '1', null,  ['id' => 'agree']) !!}
                                                        أتعهد بصحة جميع البيانات التي دونتها في هذا الطلب، وأتحمل كامل المسؤولية في حال كانت المعلومات غير صحيحة
                                                    </label>

                                                </div>
                                            </div>
                                        </div>
                                {!! Form::submit(trans('regform.submit'), ['class' => ' col-md-3' , 'name'=> 'YES']) !!}


                            </div>


                        </div>



                        <div id="div_option2" class="form-group">
                            <div class="row">
                                <div class="row">

                                    <div  class="col col-md-12">
                                        <div class="form-group">
                                            <label>
                                                {!! Form::checkbox('agree', '1', null,  ['id' => 'agree']) !!}
                                                أتعهد بصحة جميع البيانات التي دونتها في هذا الطلب، وأتحمل كامل المسؤولية في حال كانت المعلومات غير صحيحة
                                            </label>

                                        </div>
                                    </div>
                                </div>
                                {!! Form::submit(trans('regform.submit'), ['class' => ' col-md-3' , 'name'=> 'NO']) !!}
                            </div>
                        </div>


                        <div id="div_option3" class="form-group">
                            <div class="row">
                                <div class="row">

                                    <div  class="col col-md-12">
                                        <div class="form-group">
                                            <label>
                                                {!! Form::checkbox('agree', '1', null,  ['id' => 'agree']) !!}
                                                أتعهد بصحة جميع البيانات التي دونتها في هذا الطلب، وأتحمل كامل المسؤولية في حال كانت المعلومات غير صحيحة
                                            </label>

                                        </div>
                                    </div>
                                </div>
                                {!! Form::submit(trans('regform.submit'), ['class' => ' col-md-3' , 'name'=> 'NOTSURE']) !!}
                            </div>
                        </div>



                        {!! Form::close() !!}













                    </div>
                </div>
            </div>
        </div>

    </div>
    <script type="text/javascript">


        $(document).ready(function () {
            $('#div_option1').hide();
            $('#div_option2').hide();
            $('#div_option3').hide();
            $('input[name=choose]').prop('checked', false);
        });

    $('input[name=choose]').click(function () {
        if ($('input[name=choose]:checked').val()=="1") {
            $('#div_option2').hide();
            $('#div_option3').hide();
            $('#div_option1').show();
        }
        else if ($('input[name=choose]:checked').val()=="2") {
            $('#div_option1').hide();
            $('#div_option3').hide();
            $('#div_option2').show();
        } else if ($('input[name=choose]:checked').val()=="3") {
            $('#div_option1').hide();
            $('#div_option2').hide();
            $('#div_option3').show();
        } else {
            $('#div_option1').hide();
            $('#div_option2').hide();
            $('#div_option3').hide();
        }
    });

    </script>
    @endsection