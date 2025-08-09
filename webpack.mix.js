const mix = require('laravel-mix');
const webpack = require('webpack'); // ← أضف هذا السطر

mix.js('resources/js/app.js', 'public/js')
   .vue()
   .postCss('resources/css/app.css', 'public/css', [require("tailwindcss")])
   .webpackConfig({
     plugins: [
       new webpack.DefinePlugin({
         __VUE_PROD_HYDRATION_MISMATCH_DETAILS__: JSON.stringify(false)
       })
     ]
   });
