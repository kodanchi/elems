<ul class="nav navbar-nav">
    @if(Request::is('cp/form/emr/*') || Request::is('cp/form/emr'))
        <li><a href="{{url('cp/form/emr')}}">{{trans('settings.home')}}</a></li>
    @elseif(Request::is('cp/form/ff/*') || Request::is('cp/form/ff'))
         <li><a href="{{url('cp/form/ff')}}">{{trans('settings.home')}}</a></li>
    @elseif(Request::is('cp/students/conflict/*') || Request::is('cp/students/conflict'))
         <li><a href="{{url('cp/students/conflict')}}">{{trans('settings.home')}}</a></li>
    @elseif(Request::is('cp/students/sp/*') || Request::is('cp/students/sp'))
         <li><a href="{{url('cp/students/sp')}}">{{trans('settings.home')}}</a></li>
    @elseif(Request::is('cp/students/objection/*') || Request::is('cp/students/objection'))
         <li><a href="{{url('cp/students/objection')}}">{{trans('settings.home')}}</a></li>
    @elseif(Request::is('form/emr/*') || Request::is('form/emr'))
        <li><a href="{{url('form/emr/')}}">{{trans('settings.home')}}</a></li>
    @elseif(Request::is('form/facultyform/*') || Request::is('form/facultyform'))
        <li><a href="{{url('form/facultyform/')}}">{{trans('settings.home')}}</a></li>
    @elseif(Request::is('students/conflict/*') || Request::is('students/conflict'))
        <li><a href="{{url('students/conflict/')}}">{{trans('settings.home')}}</a></li>
    @elseif(Request::is('students/sp/*') || Request::is('students/sp'))
        <li><a href="{{url('students/sp/')}}">{{trans('settings.home')}}</a></li>
    @elseif(Request::is('students/objection/*') || Request::is('students/objection'))
        <li><a href="{{url('students/objection/')}}">{{trans('settings.home')}}</a></li>
    @endif
</ul>