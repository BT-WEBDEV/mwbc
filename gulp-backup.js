var gulp = require('gulp');
var sass = require('gulp-sass');
var browserSync = require('browser-sync').create();
var rename 	= require('gulp-rename');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');

var paths = {
  	styles: {
    	src: './styles/scss/*.scss',
    	dest: './styles/css/'
  	},
    scripts: {
      src: './scripts/src/*.js',
      dest: './scripts/'
    },
    base: {
      home: './'
    }
};

// BroswerSync
function browserSync(done) {
  browserSync.init({
    server: {
      baseDir: "./*.html"
    },
    port: 3000
  });
  done();
}

// BrowserSync Reload
function browserSyncReload(done) {
  browserSync.reload();
  done();
}

// Sass
function styles() {
  	return gulp
  		.src(paths.styles.src, {
      		sourcemaps: true
    	})
		.pipe(sass())
		.pipe(rename({
	  		basename: 'main',
        suffix: '.min'
		}))
	.pipe(gulp.dest(paths.styles.dest))
  .pipe(browserSync.stream());
}

// Javascript
// function scripts() {
//     return gulp
//       src(paths.scripts.src, {
//         sourcemaps: true
//       })
//       .pipe(uglify())
//       .pipe(concat('main.min.js'))
//       .pipe(gulp.dest(paths.scripts.dest));
// }

// Watch
function watch() {
    // gulp.watch(paths.scripts.src, scripts);
  	gulp.watch(paths.styles.src, gulp.series(styles, browserSyncReload));
}

var build = gulp.series(styles, watch);

gulp.task(browserSync);
gulp.task(build);

gulp.task('default', build, browserSync);