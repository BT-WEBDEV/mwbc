var gulp = require('gulp');
var sass = require('gulp-sass');
// var del = require('del');
var rename = require("gulp-rename");
var postcss = require("gulp-postcss");
var autoprefixer = require("autoprefixer");
var cssnano = require("cssnano");
var sourcemaps = require("gulp-sourcemaps");
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');

var browserSync = require('browser-sync').create();
// Browser Reload
function reload(done) {
  browserSync.reload();
  done();
}

// Clean Dist
// function clean() {
//   return del(["./styles/css"]);
// }


// Folder Patch
var paths = {
  styles: {
    src: "styles/scss/main.scss",
    watch: "styles/scss/**/*.scss",
    dest: "styles/css"
  },
  scripts: {
    src: "scripts/src/*.js",
    dest: "scripts/js"
  }
}

// Sass to Css
function css() {
  return gulp
    .src(paths.styles.src)
    .pipe(sourcemaps.init())
    .pipe(sass())
    .on("error", sass.logError)
    .pipe(postcss([autoprefixer(), cssnano()]))
    .pipe(sourcemaps.write())
    .pipe(rename({suffix: ".min"}))
    .pipe(gulp.dest(paths.styles.dest))
    .pipe(browserSync.stream());
}

// Javascript and minify scripts
function scripts() {
  return gulp
    .src(paths.scripts.src)
    .pipe(uglify())
    .pipe(concat('main.min.js'))
    .pipe(gulp.dest(paths.scripts.dest))
    .pipe(browserSync.stream());
}

// Watch Files
function watch() {
  browserSync.init({
    proxy: {
      target: "http://localhost/"
    },
    port: 80
  });

  gulp.watch(paths.styles.watch, css);
  gulp.watch(paths.scripts.src, scripts);
  gulp.watch('./**/*.php', reload);
}


gulp.task('default', watch);