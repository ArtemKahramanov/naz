var gulp = require('gulp');
var sass = require('gulp-sass');


gulp.task('sass', function(done) {
    gulp.src("web/scss/style.scss")
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(gulp.dest("web/css"))
    done();
});
gulp.task('serve', function(done) {
    gulp.watch("web/scss/**/*.scss", gulp.series('sass'));
    done();
});

gulp.task('default', gulp.series('serve'));
