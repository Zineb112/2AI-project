const gulp = require('gulp');
const sass = require('gulp-sass');
const browserSync = require('browser-sync').create();
const autoprefixer = require('gulp-autoprefixer');
const sourcemaps = require('gulp-sourcemaps');
const cssnano = require('gulp-cssnano');
const gulpIf = require('gulp-if');
// const uglify = require('gulp-uglify');
const useref = require('gulp-useref');
const fileinclude = require('gulp-file-include');
const imagemin = require('gulp-imagemin');
const cache = require('gulp-cache');
const terser = require('gulp-terser');

//compile scss into css
// function style() {
//     // 1. where is my scss file
//     return gulp.src('./sass/**/*.scss')
//     // 2. pass the file through sass compiler
//     .pipe(sass().on('error', sass.logError))
//     // 3. where do i save the compiled CSS ?
//     .pipe(gulp.dest('./css'))
//     // 4. strem changes to all browsers
//     .pipe(browserSync.stream());
// }

//compile scss into css
let style = () => {
    // 1. where is my scss file
    return gulp.src('src/sass/**/*.scss')
        // 2. pass the file through sass compiler
        .pipe(sass().on('error', sass.logError))
        // 3. pass the file through autoprifixer
        .pipe(autoprefixer())
        // 4. pass the file through css minifier
        .pipe(cssnano())
        // 5. intilizing sourcemaps
        .pipe(sourcemaps.init())
        // 6. pass the files through sourcemaps ?
        .pipe(sourcemaps.write('.'))
        // 7. where do i save the compiled CSS ?
        .pipe(gulp.dest('dist/css'))
        // 8. stream changes to all browsers
        .pipe(browserSync.stream());
}
let stylePublic = () => {
    // 1. where is my scss file
    return gulp.src('src/sass/**/*.scss')
        // 2. pass the file through sass compiler
        .pipe(sass().on('error', sass.logError))
        // 3. pass the file through autoprifixer
        .pipe(autoprefixer())
        // 4. pass the file through css minifier
        .pipe(cssnano())
        // 5. intilizing sourcemaps
        .pipe(sourcemaps.init())
        // 6. pass the files through sourcemaps ?
        .pipe(sourcemaps.write('.'))
        // 7. where do i save the compiled CSS ?
        .pipe(gulp.dest('public/assets/css'))
        // 8. stream changes to all browsers
        .pipe(browserSync.stream());
}

let userref = () => {
    return gulp.src('./src/*.html')
        .pipe(fileinclude({
            prefix: '@@',
            basepath: '@file'
        }))
        .pipe(useref())
        .pipe(gulpIf('*.js', terser()))
        // 3. pass the file through css minifier
        // .pipe(gulpIf('*.css', cssnano()))

        .pipe(gulp.dest('dist'));
}
 
let jspublic = () => {
    return gulp.src('./src/includes/build_jspublic.html')
        .pipe(useref())
        .pipe(gulpIf('*.js', terser()))
        // 3. pass the file through css minifier
        // .pipe(gulpIf('*.css', cssnano()))

        .pipe(gulp.dest('public/assets'));
}

// let fileincludes = () => {
//     return gulp.src('./*.html')
//     .pipe(fileinclude({
//         prefix: '@@',
//         basepath: '@file'
//     }))
//     .pipe(gulp.dest('dist'));
// }


let imgminify = () => {
    return gulp.src('src/img/**/*.+(png|jpg|jpeg|gif|svg)')
        // Caching images that ran through imagemin
        .pipe(cache(imagemin({
            // Setting interlaced to true
            interlaced: true
        })))
        .pipe(gulp.dest('dist/images'))
}

function watch() {
    browserSync.init({
        server: {
            baseDir: './dist'
        }
    });
    gulp.watch('./src/sass/**/*.scss', style);
    gulp.watch('./src/sass/**/*.scss', userref);
    gulp.watch('./src/*.html', userref);
    gulp.watch('./src/js/**/*.js', userref);
    gulp.watch('./src/js/**/*.js', jspublic);
    gulp.watch('./src/includes/*.html', userref);
    gulp.watch('./**/*.html').on('change', browserSync.reload);
    gulp.watch('./src/js/**/*.js').on('change', browserSync.reload);
    gulp.watch('./src/img/', imgminify);

}

exports.style = style;
exports.watch = watch;
exports.userref = userref;
exports.imgminify = imgminify;
exports.jspublic = jspublic;
exports.stylePublic = stylePublic;
// exports.fileincludes = fileincludes;
