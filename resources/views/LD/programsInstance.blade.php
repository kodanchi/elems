@extends('layoutsLD.app')
@section('content')
    <?php if(App::isLocale('ar')){
        $locale = 'ar';
    }else{
        $locale = 'en';
    }?>
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                @include('errors.errors')
                @include('errors.status')
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('LDprogram.programInstance')}}</div>
                    <div class="panel-body">
                        <div class="row">

                        {{--<button onclick="myFunction()">إضافة برنامج جديد</button>--}}
{{--
                        <button type="button" class="btn btn-link" aria-label="Left Align" onclick="myFunction()"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></button>
--}}
{{--
                            <a type="button" class="btn-lg btn-sq-lg" aria-label="Left Align" onclick="myFunction()"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true" style="font-size: xx-large; margin: 10px; margin-bottom: 30px"></span></a>
--}}


                            <a type="button" class="btn-lg btn-sq-lg" aria-label="Left Align" onclick="myFunction()"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true" style="font-size: xx-large; margin: 10px; margin-bottom: 30px"></span></a>
                            <div class="col-md-12" >
                                <div id="myDIV">
                                    <div class="col-md-12" >

                                        {!! Form::open(['url' => '/ld/test/add/programInstance', 'method' => 'post']) !!}

                                        <div class="col-md-12" >
                                            {!! Form::label('name', trans('LDprogram.name')) !!}
                                            <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="font-size: xx-small;color: #b10000"></span>
                                            {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
                                            <br>
                                        </div>



                                        <div class="col-md-6" >
                                            {!! Form::label('programInstance', trans('LDprogram.programInstance')) !!}
                                            <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="font-size: xx-small;color: #b10000"></span>
                                            <select name="program_id" class="form-control" required>
                                                <option value="" style="direction: ltr"></option>
                                                @foreach($Programs_info as $Program_info)
                                                    <option value="{{ $Program_info->id }}">{{$Program_info->name}}</option>
                                                @endforeach
                                            </select>
                                            <br>
                                        </div>

                                        <div class="col-md-6" >
                                            {!! Form::label('college_coordinator_id', trans('LDprogram.CollegeCoordinatorName')) !!}


                                            <select name="college_coordinator_id" class="form-control" >
                                                <option value="" style="direction: ltr"></option>
                                                @foreach($CollegeCoordinator as $A)

                                                    <option value="{{ $A->id }}">{{$A->fname}} {{$A->lname}}</option>
                                                @endforeach
                                            </select>
                                            <br>
                                        </div>
                                        <div class="col-md-6" >
                                            {!! Form::label('deanship_coordinator_id', trans('LDprogram.DeanshipCoordinatorName')) !!}


                                            <select name="deanship_coordinator_id" class="form-control" >
                                                <option value="" style="direction: ltr"></option>
                                                @foreach($DeanshipCoordinator as $B)
                                                    <option value="{{ $B->id }}">{{$B->fname}} {{$B->lname}}</option>
                                                @endforeach
                                            </select>

                                            <br>
                                        </div>
                                        <div class="col-md-6" >
                                            {!! Form::label('period', trans('LDprogram.period')) !!}
                                            {!! Form::text('period', null, ['class' => 'form-control' , 'style' => 'resize:none']) !!}
                                            <br>
                                        </div>
                                        <div class="col-md-6" >
                                            {!! Form::label('Start date', trans('LDprogram.StartDate')) !!}
                                            <input type="date" name="sDate" class="form-control" value="<?php echo date('Y-m-d'); ?>" />
                                            <br>
                                        </div>
                                        <div class="col-md-6" >
                                            {!! Form::label('End date', trans('LDprogram.EndDate')) !!}
                                            {!! Form::date('eDate', null, ['class' => 'form-control' , 'style' => 'resize:none']) !!}
                                            <br>
                                        </div>
                                        <br>
                                        {!! Form::hidden('locale', $locale) !!}
                                        {!! Form::hidden('user_id', $systemUserID) !!}
                                        {!! Form::submit(trans('LDprogram.add'), ['class' => 'form-control' ]) !!}

                                        {!! Form::close() !!}

                                        <br>
                                        <br>

                                    </div>

                                    <br>
                                    <br>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <h3>{{trans('LDprogram.programInstanceList')}}</h3>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                                    <input type="search" class="light-table-filter form-control" data-table="order-table" placeholder="Filter">
                                </div>
                                <table class="table order-table table-responsive table-hover  results">
                                    <thead>
                                    <th>{{trans('LDprogram.name')}}</th>
                                    <th>{{trans('LDprogram.CollegeCoordinatorName')}}</th>
                                    <th>{{trans('LDprogram.DeanshipCoordinatorName')}}</th>
                                    <th>{{trans('LDprogram.period')}}</th>
                                    <th>{{trans('LDprogram.StartDate')}}</th>
                                    <th>{{trans('LDprogram.EndDate')}}</th>
                                    <th></th>
                                    <th></th>
                                    </thead>
                                    <tbody>
                                    @foreach( $Program_instances as  $Program_instance)
                                        <tr>
                                            <td>{{$Program_instance->name}}</td>
                                            <td>{{$Program_instance->college_coordinator_id}}</td>
                                            <td>{{$Program_instance->deanship_coordinator_id}}</td>
                                            <td>{{$Program_instance->period}}</td>
                                            <td>{{$Program_instance->sDate}}</td>
                                            <td>{{$Program_instance->eDate}}</td>
                                            <td>
                                                {!! Form::open(['url' => '/ld/test/delete/programInstance', 'method' => 'post']) !!}
                                                {!! Form::hidden('id', $Program_instance->id) !!}
                                                {!! Form::hidden('locale', $locale) !!}
                                                {{--{{ Form::button('<span class="glyphicon glyphicon-remove "></span>', array('class'=>'btn btn-link', 'type'=>'submit' )) }}--}}
                                                <button type="button" class="btn-link" data-toggle="modal" data-target="#exampleModal" data-whatever="{{$Program_instance->id}}"><span class="glyphicon glyphicon-remove-circle  btn-lg" style="color: rgba(203, 0, 14, 0.92)"></span></button>
                                                {!! Form::close() !!}
                                            </td>
                                            <td></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">{{trans('LDprogram.Delete')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ Form::open(array('url' => '/ld/test/delete/ProgramsInstance/', 'method' => 'post')) }}
                    {!! Form::hidden('locale', $locale) !!}
                    {!! Form::hidden('user_id', $systemUserID) !!}
                    <div class="form-group">
                        {{--<label  class="col-sm-4 control-label"
                                for="reasonL"><h5>   سبب الرفض  : </h5> </label>

                        <textarea class="form-control" rows="5" id="reason" required style="resize:none"></textarea>--}}

                        <h4 style="color: red">{{trans('LDprogram.confirmation')}}</h4>
                        <h5 style="color: red">{{trans('LDprogram.ProgramInstanceDelete')}}</h5>

                        <?php
                        //$newDate=str_replace ( "/" , "D" , $forms[0]->date);
                        //$newDate=urlencode($forms[0]->date);
                        ?>
                        <input type="hidden" name="idOfForm" id="idOfForm" value="">
                        {{--<input type="hidden" disabled="disabled" name="date" id="date" value="{{$newDate}}">
                        <input type="hidden" disabled="disabled" name="center_id" id="center_id" value="{{$forms[0]->center_id}}">--}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-md" data-dismiss="modal" >{{trans('LDprogram.cancel')}}</button>
                        <button type="submit" value="Submit" class="btn btn-primary btn-md">{{trans('LDprogram.ok')}}</button>
                    </div>
                    {{ Form::close() }}

                </div>
            </div>
        </div>
    </div>

    <script>

        var recipient="";
        $('#exampleModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            recipient = button.data('whatever') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            //modal.find('.modal-title').text('New message to ' + recipient)
            //modal.find('.modal-body input').val(recipient)

            //document.getElementById('form-id').action = "approve/reject/"+recipient+"/"+document.getElementById('reason').value;
            //window.alert("ddddd "+document.getElementById('reason').value)

            var s= document.getElementById('idOfForm');
            s.value = recipient;
            //alert(recipient+' ddd  '+document.getElementById('idOfForm'));

        });

    </script>

        <script>

            $(document).ready(function() { $("#myDIV").hide(); });

            function myFunction() {
                var x = document.getElementById('myDIV');
                if (x.style.display === 'none') {
                    x.style.display = 'block';
                } else {
                    x.style.display = 'none';
                }
            }

        </script>

    <script>

        (function(document) {
            'use strict';

            var LightTableFilter = (function(Arr) {

                var _input;

                function _onInputEvent(e) {
                    _input = e.target;
                    var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
                    Arr.forEach.call(tables, function(table) {
                        Arr.forEach.call(table.tBodies, function(tbody) {
                            Arr.forEach.call(tbody.rows, _filter);
                        });
                    });
                }

                function _filter(row) {
                    var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
                    row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
                }

                return {
                    init: function() {
                        var inputs = document.getElementsByClassName('light-table-filter');
                        Arr.forEach.call(inputs, function(input) {
                            input.oninput = _onInputEvent;
                        });
                    }
                };
            })(Array.prototype);

            document.addEventListener('readystatechange', function() {
                if (document.readyState === 'complete') {
                    LightTableFilter.init();
                }
            });

        })(document);

    </script>


@endsection