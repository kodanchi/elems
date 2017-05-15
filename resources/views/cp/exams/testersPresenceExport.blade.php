@extends('layouts.app')

@section('content')


    <div class="container ">
        <div class="row ">
            @include('errors.errors')
            @include('errors.status')
            <table>

                <thead style="padding-bottom: 20px"><tr><td>

                    </td></tr>
                </thead>
            </table>

            <div class="col-md-12 text-center">
                <label style="text-align: center">

                    <h2> كشف تحضير المراقبين</h2><br>
                    @if($forms)
                    <h2>       لمركز         {{$forms[0]->center_name}}  </h2>

                    <h4>   تاريخ البحث:       {{$date}}

                    </h4> </label>
                    @endif



                <table class="tableStyle"  style="border:solid;border-color: black;  width:100%" border="1">


                    <thead class="tableStyle">
                    <tr class="tableStyle" >
                        <th   style="text-align: center ; font-size: large">م</th>
                        <th style="text-align: center ; font-size: large" >رقم الهوية الوطنية / الإقامة </th>
                        <th style="text-align: center ; font-size: large">اسم المراقب</th>
                                           <th  style="text-align: center ; font-size: large">اسم المركز </th>
                        <th  style="text-align: center ; font-size: large">التاريخ </th>
                        <th  style="text-align: center ; font-size: large">الوقت </th>
                        @if(Auth::User()->getRole() == 'admin' )
                            {{--<th  style="text-align: center ; font-size: large">تعديل </th>--}}
                            <th  style="text-align: center ; font-size: large">حذف </th>
                            @endif
                    </tr>
                    </thead>
                    <tbody class="tableStyle" >
                    @if($forms)
                    <?php $x=1; ?>
                    @foreach($forms as $form)
                        <tr class="tableStyle" >
                            <td  style="text-align: center">{{$x}}</td>
                            <td  style="text-align: center">{{$form->NID}}</td>
                            <td style="text-align: right;"><div style="padding-right: 6px">{{$form->fname}} {{$form->faname}} {{$form->gfaname}} {{$form->lname}}</div></td>

                            <td>{{$form->center_name}}</td>
                            <td>{{$form->date}}</td>
                            <td>{{$form->time}}</td>
                            @if(Auth::User()->getRole() == 'admin')
                                {{--<td><a href="{{url('/cp/exams/testersPresenceExportEdit/'.$form->id)}}">
                                        <span class="glyphicon glyphicon-pencil btn-lg"></span>
                                    </a>
                                </td>--}}
                                <td>
                                    <button type="button" class="btn-link" data-toggle="modal" data-target="#exampleModal" data-whatever="{{$form->id}}"><span class="glyphicon glyphicon-remove-circle  btn-lg" style="color: rgba(203, 0, 14, 0.92)"></span></button>
                                </td>
                            @endif
                        </tr>
                    <?php $x++; ?>
                    @endforeach
                    @endif
                    <tbody>
                    @if(sizeof($forms)==0)
                        <tr class="text-center">
                            <td colspan="5">{{trans('warehouse.noRes')}}</td>
                        </tr>
                    @endif
                </table>

                <br>
                <br>

            </div>

        </div>

    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">إلغاء حضور المراقب</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-id" method="get">
                        <div class="form-group">
                            {{--<label  class="col-sm-4 control-label"
                                    for="reasonL"><h5>   سبب الرفض  : </h5> </label>

                            <textarea class="form-control" rows="5" id="reason" required style="resize:none"></textarea>--}}
                            <h4 style="color: red">هل أنت متأكد؟</h4>
                            <h5 style="color: red">إن إلغاء حضور المراقب عملية لا يمكن الرجوع عنها بعد تنفيذها</h5>

                            <?php
                            $newDate=str_replace ( "/" , "D" , $forms[0]->date);
                            //$newDate=urlencode($forms[0]->date);
                            ?>
                            <input type="hidden" disabled="disabled" name="date" id="date" value="{{$newDate}}">
                            <input type="hidden" disabled="disabled" name="center_id" id="center_id" value="{{$forms[0]->center_id}}">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default btn-md" data-dismiss="modal" >إلغاء</button>
                            <button type="submit" value="Submit" class="btn btn-primary btn-md" onclick="return foo();">تنفيذ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script >

        //$(document).ready(function() { $("#center_id").hide(); $("#date").hide();});

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

        })

        function foo()
        {
            //alert( document.getElementById('center_id').value+ ' ' +document.getElementById('date').value);
            //alert("Submit button clicked! "+ "export/delete/"+recipient+"/"+document.getElementById('center_id').value+"/"+document.getElementById('date').value);
            //document.getElementById('form-id').action = "approve/reject/"+recipient+"/"+document.getElementById('reason').value;
            document.getElementById('form-id').action = "/cp/exams/testersPresenceExport/export/delete/"+recipient+"/"+document.getElementById('center_id').value+"/"+document.getElementById('date').value;
            return true;
        }

    </script>

@endsection

