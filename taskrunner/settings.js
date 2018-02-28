/* jshint -W117, -W104, -W119 */

/**
 *  Settings for taskrunner I/O
 */

module.exports = {

    // Paths
    sourcePath: 'src',
    outputPath: '_www_',

    // Files
    jsVendorFile: 'vendor.js',
    jsAppFile: 'app.js',
    cssFile: 'main.css',
        
    /** 
     * Framework
     *
     * Choices:
     *   'nunjucks'
     *   'angular1'
     */
    framework: 'nunjucks',
    
    // Environments
    useEnvironments: false,
    
    // Linting
    useLinter: true,
    
    // Server
    serverPort: 3000,
    
    // Browser Support
    browserSupport: [
        '> 1%', 
        'last 2 versions', 
        'Explorer >= 9'
    ],
    
    // Mode :: Development || Build
    isDevMode: true,
    
    setDevMode: function(bool) {
        this.isDevMode = bool;
    }

};
