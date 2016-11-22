




<!-- Authentication Links -->
@if (Auth::guest())
    <li><a href="{{ LaravelLocalization::getLocalizedURL(null,'/login') }}"><i class="fa fa-user"></i>{{trans('settings.login')}}</a></li>
    <li><a href="{{ LaravelLocalization::getLocalizedURL(null,'/register') }}"><i class="fa fa-user"></i>{{trans('settings.register')}}</a></li>
@else
    @if(Auth::user()->getRole() === 'admin')
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" data-submenu>
                {{trans('settings.manage')}} <span class="caret"></span>
            </a>


            <!--manage menu-->
            <ul class="dropdown-menu" role="menu" >

                <li><a tabindex="0" href="{{ LaravelLocalization::getLocalizedURL(null,'cp/form/emr')}}"><i class="fa fa-btn fa-list-alt"></i>{{trans('settings.regform')}}</a></li>

            </ul>
        </li>
    @endif
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            <i class="fa fa-user"></i>{{ Auth::user()->name }} <span class="caret"></span>
        </a>

        <ul class="dropdown-menu" role="menu">
            <li><a href="{{ LaravelLocalization::getLocalizedURL(null,'/logout') }}"><i class="fa fa-btn fa-sign-out"></i>{{trans('settings.logout')}}</a></li>
        </ul>
    </li>
@endif