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

mix.autoload({
        jquery: ['$', 'window.$', 'window.jQuery']
    })
    .js('resources/js/app.js', 'public/js')
    .js('resources/js/admin/app.js', 'public/administrator/js')
    .sass('resources/sass/customer/style.scss', 'public/customer/css')
    .sass('resources/sass/admin/style.scss', 'public/administrator/css')
    .sourceMaps();