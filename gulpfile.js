var gulp = require('gulp');
var sass = require('gulp-sass');

var src = 'App/src/assets/style.scss';
var dist = 'public/assets/css';

gulp.task( 'sass', function(){
    return gulp.src( src )
        .pipe( sass() )
        .pipe( gulp.dest( dist ))
} );

gulp.task( 'watch', function(){
    gulp.watch('App/src/**/**/*.scss', gulp.series('sass'));
} )