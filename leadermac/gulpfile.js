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
    mix.less('bootstrap.less', 'public/assets/css/bootstrap.min.css');
	mix.less('ge.less', 'public/assets/css/ge.min.css');
	
	mix.scripts('jquery-1.11.2.min.js', 'public/assets/js/jquery-1.11.2.min.js');
	mix.scripts('bootstrap.min.js', 'public/assets/js/bootstrap.min.js');
        mix.scripts('jquery.prettyPhoto.js', 'public/assets/js/jquery.prettyPhoto.js');
        mix.scripts('owl.carousel.min.js', 'public/assets/js/owl.carousel.min.js');
        
	mix.scripts('ge.js', 'public/assets/js/ge.js');
	
});
