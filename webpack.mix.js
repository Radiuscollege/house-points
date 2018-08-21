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

      staticFileGlobs: ['public/**/*.{css,eot,svg,ttf,woff,woff2,js,html}'],
        minify: true,
        stripPrefix: 'public/',
        handleFetch: true,
        dynamicUrlToDependencies: { //you should add the path to your blade files here so they can be cached
               //and have full support for offline first (example below)
            '/': ['resources/views/base.blade.php', 'resources/views/pages/admin.blade.php', 'resources/views/pages/index.blade.php'],
            // '/posts': ['resources/views/posts.blade.php']
        },
        staticFileGlobsIgnorePatterns: [/\.map$/, /mix-manifest\.json$/, /manifest\.json$/, /service-worker\.js$/],
        navigateFallback: '/',

      runtimeCaching: [
        {
          handler: 'cacheFirst',
          urlPattern: /fonts\/.*$/,
        }
      ]
    })
  ]
})