let mix = require('laravel-mix');
let SWPrecacheWebpackPlugin = require('sw-precache-webpack-plugin');
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

mix.js('resources/assets/js/app.js', 'public/js')
   .js('node_modules/onsenui/js/onsenui.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')


mix.webpackConfig({
  plugins: [
    new SWPrecacheWebpackPlugin({
      cacheId: 'housepoints',
      filename: 'sw.js',
      maximumFileSizeToCacheInBytes: 49194304,
      minify: false,
      runtimeCaching: [
        {
          handler: 'cacheFirst',
          urlPattern: /fonts\/.*$/,
        }
      ]
    })
  ]
})