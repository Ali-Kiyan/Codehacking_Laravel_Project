/**
 * Created by Ali_Kiyan on 8/8/17.
 */
const { mix } = require('laravel-mix');

mix.js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css');



mix.styles([
    'resources/assets/css/libs/blog-post.css',
    'resources/assets/css/libs/bootstrap.css',
    'resources/assets/css/libs/font-awesome.css',
    'resources/assets/css/libs/metisMenu.css',
<<<<<<< HEAD
    'resources/assets/css/libs/styles.css',
    'resources/assets/css/libs/timeline.css',
    'resources/assets/css/libs/sb-admin-2.css'
=======
    'resources/assets/css/libs/sb-admin-2.css',
    'resources/assets/css/libs/styles.css',
    'resources/assets/css/libs/timeline.css'


>>>>>>> 431dd37da7114c09ba2539feba3161050087f72e

], 'public/css/libs.css');

mix.scripts([
    'resources/assets/js/libs/jquery.js',
    'resources/assets/js/libs/bootstrap.js',
    'resources/assets/js/libs/metisMenu.js',
    'resources/assets/js/sb-admin-2.js',
    'resources/assets/js/libs/jquery.js',
    'resources/assets/js/libs/scripts.js'


<<<<<<< HEAD
    
=======
>>>>>>> 431dd37da7114c09ba2539feba3161050087f72e

], 'public/js/libs.js');