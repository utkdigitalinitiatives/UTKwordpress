// Load plugins
var gulp       = require('gulp');
var uglify     = require('gulp-uglify');
var concat     = require('gulp-concat');
var sass       = require('gulp-sass');
var livereload = require('gulp-livereload');
var gutil      = require('gulp-util');
var nmq = require('gulp-no-media-queries');
var minifyCss = require('gulp-minify-css');


// Vendor Plugin Scripts
gulp.task('plugins', function() {
  gutil.log(gutil.colors.bgGreen('Compiling Plugins'))
  gulp.src(['library/js/vendor/*.js'])
  .pipe(concat('plugins.js'))
  .pipe(livereload())
  .pipe(gulp.dest('library/js'))
});

gulp.task ('scripts', function() {
  gutil.log(gutil.colors.bgGreen('Compiling Scripts'))
  gulp.src(['library/js/plugins.js','library/js/utk.js'
      ])
  .pipe(concat('utk-build.js'))
  .pipe(gulp.dest('library/js/build/'))
  .pipe(concat('utk-min.js'))
  .pipe(uglify().on('error', function(){
    gutil.log(gutil.colors.bgRed('SOMETHING IS BROKEN'))
  }))  
  .pipe(livereload())
  .pipe(gulp.dest('library/js/min/'))
  .on('error', gutil.log);
});

// Styles
gulp.task('styles', function() {
  gutil.log(gutil.colors.bgGreen('Compiling Styles'))
  gulp.src('style.scss')
        .pipe(sass({errLogToConsole: true}))
        .pipe(minifyCss())
        .pipe(livereload())
        .pipe(gulp.dest('./'));
});
// IE Styles
gulp.task('iestyles', function() {
  gutil.log(gutil.colors.bgGreen('Compiling IE Styles'))
  gulp.src('library/css/ie.scss')
        .pipe(sass())
        .pipe(nmq(opts, '{width: 100px}'))
        .pipe(livereload())
        .pipe(gulp.dest('library/css/'));
});







gulp.task('watch', function() {
  gutil.log(gutil.colors.bgGreen('Setting up watch for directories'))
  livereload.listen();
  
  gulp.watch('library/js/vendor/*.js', ['plugins']);

  gulp.watch('library/js/*.js', ['scripts']);

  gulp.watch(
    ['library/scss/ut/*.scss','style.scss'],['styles']
  );
  gulp.watch(
    ['library/scss/ut/*.scss','library/css/ie.scss'],['iestyles']
  );
});



// Default task
gulp.task('default', [
  'styles',
  'iestyles', 
  'plugins', 
  'scripts', 
  'watch'
  ]);