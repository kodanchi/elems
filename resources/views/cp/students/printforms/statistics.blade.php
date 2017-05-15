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
                        <img src="{{asset('storage/headerPrint_statistics.JPG')}}">
                    </td></tr>
                </thead>
            </table>

            <div class="col-md-12 text-center">
                <label style="text-align: center">

                    <h2> كشف إحصائيات تسليم الأوراق والحضور والغياب للاختبارات النهائية<br>
                                            مركز
                       <span style="color: red">{{$forms[0]->center}}</span>

                    </h2>
                    <h2>   الفصل الدراسي الثاني لعام 1437 / 1438 هـ</h2>
                    <h2 style="color: red">{{$forms[0]->higri_date}}</h2>
                    <h4>   تاريخ الطباعة:       {{$date}}</h4>
                </label>

                <br>
                <br>

                <table class="tableStyle"  style="border:solid;border-color: black;  width:100%" border="1">


                    <thead class="tableStyle">
                    <tr class="tableStyle" >
                        <th style="background-color: black; color: white ; text-align: center;font-size: large">م</th>
                        <th style="background-color: black; color: white ; text-align: center;font-size: large">اسم المقرر</th>
                        <th style="background-color: black; color: white ; text-align: center;font-size: large">المبنى</th>
                        <th style="background-color: black; color: white ; text-align: center;font-size: large">القاعة</th>
                        <th style="background-color: black; color: white ; text-align: center;font-size: large" colspan="2">عدد الحضور</th>
                        <th style="background-color: black; color: white ; text-align: center;font-size: large">عدد الغياب</th>
                        <th style="background-color: black; color: white ; text-align: center;font-size: large">عدد الأوراق المستلمة</th>
                    </tr>
                    </thead>
                    <tbody class="tableStyle" >
                    <?php $x=0; ?>
                    <?php $studentTotal=0; ?>
                    @foreach($forms as $form)
                        <tr class="tableStyle" >
                            <td style="text-align: center">{{($x+1)}}</td>
                            <td style="text-align: center">{{$form->course_name}}</td>
                            <td style="text-align: center">{{$form->building}}</td>
                            <td style="text-align: center">{{$form->room}}</td>
                            <td style="text-align: center">{{reset($z[$x])}}</td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <?php $studentTotal=$studentTotal+reset($z[$x]); ?>
                        <?php $x++; ?>
                    @endforeach
                    <tr class="tableStyle">
                        <td style="text-align: center" colspan="4">المجموع</td>
                        <td style="text-align: center">{{$studentTotal}}</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tbody>
                    </table>
                <br>
                <br>
                <br>


                <span><h4>ــــــــــــــــ يعبأ من قبل مشرف المركز ــــــــــــــــ</h4></span>
                {{--<table style="border:solid;border-color: black;  width:100%; font-size: large;" border="1">
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

