@extends('layouts.app')
<script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
<link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">
@section('content')

    <div class="row">
        <div class="col-xs-12 col-md-12">
            <table class="table table-condensed table-hover table-bordered">
                <thead>
                <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>John</td>
                    <td>Doe</td>

                </tr>
                <tr>
                    <td>Smith</td>
                    <td>Smith1</td>
                    <td>Smith2</td>
                    <td>Smith3</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">EDIT</h4>
                </div>
                <div class="modal-body">
                    <p><input type="text" disabled readonly style="background-color: white;border: none" class="input-sm" id="txtfname"/></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <script>
        $('table tbody tr  td').on('click',function(){
            $("#myModal").modal("show");
            $("#txtfname").val($(this).closest('tr').children()[3].textContent);
        });
    </script>
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



    @if(isset($done))
        <h1>ssssssssssssssssssssssssssssssss</h1>
        @if($done==true)
            <h1>fdfdfdfddfdf</h1>

        @endif
        <h1>qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq</h1>
        @else
        <h1>iiiiiiiiiiiiiiiiiiiiiiiiiiiii</h1>

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


                            <select name="date" class="form-control selectpicker" id="date" style="width:350px" data-live-search="true">
                                <option value="" style="direction: ltr">اختر التاريخ</option>
                                <?php
                                for ($x = 0; $x < sizeof($dates); $x++) {
                                ?>
                                <option value="{{ $dates[$x]->date }}">{{ $dates[$x]->date}}</option>
                                <?php
                                }
                                ?>
                            </select>
                            <br>
                            <br>

                            <div id="centers" name="centers">
                            </div>
                            <br>

                            <script type="text/javascript">
                                //$('.selectpicker').selectpicker();
                                $('#date').change(function(){
                                    var date = $(this).val();
                                    if(date){
                                        $.ajax({
                                            type:"GET",
                                            url:"{{url('cp/printforms/searches/centers')}}?date="+date,
                                            success:function(res){
                                                if(res){
                                                    $("#center").empty();
                                                    $("#centers").append('<select name="center" id="center" class="form-control selectpicker" style="width:350px" data-live-search="true">');
                                                    var x=0;
                                                    $.each(res,function(key,value){
                                                        if (x==0){
                                                            $("#center").append('<option value="">اختر المركز</option>');
                                                        }
                                                        $("#center").append('<option value="'+key+'">'+value+'</option>');
                                                        x++;
                                                    });
                                                    $("#centers").append('</select>');
                                                    $('#center').selectpicker('refresh');
                                                }else{
                                                    $("#center").empty();
                                                }
                                            }
                                        });

                                    }else{
                                        $("#center").empty();
                                    }
                                });
                            </script>

                            <h5>البحث عن طريق :</h5>
                            <hr style="	border-top: 3px solid #767882">


                            <div class="row">

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