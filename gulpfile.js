var gulp = require('gulp');
var codecept = require('gulp-codeception');

gulp.task('run_tests', function() {
    gulp.src('./tests/*.php').pipe(codecept());
});

gulp.task('watch', function() {
    gulp.watch(['./src/**.php', './tests/*/**.php'], ['run_tests']);
});