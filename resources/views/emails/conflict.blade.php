<!DOCTYPE html>

        <html>
<body>
<div class="col-md-12 ">
    <h4>{{trans('conflict.fid')}}: {{$form->fid}}</h4>

    <hr>

    <div class="row">
        <div class="col-md-6">
            <h5>{{trans('conflict.sid')}}: {{$form->SID}} </h5>
        </div>

        <div class="col-md-6">
            <h5>{{trans('conflict.name')}}: {{$form->name}} </h5>
        </div>


        <div class="col-md-6">
            <h5>{{trans('conflict.gender')}}: {{trans('studentGender.'.$form->gender)}}</h5>
        </div>

    </div>

    <hr>
    <h4>{{trans('conflict.con_des')}}</h4>
    <div class="row">

        <div class="col-md-6">
            <h5>{{trans('conflict.low_lvl_first_subject')}}: {{$form->low_lvl_first_subject}}</h5>
        </div>

        <div class="col-md-6">
            <h5>{{trans('conflict.first_subject')}}: {{$form->first_subject}}</h5>
        </div>


        <div class="col-md-6">
            <h5>{{trans('conflict.conflict_date')}}: {{$form->conflict_date}}</h5>
        </div>
    </div>
    <hr>
    <h4>{{trans('conflict.con_status')}}</h4>
    <div class="row">
        <div class="col-md-12">
            <h5>{{trans('conflict.con_status')}}: {{trans('status.'.$form->status)}}</h5>
        </div>
        <div class="col-md-12">
            <h5>{{trans('conflict.des')}}: {{$form->description}}</h5>
        </div>
    </div>
<h4>الرجاء الدخول على الرابط التالي لمعرفة حالة الطلب: </h4>
    <a href="{{url('/students/conflict/view/'.$form->fid.'/'.$form->SID)}}" class="button col-md-3">معرفة حالة الطلب</a>
</div>
</body>
</html>