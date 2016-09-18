<li>
    @if(App::isLocale('ar'))
        <a href="{{LaravelLocalization::getLocalizedURL('en')}}">English</a>
    @elseif(App::isLocale('en'))
        <a href="{{LaravelLocalization::getLocalizedURL('ar')}}">عربي</a>
    @endif
</li>