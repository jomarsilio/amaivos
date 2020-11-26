const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

// mix.js('resources/js/app.js', 'public/js')
//     .postCss('resources/css/app.css', 'public/css', [
//         //
//     ]);

/**
 * WEBSITE
 */
mix
    .styles([
        'resources/css/sisdado-bootstrap.min.css',
        'resources/css/sisdado-custom.css'
    ], 'public/css/amaivos.min.css')
    .scripts([
        'resources/js/sisdado-jquery.js',
        'resources/js/sisdado-bootstrap.min.js',
        'resources/js/sisdado-custom.js',
        'resources/js/sisdado-mask.js',
    ], 'public/js/amaivos.min.js')
    .version()
    .copyDirectory('resources/images/sisdado', 'public/images')
    .copyDirectory('resources/fonts/sisdado', 'public/fonts');