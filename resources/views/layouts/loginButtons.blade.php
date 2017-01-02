




<!-- Authentication Links -->
@if (Auth::guest())
    <li><a href="{{ LaravelLocalization::getLocalizedURL(null,'/login') }}"><i class="fa fa-user"></i>{{trans('settings.login')}}</a></li>
{{--
    <li><a href="{{ LaravelLocalization::getLocalizedURL(null,'/register') }}"><i class="fa fa-user"></i>{{trans('settings.register')}}</a></li>
--}}
@else
    @if(Auth::user()->getRole() === 'admin')
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" data-submenu>
                {{trans('settings.manage')}} <span class="caret"></span>
            </a>


            <!--manage menu-->
            <ul class="dropdown-menu" role="menu" >

                <li><a tabindex="0" href="{{ url('cp/form/emr')}}"><i class="fa fa-btn fa-list-alt"></i>{{trans('settings.regform')}}</a></li>
                <li><a tabindex="0" href="{{ url('cp/form/ff')}}"><i class="fa fa-btn fa-list-alt"></i>{{trans('settings.facultyform')}}</a></li>
                <li><a tabindex="0" href="{{ url('cp/students/conflict')}}"><i class="fa fa-btn fa-list-alt"></i>{{trans('settings.conflict')}}</a></li>
                <li><a tabindex="0" href="{{ url('cp/students/sp')}}"><i class="fa fa-btn fa-list-alt"></i>{{trans('settings.sp')}}</a></li>
                <li><a tabindex="0" href="{{ url('cp/students/objection')}}"><i class="fa fa-btn fa-list-alt"></i>{{trans('settings.objection')}}</a></li>

            </ul>
        </li>
    @endif
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            <i class="fa fa-user"></i>{{ Auth::user()->name }} <span class="caret"></span>
        </a>

        <ul class="dropdown-menu" role="menu">
            <li><a href="{{url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>{{trans('settings.logout')}}</a></li>
        </ul>
    </li>
@endif