var gulp      = require('gulp'),
  connect     = require('gulp-connect-php'),
  browserSync = require('browser-sync');

gulp.task('connect-sync', function() {
  connect.server({}, function () {
    browserSync({
      proxy: '127.0.0.1:8000',
      directory: true,
      startPath: 'default.php'
    });
  });    
 
  gulp.watch(['default.php','common/**/*.php','common/**/*.xml','common/**/*.js','common/**/*.css']).on('change', function () {
    browserSync.reload();
  });
});

gulp.task('default', ['connect-sync']);