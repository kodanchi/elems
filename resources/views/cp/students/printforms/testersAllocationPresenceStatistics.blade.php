@extends('layouts.app')

@section('content')
    

        <div class="container ">
        <div class="row ">

            @include('errors.errors')
            @include('errors.status')


            <div class="col-md-12 text-center">
                <label style="text-align: center">
                    @if($center!='19')
                       <h4 style="color: red">{{$forms[0]->center}}</h4>
                        <h4>   الفصل الدراسي الثاني لعام 1437 / 1438 هـ</h4>
                        <h4 style="color: red">{{$forms[0]->higri_date}}</h4>
                    @endif
                    @if($center=='19')
                        <h4 style="color: red">DL</h4>
                    @endif
                    <h4>   التاريخ :       {{$date}}</h4>
                </label>

                <br>
                <br>
                @if($center!='19')
                <table class="tableStyle"  style="border:solid;border-color: black;  width:100%" border="1">


                    <tr class="tableStyle" >
                        <th style="background-color: black; color: white ; text-align: center; ">المبنى</th>
                        <th style="background-color: black; color: white ; text-align: center; ">القاعة</th>
                        <th style="background-color: black; color: white ; text-align: center; ">المراقبين</th>
                        <th style="background-color: black; color: white ; text-align: center; ">العدد</th>
                        <th style="background-color: black; color: white ; text-align: center; ">المحضرين</th>
                        <th style="background-color: black; color: white ; text-align: center; ">العدد</th>
                    </tr>
                    <?php $yArray=array(); ?>
                    <?php $x=0; ?>
                    <?php $studentTotal=0; ?>
                        @foreach($forms as $form)
                            <tr class="tableStyle" >
                                <td style="text-align: center">{{$form->building}}</td>
                                <td style="text-align: center">{{$form->room}}</td>
                                <td>
                                    <?php $y=0; ?>
                                    @foreach($testers as $tester)
                                        <?php $form->room=trim($form->room); $tester->room=trim($tester->room);  ?>
                                        <?php $form->building=trim($form->building); $tester->building=trim($tester->building);  ?>
                                        @if($form->room==$tester->room && $form->building==$tester->building)
                                            {{--<p>{{$tester->NID}}</p> <p>{{$tester->tester}}</p> <p>{{$tester->time}}</p> <p>{{$tester->tester_type}}</p>--}}
                                            @if($y%2==0)
                                                <div style="background-color: #d6d7d3">{{$tester->NID}} | {{$tester->tester}} | {{$tester->time}} | {{$tester->tester_type}}
    {{--                                                @if(Auth::User()->getRole() == 'admin')
                                                        <button type="button" class="btn-link" data-toggle="modal" data-target="#exampleModal" data-whatever="{{$tester->id}}"><span class="glyphicon glyphicon-remove-circle  " style="color: rgba(203, 0, 14, 0.92)"></span></button>
                                                    @endif--}}
                                                </div>
                                            @else
                                                <div>{{$tester->NID}} | {{$tester->tester}} | {{$tester->time}} | {{$tester->tester_type}}
                                                    {{--                                                @if(Auth::User()->getRole() == 'admin')
                                                                                                        <button type="button" class="btn-link" data-toggle="modal" data-target="#exampleModal" data-whatever="{{$tester->id}}"><span class="glyphicon glyphicon-remove-circle  " style="color: rgba(203, 0, 14, 0.92)"></span></button>
                                                                                                    @endif--}}
                                                </div>
                                            @endforelse
                                            <?php $y++; ?>
                                        @endif
                                    @endforeach
                                    <?php array_push($yArray, $y); ?>
                                </td>
                                <td style="/*color: red;*/font-size: larger">
                                    {{$y}}
                                </td>
                                <td>
                                    <?php $yy=0; ?>
                                    @foreach($testersPresence as $tester)
                                        <?php $form->room=trim($form->room); $tester->room=trim($tester->room);  ?>
                                        @if($form->room==$tester->room && $form->building==$tester->building)
                                            {{--<p>{{$tester->NID}}</p> <p>{{$tester->tester}}</p> <p>{{$tester->time}}</p> <p>{{$tester->tester_type}}</p>--}}
                                            @if($yy%2==0)
                                                <div style="background-color: #d6d7d3">{{$tester->tester}} | {{$tester->time}}
        {{--                                                @if(Auth::User()->getRole() == 'admin')
                                                        <button type="button" class="btn-link" data-toggle="modal" data-target="#exampleModal" data-whatever="{{$tester->id}}"><span class="glyphicon glyphicon-remove-circle  " style="color: rgba(203, 0, 14, 0.92)"></span></button>
                                                    @endif--}}
                                                </div>
                                            @else
                                                <div>{{$tester->tester}} | {{$tester->time}}
                                                    {{--                                                @if(Auth::User()->getRole() == 'admin')
                                                                                                        <button type="button" class="btn-link" data-toggle="modal" data-target="#exampleModal" data-whatever="{{$tester->id}}"><span class="glyphicon glyphicon-remove-circle  " style="color: rgba(203, 0, 14, 0.92)"></span></button>
                                                                                                    @endif--}}
                                                </div>
                                            @endforelse
                                            <?php $yy++; ?>
                                        @endif
                                    @endforeach
                                </td>
                                <?php $lastElm=0; ?>
                                <?php foreach ($yArray as $elm){
                                    $lastElm=$elm;
                                } ?>
                                {{--@if(in_array($yy,$yArray))--}}
                                @if($yy==$lastElm)
                                    <td style="font-size: larger">
                                        {{$yy}}
                                    </td>
                                @else
                                    <td style="color: red;font-size: x-large">
                                        {{$yy}}
                                    </td>
                                @endif
                            </tr>

                                <?php /*$studentTotal=$studentTotal+$sumArray[$x]; */?>

                            <?php $x++; ?>
                        @endforeach
                    </table>
                <br>
                @endif
                <h3 style="color: red">عام</h3>
                <br>
                <h1>-----------------</h1>
                <h4>المراقبين</h4>
                <h1>-----------------</h1>
                @foreach($testers as $tester)
                    @if(!$tester->room)
                        {{--<p>{{$tester->NID}}</p> <p>{{$tester->tester}}</p> <p>{{$tester->time}}</p> <p>{{$tester->tester_type}}</p>--}}
                        <p>{{$tester->NID}} | {{$tester->tester}} | {{$tester->time}} | {{$tester->tester_type}}
{{--                        @if(Auth::User()->getRole() == 'admin')
                            <button type="button" class="btn-link" data-toggle="modal" data-target="#exampleModal" data-whatever="{{$tester->id}}"><span class="glyphicon glyphicon-remove-circle " style="color: rgba(203, 0, 14, 0.92)"></span></button>
                        @endif--}}
                        </p>
                    @endif
                @endforeach

                <h1>-----------------</h1>
                <h4>المحضرين</h4>
                <h1>-----------------</h1>
                @foreach($testersPresence as $tester)
                    @if(!$tester->room)
                        {{--<p>{{$tester->NID}}</p> <p>{{$tester->tester}}</p> <p>{{$tester->time}}</p> <p>{{$tester->tester_type}}</p>--}}
                        <p>{{$tester->tester}} | {{$tester->time}}
{{--                            @if(Auth::User()->getRole() == 'admin')
                                <button type="button" class="btn-link" --}}{{--data-toggle="modal" data-target="#exampleModal" data-whatever="{{$tester->id}}"--}}{{--><span class="glyphicon glyphicon-remove-circle " style="color: rgba(203, 0, 14, 0.92)"></span></button>
                            @endif--}}
                        </p>
                    @endif
                @endforeach

                {{--<table style="border:solid;border-color: black;  width:100%;  ;" border="1">
                    <tr>
                        <th  style="text-align: center">عدد الحضور</th>
                        <th style="text-align: center" >نموذج 1</th>
                        <th  style="text-align: center">نموذج 2</th>
                        <th style="text-align: center">نموذج 3</th>
                        <th  style="text-align: center">عدد الغياب</th>


                    </tr>
                    <tr>
                        <td height="50">&nbsp;</td>
                        <td height="50">&nbsp;</td>
                        <td height="50">&nbsp;</td>
                        <td height="50">&nbsp;</td>
                        <td height="50">&nbsp;</td>


                    </tr>


                </table>--}}
                <br>


            </div>


        </div>
    </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">إلغاء تعيين المراقب</h4>
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
                                <h5 style="color: red">إن إلغاء تعيين المراقب عملية لا يمكن الرجوع عنها بعد تنفيذها</h5>

                                <?php
                                $newDate=str_replace ( "/" , "D" , $date);
                                //$newDate=urlencode($forms[0]->date);
                                ?>
                                <input type="hidden" disabled="disabled" name="date" id="date" value="{{$newDate}}">
                                <input type="hidden" disabled="disabled" name="center_id" id="center_id" value="{{$center}}">
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

        <script>

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
                document.getElementById('form-id').action = "/cp/printforms/testersAndStatisticsForm/delete/"+recipient+"/"+document.getElementById('center_id').value+"/"+document.getElementById('date').value;
                return true;
            }

        </script>



    @endsection

