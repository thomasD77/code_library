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

// Backend:
mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .vue()
    .setResourceRoot('../');

// Frontend:
mix.js('resources/js/front_koolskampkoers-app.js', 'public/js')
    .sass('resources/sass/front_koolskampkoers-app.scss', 'public/css')
    .vue()




