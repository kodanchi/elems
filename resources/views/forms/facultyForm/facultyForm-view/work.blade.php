<div class="col col-md-6">
    <h4>{{trans('facultyform.work_details')}}</h4>
    <hr>
    <p>{{trans('facultyform.qualification')}} : {{trans('qualification.'.$form->qualification)}}</p>
    <p>{{trans('facultyform.major')}} : {{$form->major}}</p>
    <p>{{trans('facultyform.department')}} : {{$form->department}}</p>
    <p>{{trans('facultyform.section')}} : {{$form->section}}</p>
    <p>{{trans('facultyform.employee_ID')}} : {{$form->employee_ID}}</p>
    <p>{{trans('facultyform.job_title')}} : {{trans('jobsTitles.'.$form->job_title)}}</p>
    <br/>
</div>