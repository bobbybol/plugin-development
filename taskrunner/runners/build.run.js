/* jshint -W117, -W104, -W119 */

/**
 *  Required packages
 */

const gulp = require('gulp');
const del = require('del');
const runSequence = require('run-sequence');
const htmlmin = require('gulp-htmlmin');

// Taskrunner
const settings = require('../settings');


/**
 *  Configure Mode (dev/build)
 */

gulp.task('configure:build', () => {
    settings.setDevMode(false);
});


/**
 *  Publish Tasks
 */

// Publish html files to destination folder
gulp.task('publish:html', () => {
    // Booleans to check for conditional tasks
    const isNunjucks = (settings.framework === 'nunjucks');
    
    let globbies;
    
    if(isNunjucks) {
        globbies = [`${ settings.sourcePath }/*.html`];
    } else {
        globbies = [`${ settings.sourcePath }/**/*.html`];
    }
    
    return gulp.src(globbies, { base: settings.sourcePath })
        .pipe(htmlmin({ 
            removeComments: true,
            collapseWhitespace: true
        }))
        .pipe(gulp.dest(settings.outputPath))
    ;
});

// Publish all other relevant files to destination folder
gulp.task('publish:rest', () => {
    return gulp.src([
        `${ settings.sourcePath }/assets/**/*`,
        `${ settings.sourcePath }/_plugins/**/*`,
        `${ settings.sourcePath }/*.txt`,
        `${ settings.sourcePath }/*.{ico,png,jpg,jpeg,gif}`
    ], { base: settings.sourcePath })
        .pipe(gulp.dest(settings.outputPath))
    ;
});


/**
 * Clean files
 */

gulp.task('clean:mapfiles', function() {    
    return del.sync([
        `${ settings.sourcePath }/assets/css/*.map`
    ]);
});

gulp.task('clean:dist', function() {
    return del.sync(settings.outputPath);
});


/**
 *  Run
 */

gulp.task('run:build', function() {
    runSequence(
        'configure:build',
        'inject-environment',
        'log-environment',
        [
            'clean:dist',
            'clean:mapfiles'
        ],
        [
            'process-html', 
            'process-css'
        ],
        [
            'publish:html', 
            'publish:rest'
        ]
    );
});