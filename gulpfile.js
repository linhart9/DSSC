var gulp = require('gulp');
var browserSync = require('browser-sync').create();
var sass = require('gulp-sass');

// Compile sass into CSS & auto-inject into browsers
function style() {
    // 1. Where is my scss file
    return gulp.src(['node_modules/bootstrap/scss/bootstrap.scss','node_modules/aos/dist/aos.css','src/scss/**/*.scss'])
    // 2. Pass that file through sass compiler
        .pipe(sass())
    // 3. Where do I save the complied CSS?
        .pipe(gulp.dest('src/css'))
    // 4. Stream changes to all browsers
        .pipe(browserSync.stream())
}

function js() {
    return gulp.src(['node_modules/bootstrap/dist/js/bootstrap.min.js', 'node_modules/jquery/dist/jquery.min.js', 'node_modules/popper.js/dist/umd/popper.min.js','node_modules/aos/dist/aos.js'])
        .pipe(gulp.dest("src/js"))
        .pipe(browserSync.stream());
}

function watch() {
    browserSync.init({
        server:{
            baseDir: 'src/'
        }
    });
    // Looking for any change to any scss file
    gulp.watch(['node_modules/bootstrap/scss/bootstrap.scss','node_modules/aos/dist/aos.css','src/scss/**/*.scss'], style);
    gulp.watch('src/js/*.js').on('change', browserSync.reload);
    gulp.watch('src/*.html').on('change', browserSync.reload);
};


exports.default = gulp.series(style, js, watch)
exports.watch = watch
exports.js
exports.style = style