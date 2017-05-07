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
                       <span style="color: red">{{$forms[0]->center_name}}</span>

                    </h2>
                    <h2>   الفصل الدراسي الأول لعام 1437 / 1438 هـ</h2>
                   {{-- <h2 style="color: red"></h2>--}}

                    <h2 style="color: red">({{$forms[0]->date}}) | {{$forms[0]->higri_date}}</h2>

                </label>


                <table  style="border:solid;border-color: black; width:100%; font-size: larger;" border="1">


                 <tr>
                     <th colspan="7" style="text-align: center;font-size: larger">المراقبــــــــــــــــــــــــــــــــــــــــــــــــين</th>
                 </tr>
                    <tr>
                    <th style="background-color: black; color: white ; text-align: center;font-size: larger">م</th>
                    <th style="background-color: black; color: white ; text-align: center;font-size: larger">اسم المراقب </th>
                    <th style="background-color: black; color: white ; text-align: center;font-size: larger">المهمة</th>
                    <th style="background-color: black; color: white ; text-align: center;font-size: larger">الحضور</th>
                    <th colspan="" style="background-color: black; color: white ; text-align: center;font-size: larger">التوقيع</th>
                    <th colspan="" style="background-color: black; color: white ; text-align: center;font-size: larger">الانصراف</th>
                    <th style="background-color: black; color: white ; text-align: center;font-size: larger">التوقيع</th>
                    </tr>


                <?php $x=1; ?>
                    @foreach($forms as $form)
                        <tr class="tableStyle" >
                            <td  style="text-align: center">{{$x}}</td>
                            <td  style="text-align: center">{{$form->fname}} {{$form->faname}} {{$form->gfaname}} {{$form->lname}}</td>
                            <td  style="text-align: center">{{trans('testersAllocation.testers_type.'.$form->tester_type)}}</td>
                            <td style="font-size: larger; font-weight: bold">&nbsp;</td>
                            <td colspan="" style="font-size: larger; font-weight: bold">&nbsp;</td>
                            <td style="font-size: larger; font-weight: bold">&nbsp;</td>
                            <td >&nbsp;</td>

                        </tr>
                        <?php $x++; ?>
                    @endforeach

                </table>
                <br>
                <br>

                <br>
                <br>
                <br>
                <br>




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

