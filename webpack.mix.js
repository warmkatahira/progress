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
 
mix.js('resources/js/app.js', 'public/js')
.css('resources/css/navigation.css', 'public/css')
.css('resources/css/post_detail.css', 'public/css')
.js('resources/js/customer.js', 'public/js')
.js('resources/js/post_detail.js', 'public/js')
.js('resources/js/post_index.js', 'public/js')
.autoload({
    jquery: ['$', 'window.jQuery']
})
.postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]);