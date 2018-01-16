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

mix.options({
    clearConsole: false
});

mix
    .js('resources/assets/js/app.js', 'public/js')
    .extract([
        'jquery',
        'popper.js',
        'tether',
        'bootstrap'
    ])
    .sass('resources/assets/sass/app.scss', 'public/css')
    .copyDirectory('resources/assets/images', 'public/images')
    .copyDirectory('resources/assets/favicon', 'public');

if (mix.inProduction()) {
    mix
        .version()
        .disableNotifications();
} else {
    mix
        .browserSync({
            open: false,
            proxy: 'localhost:8000'
        })
        .sourceMaps();
}
