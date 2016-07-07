var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss', 'public/css/style.css')
        .copy('resources/assets/css/bootstrap.min.css', 'public/css/bootstrap.min.css')
        .copy('resources/assets/css/stylish.css', 'public/css/stylish.css')
        .copy('resources/assets/fonts', 'public/fonts')
        .copy('resources/assets/plugins/font-awesome/css/font-awesome.min.css', 'public/css/font-awesome.min.css')
        .copy('resources/assets/plugins/font-awesome/fonts', 'public/fonts')
        .copy('resources/assets/js/jquery.js', 'public/js/jquery.js')
        .copy('resources/assets/js/bootstrap.min.js', 'public/js/bootstrap.min.js')
        .copy('resources/assets/plugins/ckeditor', 'public/plugins/ckeditor')
        .copy('resources/assets/plugins/tagsinput/bootstrap-tagsinput.css', 'public/css/bootstrap-tagsinput.css')
        .copy('resources/assets/plugins/tagsinput/bootstrap-tagsinput.js', 'public/js/bootstrap-tagsinput.js')
        .copy('resources/assets/js/stylish.js', 'public/js/stylish.js');
});
