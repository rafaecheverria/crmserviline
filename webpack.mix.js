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

mix.scripts([
	'resources/assets/js/jquery-3.1.1.min.js',
	'resources/assets/js/jquery-ui.min.js',
	'resources/assets/js/bootstrap.min.js',
	'resources/assets/js/material.min.js',
	'resources/assets/js/perfect-scrollbar.jquery.min.js',
	'resources/assets/js/jquery.validate.min.js',
	'resources/assets/js/moment.min.js',
	'resources/assets/js/locale.js',
	'resources/assets/js/chartist.min.js',
	'resources/assets/js/jquery.bootstrap-wizard.js',
	'resources/assets/js/bootstrap-notify.js',
	'resources/assets/js/bootstrap-datetimepicker.js',
	'resources/assets/js/nouislider.min.js',
	'resources/assets/js/jquery.select-bootstrap.js',
	'resources/assets/js/jquery.datatables.js',
	'resources/assets/js/jasny-bootstrap.min.js',
	'resources/plugins/fullcalendar/fullcalendar.min.js',
	'resources/plugins/fullcalendar/locale/es.js',
	'resources/assets/js/jquery.tagsinput.js',
	'resources/assets/js/material-dashboard.js',
	'resources/assets/js/demo.js',
	'resources/assets/js/dataToggle.js',
	'resources/assets/js/sweetalert2.js',
	'resources/assets/js/calendarios.js',
	'resources/assets/js/ajax.js',
	'resources/assets/js/listas.js',
	], 'public/js/app.js')
.styles([
	'resources/assets/css/bootstrap.min.css',
	'resources/assets/css/sweetalert2.css',
	'resources/assets/css/demo.css',
	'resources/assets/css/style.css',
	'resources/assets/css/material-dashboard.css',
	'resources/assets/css/dataToggle.css',

	], 'public/css/app.css');
