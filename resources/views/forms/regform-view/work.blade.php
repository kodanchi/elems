<div class="col col-md-6">
    <h4>{{trans('regform.work_details')}}</h4>
    <hr>
    <p>{{trans('regform.qualification')}} : {{$form->qualification}}</p>
    <p>{{trans('regform.major')}} : {{$form->major}}</p>
    <p>{{trans('regform.department')}} : {{$form->department}}</p>
    <p>{{trans('regform.section')}} : {{$form->section}}</p>
    @if($form->is_contact === 0)
        <p>{{trans('regform.employee_ID')}} : {{$form->employee_ID}}</p>
    @else
        <p>{{trans('regform.job_contract')}}</p>
    @endif
    <p>{{trans('regform.job_title')}} : {{$form->job_title}}</p>
    <br/>
</div>