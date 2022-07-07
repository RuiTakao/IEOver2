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

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/auth/app.js', 'public/js/auth')
    .js('resources/js/posts/app.js', 'public/js/posts')
    .js('resources/js/users/app.js', 'public/js/users')
    .js('resources/js/chats/app.js', 'public/js/chats')
    .autoload( { "jquery": [ '$', 'window.jQuery' ],} )
    .sass('resources/sass/auth/app.scss', 'public/css/auth')
    .sass('resources/sass/posts/app.scss', 'public/css/posts')
    .sass('resources/sass/users/app.scss', 'public/css/users')
    .sass('resources/sass/chats/app.scss', 'public/css/chats')
    .sourceMaps();
