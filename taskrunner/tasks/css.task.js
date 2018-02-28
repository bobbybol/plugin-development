/* jshint -W117, -W104, -W119 */

/**
 *  Required packages
 */

const gulp = require('gulp');
const rename = require('gulp-rename');
const if_ = require('gulp-if');
const sourcemaps = require('gulp-sourcemaps');
const wait = require('gulp-wait');

// CSS
const sass = require('gulp-sass');
const sassModuleImporter = require('sass-module-importer');
const nano = require('gulp-cssnano');
const cleanCss = require('gulp-clean-css');

// PostCSS
const postcss = require('gulp-postcss');
const lost = require('lost');
const autoprefixer = require('autoprefixer');
const mqpacker = require('css-mqpacker');

// Taskrunner
const settings = require('../settings');
const server = require('../server/server.start');


/**
 *  Process CSS
 */

gulp.task('process-css', () => {
    const isDevMode = settings.isDevMode;

    let postcssTasks = [
        lost(),
        autoprefixer({
            browsers: settings.browserSupport,
            cascade: false
        })        
    ];
    
    if (!isDevMode) {
        postcssTasks.push(mqpacker({ sort: true }));            // build mode only
    }
    
    return gulp.src([
        `${ settings.sourcePath }/sass/index.scss`
    ])
        .pipe(wait(50))
        .pipe(if_(isDevMode, sourcemaps.init()))                // dev mode only
        .pipe(sass({ importer: sassModuleImporter() }))
        .on('error', onError)
        .pipe(postcss(postcssTasks))
        .pipe(if_(!isDevMode, cleanCss()))                      // build mode only
        .pipe(if_(!isDevMode, nano()))                          // build mode only
        .pipe(rename( settings.cssFile ))
        .pipe(if_(isDevMode, sourcemaps.write('./')))           // dev mode only
        .pipe(gulp.dest(`${ settings.sourcePath }/assets/css`))
        .pipe(if_(isDevMode, server.stream({
            match: '**/*.css'
        })))                                                    // dev mode only
    ;
    
    function onError(err) {
        console.log(err.toString());
        this.emit('end');
    }
});
