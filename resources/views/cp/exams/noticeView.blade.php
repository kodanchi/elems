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

                    <h2> كشف الملاحظات على الطلاب </h2><br>


                    </h4> </label>




                <table class="tableStyle"  style="border:solid;border-color: black;  width:100%" border="1">


                    <thead class="tableStyle">
                    <tr class="tableStyle" >
                        <th   style="text-align: center ; font-size: large">م</th>
                        <th style="text-align: center ; font-size: large" >الرقم الجامعي </th>
                        <th style="text-align: center ; font-size: large">اسم الطالب</th>
                                           <th  style="text-align: center ; font-size: large">اسم المركز </th>

                        <th  style="text-align: center ; font-size: large">التاريخ </th>
                        <th  style="text-align: center ; font-size: large">نوع المخالفة </th>
                        <th  style="text-align: center ; font-size: large">الشرح </th>

                            <th  style="text-align: center ; font-size: large">المرفقات </th>



                    </tr>
                    </thead>
                    <tbody class="tableStyle" >
                    @if($notices)
                    <?php $x=1; ?>
                    @foreach($notices as $notice)
                        <tr class="tableStyle" >
                            <td  style="text-align: center">{{$x}}</td>
                            <td  style="text-align: center">{{$notice->SID}}</td>
                            <td style="text-align: right;"><div style="padding-right: 6px">{{$notice->name}}</div></td>

                            <td>{{$notice->center_name}}</td>
                            <td>{{$notice->higri_date}}</td>
                            <td>{{trans('notice.notice.'.$notice->notice)}}</td>
                            <td>{{$notice->comment}}</td>

                            @if($notice->attach != NULL)
                            <td>

                                <a href="{{asset('storage/'.$notice->attach)}}" target="_blank"  style="color: blue;">
                                    &nbsp;   انظر للمرفقات&nbsp;
                                </a>
                            </td>

                                @else

                                <td>لاتوجد مرفقات</td>



                            @endif

                            <?php $x++; ?>
                            @endforeach
                            @endif
                        </tr>

                </table>
                <br>
                <br>


            </div>
            <br>
            <br>

        </div>

    </div>


@endsection

