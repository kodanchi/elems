@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-11 col-md-offset-1">
                @include('errors.errors')
                @include('errors.status')
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('warehouse.rooms')}}  | عدد النتائج: {{sizeof($events)}}</div>


                    <div class="panel-body ">



                        <div class="col col-md-12">
                            <table class="table table-stripped table-hover">
                                <thead class="">
                                <th class="text-center">اسم الشخص</th>
                                <th class="text-center">ايميل الشخص</th>
                                <th class="text-center">هاتف الشخص</th>
                                <th class="text-center">{{trans('warehouse.roomsName')}}</th>
                                <th class="text-center">السبب</th>
                                <th class="text-center">من</th>
                                <th class="text-center">إلى</th>
                                <th class="text-center">قبول</th>
                                <th class="text-center">رفض</th>
                                </thead>
                                <tbody>
                                @foreach($events as $event)
                                    <tr class="text-center">
                                        <td>{{$event->guest_name}}</td>
                                        <td>{{$event->guest_email}}</td>
                                        <td>{{$event->phone}}</td>
                                        <td>{{$event->room_name}}</td>
                                        <td>{{$event->purpose}}</td>
                                        <td>{{str_replace(substr($event->start_date, 16, 7), '', $event->start_date)}}</td>
                                        <td>{{str_replace(substr($event->end_date, 16, 7), '', $event->end_date)}}</td>
                                        {{--<td>{{strlen($event->des) > 15 ? substr($event->des,0,15).'...':$event->des}}</td>--}}
                                        <td>
                                            <a href="{{url('cp/warehouse/reservation/approve/accept/'.$event->id)}}">
                                                <span class="glyphicon glyphicon-ok-circle"></span>
                                            </a>
                                        </td>
                                        <td>

                                            <button type="button" class="btn-link" data-toggle="modal" data-target="#exampleModal" data-whatever="{{$event->id}}"><span class="glyphicon glyphicon-remove-circle alert-danger"></span></button>

                                            {{--<button class="btn-link" data-href="cp/warehouse/reservation/approve/reject/{{$event->id}}" data-toggle="modal" data-target="#myModalHorizontal">
                                                <span class="glyphicon glyphicon-remove-circle alert-danger"></span>
                                            </button>--}}

                                        </td>
                                    </tr>
                                @endforeach

                                @if(sizeof($event)==0)
                                    <tr class="text-center">
                                        <td colspan="5">{{trans('warehouse.noRes')}}</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            {{--<div>{{$event->links()}}</div>--}}



                            {{--<div class="modal fade" id="myModalHorizontal" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <button type="button" class="close"
                                                    data-dismiss="modal">
                                                <span aria-hidden="true">&times;</span>
                                                --}}{{--<span class="sr-only">إلغاء</span>--}}{{--
                                            </button>
                                            <h4 class="modal-title" id="myModalLabel">
                                                رفض طلب حجز
                                            </h4>
                                        </div>

                                        <!-- Modal Body -->
                                        <div class="modal-body">

                                            <form class="form-horizontal" role="form" action="cp/warehouse/reservation/approve/reject/5555" method="get">
                                                <div class="form-group">
                                                    <label  class="col-sm-2 control-label"
                                                            for="inputEmail3">سبب الرفض</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control"
                                                               id="inputEmail3" required/>
                                                    </div>
                                                </div>
                                            </form>






                                        </div>

                                        <!-- Modal Footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">
                                                إلغاء
                                            </button>
                                            <button type="submit" class="btn btn-primary">
                                                إرسال
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>--}}




                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="exampleModalLabel">رفض طلب حجز</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="form-id" method="get">
                                                <div class="form-group">
                                                    <label  class="col-sm-4 control-label"
                                                            for="reasonL"><h5>   سبب الرفض  : </h5> </label>

                                                        <textarea class="form-control" rows="5" id="reason" required style="resize:none"></textarea>


                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal" >إلغاء</button>
                                                    <button type="submit" value="Submit" class="btn btn-primary" onclick="return foo();">إرسال</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="col-md-6 newsletter-form">

                            <div class="col-md-6">
                                <a href="{{url('cp/warehouse/reservations')}}" class="button form-control">{{trans('warehouse.back')}}</a>
                            </div>

                        </div>

                        <script >

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
                                //alert("Submit button clicked! "+ "approve/reject/"+recipient+"/"+document.getElementById('reason').value);
                                document.getElementById('form-id').action = "approve/reject/"+recipient+"/"+document.getElementById('reason').value;
                                return true;
                            }


                            $('#editForm').submit( function(e) {
                                e.preventDefault();
                                var currentForm = this;
                                bootbox.confirm({
                                    size: "small",
                                    message: "هل أنت متأكد من التعديل؟",
                                    buttons: {

                                        cancel: {
                                            label: 'إلغاء',
                                            className: 'btn-danger'
                                        },
                                        confirm: {
                                            label: 'نعم',
                                            className: 'btn-success'
                                        }
                                    },
                                    callback: function (result) {
                                        if(result){
                                            currentForm.submit();
                                        }
                                    }
                                });

                            });

                        </script>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection