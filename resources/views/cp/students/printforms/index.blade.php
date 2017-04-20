@extends('layouts.app')
<script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
<link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">
@section('content')
    <!--formden.js communicates with FormDen server to validate fields and submit via AJAX -->

    <!-- Special version of Bootstrap that is isolated to content wrapped in .bootstrap-iso -->

    <!--Font Awesome (added because you use icons in your prepend/append)-->
    <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />
    <style>
        .datepicker,
        .table-condensed {
            margin-right: 200px;
            width: 300px;
            height:300px;
        }
    </style>
    <!-- HTML Form (wrapped in a .bootstrap-iso div) -->
    <div class="bootstrap-iso col-sm-offset-2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="form-group ">
                            <label class="control-label col-sm-2 requiredField" for="d">
                                Date
                            </label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    {{--<div class="input-group-addon">
                                        <i class="fa fa-calendar">
                                        </i>
                                    </div>--}}
                                    <input class="form-control" id="d" name="d" placeholder="MM/DD/YYYY" type="text" readonly/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                                <input name="_honey" style="display:none" type="text"/>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Extra JavaScript/CSS added manually in "Settings" tab -->
    <!-- Include jQuery -->

    <!-- Include Date Range Picker -->

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

    <script>
        $(document).ready(function(){
            var date_input=$('input[name="d"]'); //our date input has the name "date"
            var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
            date_input.datepicker({
                format: 'mm/dd/yyyy',
                container: container,
                todayHighlight: true,
                autoclose: true,
            })
        })
    </script>
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
    @if(isset($done))
        <h1>ssssssssssssssssssssssssssssssss</h1>
        @if($done==true)
            <h1>fdfdfdfddfdf</h1>
            <div id="spinner" style="z-index: 500;display: none">
                <img id="img-spinner" src="{{asset('storage/spinner.gif')}}" alt="loading..." height="50 px" width="50 px">
            </div>
        @endif
        <h1>qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq</h1>
        @else
        <h1>iiiiiiiiiiiiiiiiiiiiiiiiiiiii</h1>
        <div id="spinner" style="z-index: 500;display: none">
            <img id="img-spinner" src="{{asset('storage/spinner.gif')}}" alt="loading..." height="50 px" width="50 px">
        </div>
    @endforelse
        <h1>52524253</h1>
    <div class="container ">
        <div class="row ">
            <div class="col-md-12">
                @include('errors.errors')
                @include('errors.status')
                <div class="panel panel-default">

                    <div class="panel-heading"> تصدير كشوفات الطلاب</div>

                    <div class="panel-body ">



                        <div>
            {!! Form::open(['url' => '/cp/printforms/search', 'method' => 'post', 'files' => true ,'class'=>'newsletter-form' ]) !!}

                            <h5>البحث عن طريق :</h5>
                            <hr style="	border-top: 3px solid #767882">


                            <div class="row">
                           <div class="col col-md-5">
                               {!! Form::label('date', '  الوقت والتاريخ:') !!}
                               {!! Form::date('date', null, ['class' => 'form-control', 'required']) !!}
                                </div>
{{--<h4>text here</h4>--}}


<br>
                                <div class="row">
                                    <div class="col col-md-5">

                                    {!! Form::submit(trans('بحث'), ['class' => ' col-md-3', 'onclick' => 'myFunction()']) !!}


                            {!! Form::close() !!}



                        </div> </div></div>




                    </div>
                </div>
            </div>
        </div>
    </div>


        <script>
            function myFunction(){
                //alert("ddd");
                document.getElementById("spinner").style.display = "block";
            }
/*            $('#spinner').show();
            document.getElementById("spinner").style.display = "block";
            $('#spinner').hide();*/
        </script>


            <script type="text/javascript">
                $(document).ready(function() {
                    $('select[name="centers"]').on('change', function() {
                        var center_id = $(this).val();
                        if(center_id) {
                            $.ajax({
                                url: '/cp/printforms/ajax/'+center_id,
                                type: "GET",
                                dataType: "json",
                                success:function(data) {



                                    $('select[name="room"]').empty();
                                    $.each(data, function(key, value) {
                                        $('select[name="room"]').append('<option value="'+ value['room'] +'">'+ value['room'] +'</option>');
                                    });

                                }
                            });
                        }else{
                            $('select[name="room"]').empty();
                        }
                    });
                });
            </script>
</div>
    @endsection