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