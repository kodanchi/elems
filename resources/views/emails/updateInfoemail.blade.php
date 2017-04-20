
<!DOCTYPE html>

<html>
<body>
<div>
    <h4 style="text-align: right;color: #204d74">الرجاء  إعادة الدخول على الرابط التالي لتحديث البيانات </h4>

    <table  style="border:silver;border-color: #204d74; width:100%" border="1">

        <tr style="text-align: right">

            <td> <h4>{{ $reason  }}</h4>  </td>
            <td><h4>بسبب</h4> </td>
        </tr>


        <tr style="text-align: right">
         <td> <a href="{{url('/students/Info/edit/'.$hash->hash)}}" class="button col-md-3">اضغط هنا</a></td>
            <td><h4>الرابط</h4> </td>

        </tr>



    </table>
</div>

</body>
</html>