
    <p><a href="{{url('/cp/students/helpdesk/')}}" class="btn btn-default form-control button">{{trans('cp.all_res')}}</a></p>
    <p><a href="{{url('/cp/students/helpdesk/pending')}}" class="btn btn-primary form-control button">{{trans('cp.new_res')}}</a></p>
    <p><a href="{{url('/cp/students/helpdesk/closed')}}" class="btn btn-success form-control button">الطلبات المغلقة</a></p>
    @if(Auth::User()->getRole() == 'admin')
    <p><a href="{{url('/cp/students/helpdesk/requested')}}" class="btn btn-danger form-control button">{{trans('cp.requested_res')}}</a></p>
    @endif
    @if(Auth::User()->getRole() != 'admin')
    <p><a href="{{url('/cp/students/helpdesk/myRequests')}}" class="btn btn-warning form-control button" >{{trans('cp.myRequests')}}</a></p>
    @endif
    <p><a href="{{url('/cp/students/helpdesk/export')}}" class="btn btn-default form-control button">{{trans('cp.export_res')}}</a></p>



