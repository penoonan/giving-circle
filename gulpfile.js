var gulp = require('gulp');
var concat = require('gulp-concat');

var compdir = './vendor/bower_components/';


gulp.task('jsapp', function() {
  return gulp.src([
      './resources/assets/js/app.js',
      './resources/assets/js/components/*.js' // definitely want app config to load before components
    ])
    .pipe(concat('app.js'))
    .pipe(gulp.dest('./public/js'));
});

gulp.task('jslib', function() {
  return gulp
      .src([
        compdir + 'jquery/dist/jquery.min.js',
        compdir + 'bootstrap/dist/js/bootstrap.min.js',
        compdir + 'vue/dist/vue.js'
      ])
      .pipe(concat('lib.js'))
      .pipe(gulp.dest('./public/js'));
});

gulp.task('csslib', function() {
    return gulp.src([compdir + 'bootstrap/dist/css/bootstrap.min.css'])
        .pipe(concat('lib.css'))
        .pipe(gulp.dest('./public/css'))
});


gulp.task('default', ['jsapp', 'jslib', 'csslib']);
