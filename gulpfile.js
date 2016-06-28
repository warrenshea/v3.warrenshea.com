var gulp      = require('gulp'),
  connect     = require('gulp-connect-php'),
  browserSync = require('browser-sync');
  gutil       = require('gulp-util');
  ftp         = require('gulp-ftp');

gulp.task('ftp-to-prod', ['build'], function (done) {
  return gulp.src('_site/**/*')
    .pipe(ftp({
       host: '',
       user: '',
       pass: '',
       remotePath: ''
    }))
    .pipe(gutil.noop());
});

gulp.task('ftp-success', ['ftp-to-prod'], function (done) {
  return gulp.src('./default.php')
    .pipe(gulp.dest('./_site/'));
});

gulp.task('build', function (done) {
  gulp.src('./common/**/*')
    .pipe(gulp.dest('./_site/common/'));
  gulp.src('./portfolio/**/*')
    .pipe(gulp.dest('./_site/portfolio/'));
  return gulp.src('./default.php')
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
gulp.task('deploy', ['build','ftp-to-prod','ftp-success']);