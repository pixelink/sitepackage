'use strict';

/* Plugins & vars
 * -------------------- */
// main dependencies
var gulp                = require('gulp');
var runSequence         = require('run-sequence');

// watch/dev/serve dependencies
var browserSync         = require('browser-sync').create();

// build:html dependencies
var replace             = require('gulp-replace-path');

// build:css dependencies
var sass                = require('gulp-sass');
var autoprefixer        = require('gulp-autoprefixer');
var gcmq                = require('gulp-group-css-media-queries');
var cleancss            = require('gulp-clean-css');
var sassOptions         = {
                            errorLogToConsole: true,
                            outputStyle: 'expanded'
                          };
var autoprefixerOptions = {
                            browsers: ['last 2 versions', '> 5%']
                          };

// build:js dependencies
var concat              = require('gulp-concat');
var uglify              = require('gulp-uglify');
var index_js            = require('./Src/Assets/js/index.js.json');

// move:files dependencies
var del                 = require('del');

/* Watch/dev/serve tasks
 * -------------------- */
// browserSync task
gulp.task('serve', function() {
                        // Set port parameter for custom ports
                        var option = 3000, i = process.argv.indexOf("--port");
                        if(i>-1) {
                            option = process.argv[i+1];
                        }
                        browserSync.init({
                            server: "./Dist",
                            ghostMode: false,
                            logFileChanges: true,
                            // Public tunnel
                            tunnel: false,
                            open: false,
                            port: option
                        });
                        gulp.watch("./**/*.html", ['watch:html']);
                        gulp.watch("./src/**/*.css", ['watch:css']);
                        gulp.watch("./src/**/*.scss", ['watch:css']);
                        gulp.watch("./src/**/*.js", ['watch:js']);
});

// watch css task
gulp.task('watch:css', ['build:css'], function () {
                        browserSync.reload();
                        //gulp.watch('./src/**/*.scss', ['build:css']); // watch-only in case we don't want browserSync
});
// watch html task
gulp.task('watch:html', ['build:html'], function () {
                          browserSync.reload();
                          //gulp.watch('./src/**/*.html', ['build:html']);  // watch-only in case we don't want browserSync
});

gulp.task('watch:js', ['build:js'], function () {
                          browserSync.reload();
                          //gulp.watch('./source/js/*.js', ['build:js']); // Leaving here in case I want a watch-only watch-task
});

/* Task for building html-files
 * -------------------- */
gulp.task('build:html', function() {
                        gulp.src(['./src/*.html'])
                        .pipe(replace('../Dist/', './')) // replace all paths './Dist/' with './' so assets can be found
                        .pipe(gulp.dest('./Dist/'));
});

/* Task for building css-files
* -------------------- */
gulp.task('build:css', function() {
                       // Including the main scss files
                       return gulp.src('./src/assets/scss/*.scss')
                       .pipe(sass(sassOptions).on('error', sass.logError))
                       // Trigger autoprefixer
                       .pipe(autoprefixer(autoprefixerOptions))
                       // Concat media queries
                       .pipe(gcmq())
                       // Output the css
                       .pipe(gulp.dest('./Dist/Assets/Css/'))
                       .pipe(gulp.dest('./Resources/Public/Css/'));
});

gulp.task('min:css', ['build:css'], function() {
                        return gulp.src('./Dist/Assets/Css/*.css')
                        .pipe(cleancss({compatibility: 'ie8'}))
                        .pipe(gulp.dest('./Dist/Assets/Css/'))
                        .pipe(gulp.dest('./Resources/Public/Css/'));
});

/* Task for building js-files
 * -------------------- */
gulp.task('build:js', function() {
                        return index_js.files.forEach(function(obj) {
                          return gulp.src(obj.src)
                              .pipe(concat(obj.name))
                              .pipe(gulp.dest('./Dist/Assets/Js/'))
                              .pipe(gulp.dest('./Resources/Public/Js/'));
                        });
});

gulp.task('min:js', ['build:js'], function() {
                        return gulp.src('./Dist/Assets/Js/*')
                        .pipe(uglify())
                        .pipe(gulp.dest('./Dist/Assets/Js/'))
                        .pipe(gulp.dest('./Resources/Public/Js/'));
});


/* Tasks for deleting & moving files
  * ------------------- */
gulp.task('delete:files', function () {
                        return del(['./Dist/**/*']);
});
gulp.task('delete:t3files', function () {
                        return del(['./Resources/Public/Images/*', '!./Resources/Public/Images/BackendLayouts', '!./Resources/Public/Images/GridElements',
                            './Resources/Public/Css/*', '!./Resources/Public/Css/rte.scss', '!./Resources/Public/Css/rte.css',
                            './Resources/Public/Js/*',
                            './Resources/Public/Fonts/*',
                            './Resources/Public/Misc/**/*']);

});
gulp.task('move:files',  function() {
                        // Bilder
                        gulp.src(['./src/assets/img/**/*'])
                        .pipe(gulp.dest('./Dist/Assets/Images/'))
                        .pipe(gulp.dest('./Resources/Public/Images/'));
                        // Fonts
                        gulp.src(['./src/assets/fonts/**/*'])
                        .pipe(gulp.dest('./Dist/Assets/Fonts/'))
                        .pipe(gulp.dest('./Resources/Public/Fonts/'));
                        // Misc
                        gulp.src(['./src/assets/misc/**/*'])
                        .pipe(gulp.dest('./Dist/Assets/Misc/'))
                        .pipe(gulp.dest('./Resources/Public/Misc/'));
});

/* Task for building alltogether. I use runSequence here because delete:files in synchronous-mode will delete the build files often.
 * -------------------- */
gulp.task('build', function(callback) {
                        runSequence('delete:files', 'delete:t3files',
                        ['min:css', 'build:html', 'min:js'],
                        'move:files',
                        callback);
});