<!DOCTYPE html>

        <html>
<body>
<div class="col-md-12 ">
    <h4>{{trans('conflict.fid')}}: {{$form->fid}}</h4>

    <hr>

    <div class="row">
        <div class="col-md-6">
            <h5>{{trans('sp.NID')}}: {{$student->nid}} </h5>
        </div>

        <div class="col-md-6">
            <h5>{{trans('sp.sid')}}: {{$student->sid}} </h5>
        </div>

        <div class="col-md-6">
            <h5>{{trans('sp.name')}}: {{$student->name}} </h5>
        </div>


        <div class="col-md-6">
            <h5>{{trans('sp.gender')}}: {{trans('studentGender.'.$student->gender)}}</h5>
        </div>

    </div>

    <hr>

    @if($form->attach_file !='null')

        <a href="{{asset('storage/'.$form->attach_file)}}" target="_blank" class="btn btn-info">
            <span class="glyphicon glyphicon-paperclip"></span> {{trans('sp.view_attach')}}
        </a>

    @endif
    </div>


    <hr>
    <h4>{{trans('sp.con_status')}}</h4>
    <div class="row">
        <div class="col-md-12">
            <h5>{{trans('sp.con_status')}}: {{$form->status}}</h5>
        </div>
        <div class="col-md-12">
            <h5>الموضوع: {{$form->subject}}</h5>
        </div>
        <div class="col-md-12">
            <h5>{{trans('sp.des')}}: {{$form->des}}</h5>
        </div>
    </div>
<h4>الرجاء الدخول على الرابط التالي لمعرفة حالة الطلب: </h4>
    <a href="{{url('/helpdesk/view/'.$form->fid.'/'.$student->sid)}}" class="button col-md-3">معرفة حالة الطلب</a>
</div>
</body>
</html>