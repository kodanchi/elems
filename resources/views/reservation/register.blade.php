@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-12">
                @include('errors.errors')
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('warehouse.newGuest')}} </div>


                    <div class="panel-body newsletter-form ">

                        {!! Form::open(['url' => 'reservation/schedule/', 'method' => 'post']) !!}





                            <div class="row">
                                <div class="col-md-12">
                                    <!--- Name Field --->
                                    <div class="form-group">

                                        <h5>{!! Form::label('emp_name', 'الاسم :') !!}{{$guest->name}}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <hr>

                                <div class="col-md-6">
                                    <!--- Date Field --->
                                    <div class="form-group">
                                        {!! Form::label('date', 'التاريخ:') !!}
                                        {!! Form::date('date', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('res', 'الوقت:') !!}
                                        <div id="timeSlider"></div>

                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <!--- Purpose Field --->
                                    <div class="form-group">
                                        {!! Form::label('purpose', 'سبب الحجز:') !!}
                                        {!! Form::textarea('purpose', null, ['class' => 'form-control']) !!}
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <?php if (isset($resArr)){ ?>
                                    <div class="col-md-12">
                                            <hr>
                                            <h5>أختر القاعة المناسبة لك عن طريق اختيار ما تحتاجه من موارد في القاعة</h5>
                                    </div>

                                    <div class="col-md-6">
                                        <!--- Resources Field --->

                                    <div class="form-group">

                                        {!! Form::label('res', 'مصادر:') !!}
                                        {{ Form::select('res[]', $resArr, null,['class' => 'form-control selectpicker', 'id'=>'resDropdown', 'data-live-search'=> 'true','multiple'=>'multiple'])}}

                                    </div>

                                    </div>
                                        <div class="col-md-6">
                                <?php }
                                else {?>
                                    <div class="col-md-12">
                                <?php }?>
                                        <table class="table table-responsive table-stripped table-hover" id="roomsTable">
                                        <thead>
                                        <th>اسم القاعة</th>
                                        <th>الاستيعابية</th>
                                        <th>اختر</th>
                                        </thead>
                                        <tbody>
                                        @foreach($rooms as $room)
                                            <tr>

                                                <td>
                                                    {{$room->name}}
                                                    <div class="resources">@foreach($roomsArr[$room->id] as $device){{$device->type}} ### @endforeach</div>
                                                </td>
                                                <td>{{$room->max}}</td>

                                                <th scope="col">
                                                    <label>
                                                        {!! Form::radio('rooms', $room->id, null,  ['id' => 'rooms']) !!}
                                                    </label>
                                                </th>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        
                        <div class="row">
                            <div class="col-md-2">
                                {!! Form::hidden('gid', $guest->id, ['id' => 'id']) !!}
                                {!! Form::hidden('fromH', '9', ['id' => 'fromH']) !!}
                                {!! Form::hidden('fromM', '30', ['id' => 'fromM']) !!}
                                {!! Form::hidden('toH', '14', ['id' => 'toH']) !!}
                                {!! Form::hidden('toM', '0', ['id' => 'toM']) !!}
                                {!! Form::submit('ارسال', ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}

                    </div>

                    <script >
                        $(document).ready(function () {

                            //var minFrom = new Date(new Date().setTime($('#from').val()));
                           // var maxTo = new Date(new Date().setTime($('#to').val()));
                            /*$("#timeSlider").dateRangeSlider("max", new Date(2012, 1, 1,11,0,0,0));
                            $("#timeSlider").dateRangeSlider("min", new Date(2012, 1, 1,9,0,0,0));*/

                            $("#timeSlider").dateRangeSlider("values", new Date(2017, 1, 1,$('#fromH').val(),$('#fromM').val(),0,0),
                                    new Date(2017, 1, 1,$('#toH').val(),$('#toM').val(),0,0));

                            //console.log('date: '+ maxTo);
                        });
                        $("#timeSlider").dateRangeSlider({
                            /*range: {
                                min: new Date(2017, 1, 1,10,0,0,0),
                                max: new Date(2017, 1, 1,11,0,0,0)
                            }*/
                            bounds:{
                                min: new Date(2017, 1, 1,9,0,0,0),
                                max: new Date(2017, 1, 1,20,0,0,0)
                            },
                            step: {
                                minutes: 15
                            },
                            formatter:function(val){
                                /*var days = val.getDate(),
                                        month = val.getMonth() + 1,
                                        year = val.getFullYear();*/
                                var hours = val.getHours(),
                                        minutes = val.getMinutes();
                                if (hours > 12) {
                                    hours -= 12;
                                    return hours + ":" + minutes + " PM" ;
                                } else if (hours === 0) {
                                    hours = 12;
                                    return hours + ":" + minutes + " AM" ;
                                }else if (hours === 12) {
                                    hours = 12;
                                    return hours + ":" + minutes + " PM" ;
                                }else {
                                    return hours + ":" + minutes + " AM" ;
                                }

                            }
                        });
                        $("#timeSlider").bind("valuesChanged", function(e, data){

                            console.log("Values just changed. min: " + data.values.min + ", time:"+ Date.parse(data.values.min)+" max: " + data.values.max);
                            $('#fromH').val(data.values.min.getHours());
                            $('#fromM').val(data.values.min.getMinutes());
                            $('#toH').val(data.values.max.getHours());
                            $('#toM').val(data.values.max.getMinutes());

                        });
                    </script>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="application/javascript">

        $('#resDropdown').change(function() {
            var filtre_transports = Array();

            $('#resDropdown').children('option').filter(':selected').each(
                    function(i)   {
                        filtre_transports.push($(this).text());
                    }
            );

            $('#roomsTable tbody tr').show();

            $('#roomsTable tbody tr').each(function() {
                var transports_matches = true;
                var ligne_transports =
                        $(this).find('div').eq(0).text().split(' ### ');
                console.log('inside TD: '+$(this).find('div').eq(0).text().split(' ### '));


                $.each(filtre_transports, function() {

                    var filtre = this;
                    var filtreOk = false;

                    $.each(ligne_transports, function() {
                        if (String(filtre) == String(this)) {
                            filtreOk = true;
                            return false;
                        }
                    });

                    if (!filtreOk) {
                        transports_matches = false;
                        return false;
                    }
                });

                $(this).css('display', (transports_matches) ? '' : 'none');
            });
        });

        $('#roomsTable tr').click(function() {
            $(this).find('th input:radio').prop('checked', true);
        })
        $('#brand').change(function () {
           brandsOther();


        });
        function brandsOther() {
            if($('#brand').val() === 'other'){
                if($('#other_brand').val() === 'other') $('#other_brand').val('');
                $('#div_other_brand').show();
                $('#other_brand').focus();
            }else {
                $('#other_brand').val('other');
                $('#div_other_brand').hide();
            }
        }

        $(document).ready(function () {

            brandsOther();
            $('.resources').hide();


        });
    </script>

    @endsection