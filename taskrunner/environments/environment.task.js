/* jshint -W117, -W104, -W119 */

/**
 *  Required packages
 */

const fs = require('fs');
const util = require('util');
const gulp = require('gulp');
const file = require( 'gulp-file' );
const argv = require('yargs').argv;

// Taskrunner
const settings = require('../settings');
const constants = require('../constants');

/**
 * Gulp Task :: Set Environment
 */

gulp.task('set-environment', (done) => {
    // Get the environment parameter from `argv` object
    let environment = argv.env || 'development';
        
    // Write environment parameter to flat file storage
    fs.writeFileSync('./taskrunner/environments/._currentEnv', environment, 'utf8');
    
    done();
});


/**
 *  Gulp Task :: Log Environment
 */

gulp.task('log-environment', (done) => {
    if (settings.useEnvironments) {
        let envFile = './taskrunner/environments/._currentEnv';
        checkForFile(envFile, logInfoFromFile);
        
    } else {
        console.log('\x1b[41m%s\x1b[0m', "You're not using environments.");
    }
    
    done();
});


/**
 * Gulp Task :: Inject Environment
 */

gulp.task('inject-environment', (done) => {
    if (settings.useEnvironments) {
        let envFile = './taskrunner/environments/._currentEnv';
        checkForFile(envFile, writeEnvObject);
    }
    
    done();
});


/**
 * Helper :: Check if file exists before calling a function on it
 */

function checkForFile(file, functionToCallOnFile) {
    fs.stat(file, function(err, stat) {
        if(err === null) {
            // envFile exists:
            functionToCallOnFile(file);
        } else if(err.code === 'ENOENT') {
            // envFile does not exist: send message to user
            console.log('\x1b[41m%s\x1b[0m', "Please set your preferred environment before using environments.");
        } else {
            console.log('Something went wrong: ', err.code);
        }
    });
}


function logInfoFromFile(sourceFile) {
    // Get environment from flat file storage
    let currentEnvironment = fs.readFileSync(sourceFile, 'utf8').toUpperCase();
    
    // Log it IN RED ;)
    console.log('\x1b[41m%s\x1b[0m', `Your current environment is set to: ${ currentEnvironment }`);
}

/**
 * Helper :: Write relevant environment settings from constants file to _ALION_ENV.js
 */

function writeEnvObject(sourceFile) {
    // Get environment from flat file storage
    let currentEnvironment = fs.readFileSync(sourceFile, 'utf8');
    
    // Variables
    let key;
    let envObject;
    let exportableContent;
    
    for (key in constants) {    
        if (key === currentEnvironment) {
            envObject = constants[key];
        } else {
        }
    }
    
    exportableContent = 
        `;(function(window) {
            window.ALION_ENV = ${ util.inspect(envObject) };
        })(window);`;

    fs.writeFileSync('./taskrunner/environments/_ALION_ENV.js', exportableContent, 'utf8');
}