const mix = require('laravel-mix');

// Compila o JavaScript e coloca na pasta public/js
mix.js('resources/js/app.js', 'public/js')

// Compila o CSS e coloca na pasta public/css
   .postCss('resources/css/app.css', 'public/css');
