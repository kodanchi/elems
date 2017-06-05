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
                    <div class="panel-heading">{{trans('LDprogram.task')}}</div>
                    <div class="panel-body">
                        <div class="row">
                        {{--<button onclick="myFunction()">إضافة برنامج جديد</button>--}}
{{--
                        <button type="button" class="btn btn-link" aria-label="Left Align" onclick="myFunction()"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></button>
--}}
                            <a type="button" class="btn-lg btn-sq-lg" aria-label="Left Align" onclick="myFunction()"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true" style="font-size: xx-large; margin: 10px; margin-bottom: 30px"></span></a>
                            <div class="col-md-12" >
                                <div id="myDIV">
                                    {!! Form::open(['url' => '/ld/test/add/task', 'method' => 'post']) !!}

                                        {!! Form::label('name', trans('LDprogram.name')) !!}
                                        <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="font-size: xx-small;color: #b10000"></span>
                                        {!! Form::text('name', null, ['class' => 'form-control', 'required' ]) !!}

                                        {!! Form::label('description', trans('LDprogram.details')) !!}
                                        {!! Form::textarea('description', null, ['class' => 'form-control' , 'style' => 'resize:none']) !!}
                                        <br>

                                        {!! Form::label('percentage', trans('LDprogram.percentage').' %') !!}
                                        {!! Form::input('percentage', 'percentage', null, ['class'=>'form-control percent', 'step' => 'any']) !!}
                                    <br>

                                    {!! Form::hidden('locale', $locale) !!}
                                        {!! Form::hidden('user_id', $systemUserID) !!}
                                        {!! Form::submit(trans('LDprogram.add'), ['class' => 'form-control' ]) !!}

                                    {!! Form::close() !!}

                                    <br>
                                    <br>
                                </div>
                                {{--<div class="col-md-10 col-md-offset-1" >--}}
                                <div class="col-md-12">
                                    <h3>{{trans('LDprogram.taskList')}}</h3>
                                    <br>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                                        <input type="search" class="light-table-filter form-control" data-table="order-table" placeholder="Filter">
                                    </div>
                                    <table class="table order-table table-responsive table-hover  results">
                                        <thead>
                                            <th>{{trans('LDprogram.name')}}</th>
                                            <th>{{trans('LDprogram.details')}}</th>
                                            <th>{{trans('LDprogram.percentage')}}</th>
                                            <th></th>
                                            <th></th>
                                        </thead>
                                        <tbody>
                                            @foreach( $Tasks as  $Task)
                                                <tr>
                                                    <td>{{$Task->name}}</td>
                                                    <td>{{$Task->description}}</td>
                                                    <td>{{$Task->percentage}}</td>
                                                    <td>
                                                        {!! Form::open(['url' => '/ld/test/delete/task', 'method' => 'post']) !!}
                                                            {!! Form::hidden('id', $Task->id) !!}
                                                            {!! Form::hidden('locale', $locale) !!}
                                                            {{--{{ Form::button('<span class="glyphicon glyphicon-remove "></span>', array('class'=>'btn btn-link', 'type'=>'submit' )) }}--}}
                                                            <button type="button" class="btn-link" data-toggle="modal" data-target="#exampleModal" data-whatever="{{$Task->id}}"><span class="glyphicon glyphicon-remove-circle  btn-lg" style="color: rgba(203, 0, 14, 0.92)"></span></button>
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
                    {{ Form::open(array('url' => '/ld/test/delete/task/', 'method' => 'post')) }}
                    {!! Form::hidden('locale', $locale) !!}
                    {!! Form::hidden('user_id', $systemUserID) !!}
                    <div class="form-group">
                        {{--<label  class="col-sm-4 control-label"
                                for="reasonL"><h5>   سبب الرفض  : </h5> </label>

                        <textarea class="form-control" rows="5" id="reason" required style="resize:none"></textarea>--}}

                        <h4 style="color: red">{{trans('LDprogram.confirmation')}}</h4>
                        <h5 style="color: red">{{trans('LDprogram.ProgramDelete')}}</h5>

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