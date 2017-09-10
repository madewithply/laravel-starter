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

// Build the Javascript
mix.js('resources/assets/js/app.js', 'public/js')
    .webpackConfig({
        // This config was required to build the foundation-sites JS without errors on prod builds
        module: {
            rules: [{
                test: /\.jsx?$/,
                exclude: /node_modules(?!\/foundation-sites)|bower_components/,
                use: [{
                    loader: 'babel-loader',
                    options: Config.babel()
                }]
            }]
        }
    })
    // Build the CSS
    .sass('resources/assets/sass/app.scss', 'public/css')
    // Enable Browser sync when using `npm run watch`
    .browserSync({
        // Proxy the localhost to return at port 3000
        proxy: {
            target: '127.0.0.1',
            reqHeaders: function () {
                return { host: 'localhost:3000' };
            }
        },
        // Detect changes to the following files
        files: [
            "public/css/*.css", // Built CSS files
            "public/js/*.js", // Built JS files
            "resources/views/**/**.pug.blade", // Changes to blade template (includes .pug.blade)
            "resources/views/**/**.blade", // Changes to blade template (includes .pug.blade)
            "resources/views/**/**.pug" // Changes to pug mixins
        ]
    });