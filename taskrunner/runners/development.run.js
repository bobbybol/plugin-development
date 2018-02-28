/* jshint -W117, -W104, -W119 */

/**
 *  Required packages
 */

const gulp = require('gulp');
const runSequence = require('run-sequence');

// Taskrunner
const settings = require('../settings');
const server = require('../server/server.start');
require('../tasks/html.task');
require('../tasks/css.task');


/**
 *  Configure Mode (dev/build)
 */

gulp.task('configure:development', () => {
    settings.setDevMode(true);
});


/**
 * Synchronize some tasks
 */

gulp.task('sync-process-html', ['process-html'], (done) => {
    server.reload();
    done();
});

gulp.task('sync-process-js:app', (done) => {
    server.reload();
    done();
});


/**
 *  Watch
 */

gulp.task('watch:development', () => {
    gulp.watch([
        `${ settings.sourcePath }/pages/**/*.+(html|nunjucks)`,
        `${ settings.sourcePath }/templates/**/*.+(html|nunjucks)`
    ], ['sync-process-html']);
    gulp.watch(`${ settings.sourcePath }/sass/**/*.scss`, ['process-css']);
    gulp.watch(`${ settings.sourcePath }/_plugins/**/*.js`, ['sync-process-js:app']);
});


/**
 *  Run
 */

gulp.task('run:development', function() {
    runSequence(
        'configure:development',
        'inject-environment',
        'log-environment',
        [
            'process-html',    
            'process-css'
        ],
        'start:server',
        'log-environment',
        'watch:development'
    );
});