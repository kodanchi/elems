
    <p><a href="{{url('/cp/students/sp/')}}" class="btn btn-default form-control button">{{trans('cp.all_res')}}</a></p>
    <p><a href="{{url('/cp/students/sp/pending')}}" class="btn btn-primary form-control button">{{trans('cp.new_res')}}</a></p>
    <p><a href="{{url('/cp/students/sp/approved')}}" class="btn btn-success form-control button">{{trans('cp.approved_res')}}</a></p>
    <p><a href="{{url('/cp/students/sp/rejected')}}" class="btn btn-danger form-control button">{{trans('cp.rejected_res')}}</a></p>
    <p><a href="{{url('/cp/students/sp/export')}}" class="btn btn-danger form-control button">{{trans('cp.export_res')}}</a></p>
    @if(Auth::User()->getRole() == 'admin')
        <p><a href="{{url('/cp/students/sp/requested')}}" class="btn btn-danger form-control button">{{trans('cp.requested_res')}}</a></p>
        @endif
