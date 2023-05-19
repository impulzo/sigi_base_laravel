const mix = require("laravel-mix");
const path = require('path');

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

mix.ts("resources/js/app.tsx", "public/js")
    .ts("resources/js/pages/*/*.tsx", "public/js/pages")
    .ts("resources/js/pages/dashboard/*.tsx", "public/js/pages")
    .webpackConfig({
        resolve: {
            extensions: [".js", ".jsx", ".ts", ".tsx"],
            alias: {
                "@": path.resolve(__dirname, "resources/js"),
            },
        },
    })
    .sass("resources/sass/app.scss", "public/css");