/* jshint -W117, -W104, -W119 */

/**
 *  Required packages
 */

const gulp = require('gulp');
const argv = require('yargs').argv;

// Server with live preview
const browserSync = require('browser-sync').create();

// Taskrunner
const settings = require('../settings');


/**
 *  Spin up a server
 */

gulp.task('start:server', () => {
    let ghostMode = false;
    
    // if --ghostmode is passed as flag, run in ghostMode
    if(argv.ghostmode) {
        ghostMode = {
            clicks: true,
            forms: true,
            scroll: true
        };
    }

    // start server
    browserSync.init({
        server: {
            baseDir: settings.sourcePath
        },
        port: settings.serverPort,
        ui: false,
        notify: false,
        ghostMode: ghostMode
    });
});

// Export server for use elsewhere
module.exports = browserSync;
