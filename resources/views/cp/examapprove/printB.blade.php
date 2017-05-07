@extends('layouts.PrintB')

@section('content')
    <style type="text/css">


        table.tableStyle {
            page-break-inside: auto;
            font-size: larger;
        }

        tr.tableStyle {
            page-break-inside: avoid;
            page-break-after: auto;
            font-size: larger;
        }

        thead.tableStyle {
            display: table-header-group;
            font-size: larger;
        }

        tfoot.tableStyle {
            display: table-footer-group;
            font-size: larger;
        }

    </style>

        <div class="container ">
        <div class="row ">


            <table>

                <thead style="padding-bottom: 25px"><tr><td>
                        <img src="{{asset('storage/header11.JPG')}}">
                    </td></tr>
                </thead>
            </table>

            <div class="col-md-12 text-center">

                <div class="col-md-12">
                <label style="text-align: center">

                    <h2 style="text-align: center ; border-bottom: 1px solid black;
padding-bottom: 5px;">إثبات حضور للاختبارت النهائية </h2><br>
                        </label>
                    </div>


                        <p style=" text-align: right; font-size: x-large">تشهد عمادة التعليم الالكتروني والتعلم عن بعد بجامعة الإمام عبدالرحمن بن فيصل (جامعة الدمام سابقا)<br>
                            بأن الطالب/ـة  &nbsp;&nbsp;   <b>{{$students[0]->students_name}}</b> &nbsp;&nbsp;
                             رقم هويته  (
                           <b>{{$students[0]->nid}}</b>
                            )


                            ورقمه الجامعي

                            (<b>{{$students[0]->SID}}</b>

                            )

                            قد حضر الاختبارات النهائية حسب المواعيد التالية  :


                        </p>


                <br>
                <table  style="border:solid;border-color: black; width:100%; font-size: larger; text-align: center" border="1">

                    <tr>
                        <th height="50" style="text-align: center; background-color: lightgray">#</th>
                        <th height="50" style="text-align: center; font-size: x-large; background-color: lightgray">اسم المقرر</th>
                        <th   height="50" style="text-align: center ; font-size: x-large ; background-color: lightgray"> اليوم والتاريخ</th>



                    </tr>
                    <?php $x=1; ?>
                    @foreach($students as $student)
                    <tr>
                        <td height="35" style=" font-size: x-large">{{$x}}</td>
                        <td height="35" style=" font-size: x-large">{{$student->des}}</td>
                        <td height="35" style=" font-size: x-large">{{$student->higri_date}}</td>
                    </tr>
                        <?php $x++; ?>
                    @endforeach


                </table>


<br>

                <p style=" font-size: x-large">وقد اعطيت له هذه الإفادة بناء على طلبه ودون أدنى مسؤولية على الجامعة.<br>

                    والله الموفق ،،،
                    <br>




                <div style="float: left">
                <p style=" text-align: center; padding-left: 10px; font-size: x-large">

                    <br>   مشرف عام الاختبارات النهائية للتعليم عن بعد
                    <br>                       وكيل العمادة لشؤون التعلم عن بعد
                    <br>
                    <br>
                    <br>                         د.عبدالله سعيد المريح
            </div>







                </p>







            </div>
        </div>
    </div>

{{--    <table>

        <tfoot><tr><td>
                <img src="{{asset('storage/footer11.JPG')}}">
            </td></tr>
        </tfoot>
    </table >--}}









    @endsection

