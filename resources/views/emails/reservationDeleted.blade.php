<!DOCTYPE html>

<html>
    <body>
    <div>
        <h4 style="text-align: right;color: #204d74">أهلاً بك في مركز نظام حجز القاعات في عمادة التعليم الإلكتروني و التعليم عن بعد</h4>
        <h4 style="text-align: right;color: red">  نأسف لقد تم الغاء طلبك في النظام، لطلب حجز القاعة</h4>

        <table  style="border:solid;border-color: #204d74; width:100%" border="1">

            <tr style="text-align: right">

                <td>   {{$info[0]->room_name}}</td>
                <td>القاعة</td>
            </tr>
            <tr style="text-align: right">
                <td>   {{str_replace(substr($info[0]->start_date, 16, 7), '', $info[0]->start_date)}}</td>
                <td>  من الوقت</td>

            </tr>
            <tr style="text-align: right">
                <td>{{str_replace(substr($info[0]->end_date, 16, 7), '', $info[0]->end_date)}}</td>
                <td>إلى الوقت</td>

            </tr>



      </table>
    </div>

    </body>
</html>