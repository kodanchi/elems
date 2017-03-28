<!DOCTYPE html>

<html>
    <body>
    <div>
        <h4>أهلاً بك في مركز نظام حجز القاعات في عمادة التعليم الإلكتروني و التعليم عن بعد</h4>
        <h3>

           نأسف لقد تم الغاء طلبك في النظام، لطلب حجز القاعة
            {{$info[0]->room_name}}
            من الوقت:
            {{str_replace(substr($info[0]->start_date, 16, 7), '', $info[0]->start_date)}}
            إلى الوقت:
            {{str_replace(substr($info[0]->end_date, 16, 7), '', $info[0]->end_date)}}
        </h3>
        <div >

{{--
            @include('emails.helpContacts')
--}}
        </div>
    </div>
    </body>
</html>