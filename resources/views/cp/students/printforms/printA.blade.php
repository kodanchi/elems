@extends('layouts.PrintA4')

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

                <thead style="padding-bottom: 20px"><tr><td>
                        <img src="{{asset('storage/headerPrint.JPG')}}">
                    </td></tr>
                </thead>
            </table>

            <div class="col-md-12 text-center">
                <label style="text-align: center">

                    <h2> كشف الحضور والغياب للاختبارات النهائية<br>
                        مركز
                        <span style="color: red">{{$forms[0]->center}}</span>
                                            مبنى
                       <span style="color: red">{{$forms[0]->building}}</span>
                        القاعة
                        (<span style="color: red">{{$forms[0]->room}}</span>)
                    </h2>
                    <h2>   الفصل الدراسي الثاني لعام 1437 / 1438 هـ</h2>
                    <h2 style="color: red">{{$forms[0]->higri_date}}</h2>
                    <h4>   تاريخ الطباعة:       {{$date}}</h4>
                </label>


                <table  style="border:solid;border-color: black; width:100%; font-size: larger;" border="1">

                    <tr>
                        <th  colspan="3" style="background-color: black; color: white ; text-align: center;font-size: larger">اسم المقرر</th>
                        <th style="background-color: black; color: white ; text-align: center;font-size: larger">الوقت</th>
                        <th colspan="2" style="background-color: black; color: white ; text-align: center;font-size: larger">مدرس المقرر</th>

                    </tr>


                    <tr>
                            <td colspan="3" style="font-size: larger; font-weight: bold">{{$forms[0]->course_name}}</td>
                            <td style="font-size: larger; font-weight: bold">{{$forms[0]->time}}</td>
                            <td colspan="2" style="font-size: larger; font-weight: bold">{{$forms[0]->instructor}}</td>

                    </tr>

                {{--    <tr> <th colspan="6" style="text-align: center;font-size: larger">المراقبــــــــــــــــــــــــــــــــــــــــــــــــين</th> </tr>
                    <tr>

                    <th colspan="2"  style="background-color: black; color: white ; text-align: center;font-size: larger">اسم المراقب (1)</th>
                    <th style="background-color: black; color: white ; text-align: center;font-size: larger">التوقيع</th>
                    <th colspan="2" style="background-color: black; color: white ; text-align: center;font-size: larger">اسم المراقب (2)</th>
                    <th style="background-color: black; color: white ; text-align: center;font-size: larger">التوقيع</th>

                    </tr>


                    <tr>
                        <td colspan="2">&nbsp;</td>
                        <td></td>
                        <td colspan="2">&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>--}}

                </table>
                <br>
                <br>




                <table class="tableStyle"  style="border:solid;border-color: black;  width:100%" border="1">


                    <thead class="tableStyle">
                    <tr class="tableStyle" >
                        <th   style="text-align: center ; font-size: large">م</th>
                        <th style="text-align: center ; font-size: large" >الرقم الأكاديمي</th>
                        <th  style="text-align: center ; font-size: large">السجل المدني</th>
                        <th style="text-align: center ; font-size: large">اسم الطالــــــــــــب</th>
                        <th  style="text-align: center ; font-size: large">رقم النموذج</th>

                        <th  style="text-align: center ; font-size: large">التــــــــــوقيع</th>
                    </tr>
                    </thead>
                    <tbody class="tableStyle" >
                    <?php $x=1; ?>
                    @foreach($forms as $form)
                    <tr class="tableStyle" >
                        <td  style="text-align: center">{{$x}}</td>
                        <td  style="text-align: center">{{$form->sid}}</td>
                        <td>{{$form->nid}}</td>
                        <td style="text-align: right;"><div style="padding-right: 6px">{{$form->Sname}}</div></td>
                        <td >&nbsp;</td>

                        <td ><div style="background-color: white; min-height: 30px"></div>&nbsp;</td>
                    </tr>
                        <?php $x++; ?>
                    @endforeach
                    <tbody>
                    </table>
                <br>
                <br>
                <br>
                <br>
                <br>


                <span><h4>ــــــــــــــــ يعبأ من قبل مسؤول اللجنة ــــــــــــــــ</h4></span>
                <table style="border:solid;border-color: black;  width:100%; font-size: large;" border="1">
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


                </table>
                <br>
                <br>
                <br>
                <br>
                <br>




















            <table  style="border:solid;border-color: black; width:100%; font-size: larger;" border="1">

                <tr>
                    <th  colspan="" style="background-color: black; color: white ; text-align: center;font-size: larger">م</th>
                    <th  colspan="" style="background-color: black; color: white ; text-align: center;font-size: larger">المراقب</th>
                    {{--<th style="background-color: black; color: white ; text-align: center;font-size: larger">الحضور</th>
                    <th colspan="" style="background-color: black; color: white ; text-align: center;font-size: larger">التوقيع</th>
                    <th colspan="" style="background-color: black; color: white ; text-align: center;font-size: larger">الانصراف</th>--}}
                    <th colspan="" style="background-color: black; color: white ; text-align: center;font-size: larger">التوقيع</th>
                </tr>

                <?php $y=1; ?>
                @foreach($testers as $tester)
                    <tr class="tableStyle" >
                        <td  style="text-align: center">{{$y}}</td>
                        <td colspan="" style="font-size: larger; font-weight: bold">{{$tester->fname}} {{$tester->faname}} {{$tester->gfaname}} {{$tester->lname}}</td>
                        {{--<td style="font-size: larger; font-weight: bold">&nbsp;</td>
                        <td colspan="" style="font-size: larger; font-weight: bold">&nbsp;</td>
                        <td style="font-size: larger; font-weight: bold">&nbsp;</td>--}}
                        <td colspan="" style="font-size: larger; font-weight: bold">&nbsp;</td>
                    </tr>
                    <?php $y++; ?>
                @endforeach


            </table>



                <br>
                <br>




                <div style="text-align: center" class="row col-md-8">

                    <div class="col-md-4" style="float: right">
                        <h3>اسم مشرف المركز<br>
                            <br>
                            <br>
                            ................................</h3>
                    </div>

                    <div class="col-md-4" style="float: left">

                        <h3>  التوقيـــــــــــــــــع
                            <br>
                            <br>
                            <br>
                            ................................</h3>
                    </div>
                </div>


            </div>






        </div>



    </div>

    {{--<footer>

        <img src="{{asset('storage/footerPrint.JPG')}}">

    </footer>--}}
    {{--<p style="page-break-after:always; color: white">
        .
    </p>--}}
    {{--<div style="padding: 500px; background-color: red">yytutututtuuujm</div>--}}



    @endsection

