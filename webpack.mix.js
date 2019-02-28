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
mix.copy('node_modules/admin-lte/bower_components/select2/dist/css/select2.css', 'public/css/select2.css');
mix.copy('node_modules/admin-lte/bower_components/select2/dist/js/select2.full.js', 'public/js/select2.js');
mix.copy('node_modules/jquery-validation/dist/jquery.validate.min.js', 'public/js/jquery.validate.js');

if (mix.inProduction()) {
    mix.version();
}