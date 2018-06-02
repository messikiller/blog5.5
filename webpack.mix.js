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

mix
    // start home assets
    .js('resources/assets/js/app.js', 'public/js/app.js')
   .sass('resources/assets/sass/app.scss', 'public/css/app.css')
   .scripts([
       'public/js/app.js',
       'node_modules/social-share.js/dist/js/social-share.min.js'
   ], 'public/js/app.js')
   .styles([
       'public/css/app.css',
       'node_modules/social-share.js/dist/css/share.min.css',
       'node_modules/font-awesome/css/font-awesome.min.css'
   ], 'public/css/app.css')
   .copy('node_modules/font-awesome/fonts/*', 'public/fonts/')
   .copy('node_modules/social-share.js/dist/fonts/*', 'public/fonts/')

   // start admin assets
   .js('resources/assets/js/admin.js', 'public/js/admin.js')
   .sass('resources/assets/sass/admin.scss', 'public/css/admin.css')
   .scripts([
       'public/js/admin.js',
       'node_modules/layer-ce/build/layer.js'
   ], 'public/js/admin.js')
   .styles([
       'public/css/admin.css',
       'node_modules/font-awesome/css/font-awesome.min.css'
   ], 'public/css/admin.css')
   .copy('node_modules/layer-ce/build/skin', 'public/js/skin')
   .version()
;
