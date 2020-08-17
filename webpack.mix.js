const mix = require('laravel-mix');
const { VERSION } = require('lodash');

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

mix.styles([
    'resources/views/sistema/css/style.css'
],'public/sistema/css/style.css')
   .scripts([
        'resources/views/sistema/js/script.js'
    ],'public/sistema/js/script.js');
