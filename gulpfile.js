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

    mix.scripts([
        'jquery-3.1.0.min.js',
        'bootstrap.min.js',
        'hijri-date.js',
        'calendar.js',
        'jquery.mask.min.js',
        'bootstrap-submenu.js',
        'main.js',

    ]);
    mix.styles([
        'main.css',
        'calendar.css',
        'bootstrap.min.css'
    ]);

    mix.copy('node_modules/bootstrap-rtl/bootstrap/dist/css/bootstrap.min.css', 'resources/assets/css/bootstrap-rtl');
    mix.copy('node_modules/bootstrap-rtl/bootstrap/dist/css/bootstrap-theme.min.css', 'resources/assets/css/bootstrap-rtl');

    mix.styles([
        'bootstrap-rtl/bootstrap.min.css',
        'bootstrap-rtl/bootstrap-theme.min.css',
    ],'public/css/css-ar.css');

    //mix.copy('/fonts', 'public/assets/fonts');
    mix.copy('node_modules/font-awesome/fonts','public/fonts');
    mix.copy('node_modules/bootstrap-sass/assets/fonts/bootstrap','public/fonts');
    mix.sass('app.scss', 'public/css/app.css');

});
