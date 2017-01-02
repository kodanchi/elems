<!DOCTYPE html>

        <html>
<body>
<div class="col-md-12 ">
    <h4>{{trans('conflict.fid')}}: {{$form->fid}}</h4>

    <hr>

    <div class="row">
        <div class="col-md-6">
            <h5>{{trans('objection.NID')}}: {{$student->nid}} </h5>
        </div>

        <div class="col-md-6">
            <h5>{{trans('objection.sid')}}: {{$student->sid}} </h5>
        </div>

        <div class="col-md-6">
            <h5>{{trans('objection.name')}}: {{$student->name}} </h5>
        </div>


        <div class="col-md-6">
            <h5>{{trans('objection.gender')}}: {{trans('studentGender.'.$student->gender)}}</h5>
        </div>

    </div>

    <hr>
    <h4>{{trans('objection.con_des')}}</h4>
    <div class="row">

        <div class="col-md-6">
            <h5>{{trans('objection.course_name')}}: {{$course->des}}</h5>
        </div>

        <div class="col-md-6">
            <h5>{{trans('objection.course_class')}}: {{$course->class_id}}</h5>
        </div>


        <div class="col-md-6">
            <h5>{{trans('objection.course_ins_name')}}: {{$course->name}}</h5>
        </div>


        <div class="col-md-6">
            <h5>{{trans('objection.exam_date')}}: {{$course->date}} - الموافق
                {{$course->higri_date}}</h5>
        </div>

        <div class="col-md-6">
            <h5>{{trans('objection.paper')}}: {{$form->paper}} </h5>
        </div>
    </div>

    <div class="row">
        <div class="col col-md-6">
            <h5>{{trans('objection.reason')}}: {{$form->reason}}</h5>

        </div>
    </div>


    <hr>
    <h4>{{trans('objection.con_status')}}</h4>
    <div class="row">
        <div class="col-md-12">
            <h5>{{trans('objection.con_status')}}: {{$form->status}}</h5>
        </div>
        <div class="col-md-12">
            <h5>{{trans('objection.des')}}: {{$form->description}}</h5>
        </div>
    </div>
<h4>الرجاء الدخول على الرابط التالي لمعرفة حالة الطلب: </h4>
    <a href="{{url('/students/objection/view/'.$form->fid.'/'.$form->SID)}}" class="button col-md-3">معرفة حالة الطلب</a>
</div>
</body>
</html>