@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-11 col-md-offset-1">
                <div class="panel panel-default">

                    <div class="panel-heading">  {{$student->name}}</div>
                    <div class="panel-body">

                        @include('errors.status')
                        @include('errors.errors')

                        <div class="row">

                        </div>

                        <div class="row">
                            <div class="col col-md-6">
                                <h4 style="	color: #2e6da4">المعلومات الشخصية:</h4>
                                <hr>
                                <p>الاسم باالغة العربية: {{$student->name}}</p>
                                <p>الاسم باللغة الانجليزية: {{$student->nameE}}</p>
                                <p>الجنس: {{$student->sex}}</p>
                                <p>رقم الهوية/الإقامة: {{$student->NID}}</p>
                                <p>رقم الجوال: {{$student->Phone}}</p>
                                <p>الجنسية: {{$student->Nationally}}</p>
                                <p>تاريخ الميلاد:  {{$student->Birth_day}}</p>

                                <br/>
                          </div>
                            <div class="col col-md-6">
                                <h4 style="	color: #2e6da4">المعلومات الثانوية:</h4>
                                <hr>

                                <p>مكان التخرج: {{$student->Graduation_Place}}</p>
                                <p>تاريخ التخرج: {{$student->Graduation_Date}}</p>
                                <p>اسم المدرسة:{{$student->School_name}}</p>
                                <p> النسبة الثانوية: % {{$student->HS_pers}}  </p>
                                <br/>
                            </div>
                        </div>
                        <hr>

                      <div class="row">

                            <div class="col col-md-6">

                                <h4 style="	color: #2e6da4">المرفقات:</h4>


                                <a href="{{asset('storage/'.$student->attachment1)}}" target="_blank" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-paperclip"></span>  &nbsp;  شهادة الثانوية &nbsp;
                                </a>

                                <a href="{{asset('storage/'.$student->attachment2)}}" target="_blank" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-paperclip"></span> &nbsp;  الهوية الوطنية&nbsp;
                                </a>

                                @if($student->attachment3 != NULL)

                                    <a href="{{asset('storage/'.$student->attachment3)}}" target="_blank" class="btn btn-primary">
                                        <span class="glyphicon glyphicon-paperclip"></span> &nbsp; جواز السفر او الرخصة &nbsp;
                                    </a>

                                @endif



                            </div>
                            </div>

                        <hr>
                       <div class="row">
                            <div class="col col-md-6">
                                <h4 style="	color: #2e6da4">{{trans('regform.status')}}:</h4>
                                @if($student->status == 'pending' )
                                        <p style="font-size: large">{{trans('StdInfoStatus.'.$student->status)}} <br>
                                    @elseif($student->status === 'Approved' )
                                        <p style="font-size: large; color: green">{{trans('StdInfoStatus.'.$student->status)}} <br>

                                          @elseif($student->status == 'Reject' )
                                        <p style="font-size: large; color: red">{{trans('StdInfoStatus.'.$student->status)}} <br>
                                            {{('بسبب:'.$student->reason)}}</p>
                                @endif
                                {!! Form::open(['url' => 'cp/students/Info/view/update/', 'method' => 'post','class'=>'newsletter-form' ]) !!}



                                <hr>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        {!! Form::label('status', 'تحديث حالة الطلب') !!}
                                        {!! Form::select('status', array( '' => 'اختر', 'Approved' => 'مقبول', 'Reject' => 'مرفوض') ,null,['class' => 'form-control'] ) !!}

                                        <div id="div_reason" class="form-group">
                                            <!--- hide/show --->
                                            <div class="form-group">
                                                {!! Form::label('reason', 'سبب الرفض:') !!}
                                                <textarea class="form-control" rows="5" name="reason" style="resize:none"></textarea>


                                            </div>
                                        </div>
                                        <br>

                                    </div>
                                    {{ Form::hidden('id', $student->id) }}
                                    {{ Form::hidden('SID', $student->SID) }}
                                    {{ Form::hidden('Email', $student->Email) }}

                                    {!! Form::submit(' تحديث الحالة', ['class' => ' col-md-6']) !!}
                                    <a class="button col-md-6" href="{{ URL::previous() }}">رجوع</a>
                                    {!! Form::close() !!}
                                </div>


                            </div>
                        </div>
                        <hr>
                        <hr>

                            <div class="col-md-6">
                                <a href="{{url('cp/students/Info/edit/'.$student->id)}}" class="button btn btn-default col-md-6"><b>تحديث بيانات الطالب/ـة</b></a>
                            </div>






                    </div>
                </div>
                    <br>
                    <br>



                    <h5 style="float: right"><b>تاريخ التحديث : </b>{{date("D |  j/m/Y | g:i  A",strtotime($student->updated_at))}}</h5>

                </div>
                <br>
        </div>
    </div>

    <script type="text/javascript">


        $('#status').change(function () {
            reason();
            $('#reason').focus();

        });

        function reason() {
            if($('#status').val() === 'Reject'){
                if($('#reason').val() === 'Reject') $('#reason').val('');
                $('#div_reason').show();
            }else {
                $('#reason').val('Reject');
                $('#div_reason').hide();
            }
        }

        reason();

    </script>
    @endsection

