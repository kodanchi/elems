<ul class="nav navbar-nav">
    @if(Request::is('cp/form/emr/*') || Request::is('cp/form/emr'))
        <li><a href="{{url('cp/form/emr')}}"><span class="glyphicon glyphicon-home"></span> &nbsp; {{trans('settings.home')}}</a></li>
    @elseif(Request::is('helpdesk/*') || Request::is('helpdesk'))
         <li><a href="{{url('helpdesk')}}"><span class="glyphicon glyphicon-home"></span> &nbsp; {{trans('settings.home')}}</a></li>
    @elseif(Request::is('cp/students/helpdesk/*') || Request::is('cp/students/helpdesk'))
         <li><a href="{{url('cp/students/helpdesk')}}"><span class="glyphicon glyphicon-home"></span> &nbsp; {{trans('settings.home')}}</a></li>
   @elseif(Request::is('cp/form/ff/*') || Request::is('cp/form/ff'))
         <li><a href="{{url('cp/form/ff')}}"><span class="glyphicon glyphicon-home"></span> &nbsp; {{trans('settings.home')}}</a></li>
    @elseif(Request::is('cp/students/conflict/*') || Request::is('cp/students/conflict'))
         <li><a href="{{url('cp/students/conflict')}}"><span class="glyphicon glyphicon-home"></span> &nbsp; {{trans('settings.home')}}</a></li>
    @elseif(Request::is('cp/students/sp/*') || Request::is('cp/students/sp'))
         <li><a href="{{url('cp/students/sp')}}"><span class="glyphicon glyphicon-home"></span> &nbsp; {{trans('settings.home')}}</a></li>
    @elseif(Request::is('cp/students/objection/*') || Request::is('cp/students/objection'))
         <li><a href="{{url('cp/students/objection')}}"><span class="glyphicon glyphicon-home"></span> &nbsp; {{trans('settings.home')}}</a></li>
    @elseif(Request::is('cp/survey/*') || Request::is('cp/survey'))
         <li><a href="{{url('cp/survey')}}"><span class="glyphicon glyphicon-home"></span> &nbsp; {{trans('settings.home')}}</a></li>
    @elseif(Request::is('cp/warehouse/*') || Request::is('cp/warehouse'))
         <li><a href="{{url('cp/warehouse')}}"><span class="glyphicon glyphicon-home"></span> &nbsp; {{trans('settings.home')}}</a></li>
    @elseif(Request::is('form/emr/*') || Request::is('form/emr'))
        <li><a href="{{url('form/emr/')}}"><span class="glyphicon glyphicon-home"></span> &nbsp; {{trans('settings.home')}}</a></li>
    @elseif(Request::is('form/facultyform/*') || Request::is('form/facultyform'))
        <li><a href="{{url('form/facultyform/')}}"><span class="glyphicon glyphicon-home"></span> &nbsp; {{trans('settings.home')}}</a></li>
    @elseif(Request::is('students/conflict/*') || Request::is('students/conflict'))
        <li><a href="{{url('students/conflict/')}}"><span class="glyphicon glyphicon-home"></span> &nbsp; {{trans('settings.home')}}</a></li>
    @elseif(Request::is('students/sp/*') || Request::is('students/sp'))
        <li><a href="{{url('students/sp/')}}"><span class="glyphicon glyphicon-home"></span> &nbsp; {{trans('settings.home')}}</a></li>
    @elseif(Request::is('students/objection/*') || Request::is('students/objection'))
        <li><a href="{{url('students/objection/')}}"><span class="glyphicon glyphicon-home"></span> &nbsp; {{trans('settings.home')}}</a></li>
    @elseif(Request::is('cp/students/finance/*') || Request::is('cp/students/finance'))
        <li><a href="{{url('cp/students/finance')}}"><span class="glyphicon glyphicon-home"></span> &nbsp; {{trans('settings.home')}}</a></li>
    @elseif(Request::is('cp/students/Info/*') || Request::is('cp/students/Info'))
        <li><a href="{{url('cp/students/Info')}}"><span class="glyphicon glyphicon-home"></span> &nbsp; {{trans('settings.home')}}</a></li>
    @endif
</ul>