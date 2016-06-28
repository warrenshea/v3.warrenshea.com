var gulp      = require('gulp'),
  connect     = require('gulp-connect-php'),
  browserSync = require('browser-sync');

gulp.task('build', function (done) {
  gulp.src('./common/**/*')
    .pipe(gulp.dest('./_site/common/'));
  gulp.src('./portfolio/**/*')
    .pipe(gulp.dest('./_site/portfolio/'));
  gulp.src('./default.php')
    .pipe(gulp.dest('./_site/'));
});

gulp.task('connect-sync', function() {
  connect.server({}, function () {
    browserSync({
      baseDir: '_site/',
      proxy: '127.0.0.1:8000',
      directory: true,
      startPath: 'default.php'
    });
  });    
 
  gulp.watch(['default.php','common/**/*.php','common/**/*.xml','common/**/*.js','common/**/*.css']).on('change', function () {
    browserSync.reload();
  });
});

gulp.task('default', ['build','connect-sync']);