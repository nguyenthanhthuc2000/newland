const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
//mix.js('resources/js/app.js', 'public/js').sourceMaps();
//
mix
    .autoload({
        jquery: ['$', 'window.jQuery', "jQuery", "window.$", "jquery", "window.jquery"],
        // 'popper.js/dist/umd/popper.js': ['Popper'],
        'popper.js/dist/umd/popper.js': ['Popper', 'window.Popper']
    })
    .js('resources/js/app.js', 'public/js')
    .js('resources/js/admin/app.js', 'public/administrator/js')
    .sass('resources/sass/customer/style.scss', 'public/customer/css')
    .sass('resources/sass/admin/style.scss', 'public/administrator/css')
    .sourceMaps();

//mix.js('resources/js/app.js', 'public/js').sourceMaps(); //<------ add this line and remove any other lines for mix.js