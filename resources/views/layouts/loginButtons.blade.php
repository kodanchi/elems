




<!-- Authentication Links -->
@if (Auth::guest())
    {{--    <li><a href="{{ LaravelLocalization::getLocalizedURL(null,'/login') }}"><i class="fa fa-user"></i>{{trans('settings.login')}}</a></li>

        <li><a href="{{ LaravelLocalization::getLocalizedURL(null,'/register') }}"><i class="fa fa-user"></i>{{trans('settings.register')}}</a></li>
    --}}
@else
    {{--@if(Auth::user()->getAllroles() === 'admin')--}}
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" data-submenu>
                {{trans('settings.manage')}} <span class="caret"></span>
            </a>


            <!--manage menu-->
            <ul class="dropdown-menu" role="menu" >
                @if(in_array('admin',Auth::user()->getAllroles()))
                <li><a tabindex="0" href="{{url('cp/form/emr')}}"><i class="fa fa-btn fa-list-alt"></i>{{trans('settings.regform')}}</a></li>
                @endif
                @if(in_array('admin',Auth::user()->getAllroles()))
                <li><a tabindex="0" href="{{url('cp/form/ff')}}"><i class="fa fa-btn fa-list-alt"></i>{{trans('settings.facultyform')}}</a></li>
                @endif
                @if(in_array('admin',Auth::user()->getAllroles()))
                <li><a tabindex="0" href="{{url('cp/students/conflict')}}"><i class="fa fa-btn fa-list-alt"></i>{{trans('settings.conflict')}}</a></li><br>
                @endif
                @if(in_array('admin',Auth::user()->getAllroles()))
                <li><a tabindex="0" href="{{url('cp/students/sp')}}"><i class="fa fa-btn fa-list-alt"></i>{{trans('settings.sp')}}</a></li><br>
                @endif
                @if(in_array('admin',Auth::user()->getAllroles()) || in_array('Registration',Auth::user()->getAllroles()) || in_array('financial',Auth::user()->getAllroles()) || in_array('graduate',Auth::user()->getAllroles()) || in_array('academicAffairs',Auth::user()->getAllroles()) || in_array('blackboard',Auth::user()->getAllroles()) || in_array('technicalSupport',Auth::user()->getAllroles()))
                <li><a tabindex="0" href="{{url('cp/students/helpdesk/pending')}}"><i class="fa fa-btn fa-list-alt"></i>{{trans('settings.HD')}}</a></li><br>
                @endif
                @if(in_array('admin',Auth::user()->getAllroles()))
                <li><a tabindex="0" href="{{url('cp/students/objection')}}"><i class="fa fa-btn fa-list-alt"></i>{{trans('settings.objection')}}</a></li>
                @endif
                @if(in_array('admin',Auth::user()->getAllroles()))
                <li><a tabindex="0" href="{{url('cp/survey')}}"><i class="fa fa-btn fa-list-alt"></i>{{trans('settings.surveys')}}</a></li>
                @endif
                @if(in_array('admin',Auth::user()->getAllroles()) || in_array('WH',Auth::user()->getAllroles()))
                <li><a tabindex="0" href="{{url('cp/warehouse')}}"><i class="fa fa-btn fa-list-alt"></i>{{trans('settings.warehouse')}}</a></li>
                @endif
            </ul>
        </li>
    {{--@endif--}}
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            <i class="fa fa-user"></i>{{ Auth::user()->name }} <span class="caret"></span>
        </a>

        <ul class="dropdown-menu" role="menu">
            <li><a href="{{url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>{{trans('settings.logout')}}</a></li>
        </ul>
    </li>
@endif