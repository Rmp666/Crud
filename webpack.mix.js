let mix = require('laravel-mix');

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
    jquery: ['$','window.jQuery',"jQuery","window.$","jquery","window.jquery"]});
mix.js('resources/assets/js/app.js', 'public/js')
    .extract(['jquery','bootstrap']);
mix.styles([
	'node_modules/bootstrap/dist/css/bootstrap.min.css',
    'resources/assets/css/inline.css'
	], 'public/css/all.css');