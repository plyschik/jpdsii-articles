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

mix.sass('resources/assets/sass/site.scss', 'public/css');
mix.sass('resources/assets/sass/dashboard.scss', 'public/css');
mix.js('resources/assets/js/site.js', 'public/js');
mix.js('resources/assets/js/dashboard.js', 'public/js');

if (mix.inProduction()) {
    mix.version();
}