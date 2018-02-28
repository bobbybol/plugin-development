/* jshint -W117, -W104, -W119 */

/**
 *  Required packages
 */

const gulp = require('gulp');
const nunjucksRender = require('gulp-nunjucks-render');

// Taskrunner
const settings = require('../settings');


/**
 *  Process HTML
 */

gulp.task('process-html', (done) => {
    // Booleans to check for conditional tasks
    const isNunjucks = (settings.framework === 'nunjucks');
    
    if(isNunjucks) {
        // Get .html and .nunjucks files from /pages folder
        return gulp.src(`${ settings.sourcePath }/pages/**/*.+(html|nunjucks)`)
            .pipe(nunjucksRender({
                path: [`${ settings.sourcePath }/templates`]
            }))
            .on('error', onError)
            .pipe(gulp.dest(settings.sourcePath))
        ;        
    } else {
        done();
    }

    function onError(err) {
        console.log(err.toString());
        this.emit('end');
    }
});
