const mix = require('laravel-mix');
require('laravel-mix-purgecss');
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

mix.styles(['resources/css/site.css','resources/css/top.css', 'resources/css/cookieconsent.css'], 'public/css/fitzwilliam.css').version();
mix.js(['resources/js/app.js','resources/js/backtotop.js','resources/js/cookieconsent.js', 'resources/js/config.js'], 'public/js')
    .sass('resources/sass/app.scss', 'public/css').purgeCss({safelist: { deep: [/carousel/] }}).version();
mix.webpackConfig({
    stats: {
        children: true,
    },
});
