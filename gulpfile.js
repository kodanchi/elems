var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {

    mix.copy('node_modules/bootstrap-arabic/dist/js/bootstrap-arabic.min.js', 'resources/assets/js/bootstrap.min.js');

    mix.scripts([
        'jquery-2.0.0.min.js',
        //'jquery-ui.js',
        'bootstrap.min.js',
        'hijri-date.js',
        'calendar.js',
        'timetable.min.js',
        'jquery.mask.min.js',
        'bootstrap-submenu.js',
        'main.js',
        'owl.carousel.min.js',
        'jquery.sticky.js',
        'jquery.easing.1.3.min.js',
        //'bootstrap-slider.min.js',

        'main2.js',
        'nouislider.min.js',

    ]);


    //mix.copy('node_modules/bootstrap-rtl/bootstrap/dist/css/bootstrap.min.css', 'resources/assets/css/bootstrap-rtl');
    //mix.copy('node_modules/bootstrap-rtl/bootstrap/dist/css/bootstrap-theme.min.css', 'resources/assets/css/bootstrap-rtl');
    mix.copy('node_modules/bootstrap-arabic/dist/css/bootstrap-arabic.min.css', 'resources/assets/css/bootstrap-arabic');
    mix.copy('node_modules/bootstrap-arabic/dist/css/bootstrap-arabic-theme.min.css', 'resources/assets/css/bootstrap-arabic');

    mix.styles([

        'jquery-ui.min.css',
        'calendar.css',
        'timetablejs.css',
        'bootstrap.min.css',
        'bootstrap-arabic/bootstrap-arabic.min.css',
        'bootstrap-arabic/bootstrap-arabic-theme.min.css',
        //'bootstrap-slider.min.css',

        'owl.carousel.css',
        'style.css',
        'responsive.css',
        'main.css',
        'nouislider.min.css',


    ]);

    mix.styles([
        //'bootstrap-rtl/bootstrap.min.css',
        //'bootstrap-rtl/bootstrap-theme.min.css',
        'bootstrap-arabic/bootstrap-arabic.min.css',
        'bootstrap-arabic/bootstrap-arabic-theme.min.css',
        'nouislider.min.css',
    ],'public/css/css-ar.css');

    //mix.copy('/fonts', 'public/assets/fonts');
    mix.copy('node_modules/font-awesome/fonts','public/fonts');
    mix.copy('node_modules/bootstrap-sass/assets/fonts/bootstrap','public/fonts');
    mix.copy('node_modules/bootstrap-arabic/fonts','public/fonts');
    //mix.sass('app.scss', 'public/css/app.css');


});
