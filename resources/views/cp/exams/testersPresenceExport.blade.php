@extends('layouts.app')

@section('content')


    <div class="container ">
        <div class="row ">


            <table>

                <thead style="padding-bottom: 20px"><tr><td>

                    </td></tr>
                </thead>
            </table>

            <div class="col-md-12 text-center">
                <label style="text-align: center">

                    <h2> كشف تحضير المراقبين</h2><br>
                    <h2>       لمركز         {{$forms[0]->center_name}}  </h2>

                    <h4>   تاريخ البحث:       {{$date}}

                    </h4> </label>




                <table class="tableStyle"  style="border:solid;border-color: black;  width:100%" border="1">


                    <thead class="tableStyle">
                    <tr class="tableStyle" >
                        <th   style="text-align: center ; font-size: large">م</th>
                        <th style="text-align: center ; font-size: large" >رقم الهوية الوطنية / الإقامة </th>
                        <th style="text-align: center ; font-size: large">اسم المراقب</th>
                                           <th  style="text-align: center ; font-size: large">اسم المركز </th>
                        <th  style="text-align: center ; font-size: large">التاريخ </th>


                        </th>
                    </tr>
                    </thead>
                    <tbody class="tableStyle" >
                    <?php $x=1; ?>
                    @foreach($forms as $form)
                        <tr class="tableStyle" >
                            <td  style="text-align: center">{{$x}}</td>
                            <td  style="text-align: center">{{$form->NID}}</td>
                            <td style="text-align: right;"><div style="padding-right: 6px">{{$form->fname}} {{$form->faname}} {{$form->gfaname}} {{$form->lname}}</div></td>

                            <td>{{$form->center_name}}</td>
                            <td>{{$form->date}}</td>

                        </tr>
                    <?php $x++; ?>
                    @endforeach
                    <tbody>
                </table>















                <br>
                <br>




            </div>






        </div>



    </div>




@endsection

