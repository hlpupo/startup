'use strict';

var sass = require('gulp-sass'),
    gulp = require('gulp'),
    chmod = require('gulp-chmod');
var input = 'src/Restaurant/RstaurantBundle/Resources/public/sass/*.sass',
  inputA = 'src/Restaurant/RstaurantBundle/Resources/public/sass/Admin/*.scss',
  inputFrontend = 'src/Restaurant/RstaurantBundle/Resources/public/sass/Frontend/*.scss';

gulp.task('sassFrontend', function () {
        gulp.src(inputFrontend)
        .pipe(sass({sourceComments: 'map'}))
        .pipe(chmod(755))
        .pipe(gulp.dest('src/Restaurant/RstaurantBundle/Resources/public/css/Frontend'));
});

gulp.task('sassAdmin', function () {
  gulp.src(inputA)
    .pipe(sass({sourceComments: 'map'}))
    .pipe(chmod(755))
    .pipe(gulp.dest('src/Restaurant/RstaurantBundle/Resources/public/css/Admin'));
});
gulp.task('sass', ['sassFrontend', 'sassAdmin']);



gulp.task('greet', function () {
    console.log('Hello world!');
});

var exec = require('child_process').exec;

// Without this function exec() will not show any output


gulp.task('installAssets', function () {
    exec('C:/xampp/php/php.exe app/console assets:install');
});
gulp.task('watch', function () {
    gulp.watch(inputFrontend, ['sass']);
    //gulp.watch(paths.images, ['images']);
});
/*
gulp.task('watch', function () {
    return gulp
        // Watch the input folder for change,
        // and run `sass` task when something happens

        // When there is a change,
        // log a message in the console
        .on('change', function(event) {
            console.log('File ' + event.path + ' was ' + event.type + ', running tasks...');
        });
});*/
gulp.task('default', ['watch']);