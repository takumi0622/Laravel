const mix = require('laravel-mix');
const { Resolver } = require('laravel-mix/src/Resolver');

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

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/ajax.js', 'public/js')
    .js('resources/js/delete_product.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/home.scss', 'public/css')
    .sourceMaps()
    .autoload({ 
        "jquery": ['$', 'window.jQuery'],
    })
    .version();
