/* jshint -W117 */

/*!
 * BB Text Fitter 2.2.0
 * Uses binary search to fit text with minimal layout calls.
 * https://github.com/bobbybol/textFitter
 * @license MIT licensed
 *
 * Copyright (C) 2016 bobbybol.com - A project by Bobby Bol
 * Thanks: @STRML - https://github.com/STRML
 */

;(function ($) {
    "use strict";

    /**
     * Defining the Plugin
     */
    
    $.fn.bbFitText = function(options) {
        
        /**
         * Setting the Defaults
         */

        var settings = {
            // Text sizing
            minFontSize         : 6,        // minimum size to scale down to
            maxFontSize         : 60,       // maximum size to scale up to
            lineHeight          : 1.2,      // line-height in em           
            // Text centering
            centerHorizontal    : false,    // center text horizontally or not
            centerVertical      : false,    // center text vertically or not   
            // Extra options
            forceSingleLine     : false,    // force text onto single line
            scaleUpToo          : false,    // possibility to scale text up too   
            // Smart break
            smartBreak          : false,    // use smart break for big words
            smartBreakCharacter : '~'       // character to break a word on
        };        
        // Settings extendable with options
        $.extend(settings, options);
        

        /**
         * Set up the textfitter functionality for each DOM element
         *   - No objects are needed, just a lambda with closures
         *   - As of v2.0.0 state is no longer saved in $.cache object with jquery.data()
         */
        
        return this.each(function() {
                        
            /**
             * Declare variables
             */
            
            var toFit               = $(this);
            var parent              = toFit.parent();
            var parentHeight        = parent.height();
            var parentWidth         = parent.width();
            var originalHTML        = toFit.html();            
            var originalText        = toFit.text();
            var newSpan;
            
            // For binary search algorithm
            //var low;
            //var mid;
            //var high;
            
            /**
             * Check agains settings and solve some simple logic
             */
                    
            // If we haven't added span.textfittie in a previous iteration..
            if (toFit.find('span.textfittie').length === 0) {
                // ..empty the <p> from its contents..
                toFit.html("");
                // ..build span.textfittie..
                newSpan = $("<SPAN>").addClass("textfittie").html(originalHTML);
                // ..and put span.textfittie into <p>
                toFit.html(newSpan);
            } else {
                // Otherwise just make a reference to the pre-existing span
                newSpan = toFit.find('span.textfittie');
            }
            
            // Force single line
            if (settings.forceSingleLine) {
                toFit.css({
                    whiteSpace: "nowrap"
                });
            }
            
            // Set line height
            toFit.css({
                lineHeight: settings.lineHeight + "em"
            });
                                   
            
            /**
             * Binary search for best fit
             */
            
            function findBestFit(elementToFit) {            
                var low  = settings.minFontSize + 1;
                var high = settings.maxFontSize + 1;
                var mid;
                
                if (!settings.scaleUpToo && elementToFit.height() <= parentHeight && newSpan.width() <= parentWidth) {
                    // Do nothing if we do not scale up and the text fits all parent boundaries.
                } else {
                    while ( low <= high ) {
                        mid  = parseInt((low + high) / 2); //34
                        elementToFit.css('font-size', mid);

                        if (elementToFit.height() <= parentHeight && newSpan.width() <= parentWidth) {
                            // increase low
                            low = mid + 1;
                        } else {            
                            // decrease high                
                            high = mid - 1;
                        }
                    }
                    // finally subtract 1 if width is still a little too large
                    if (newSpan.width() > elementToFit.innerWidth() || elementToFit.height() > parentHeight) {
                        elementToFit.css('font-size', mid - 1);
                    }
                }            
            }
            
                        
            /**
             * Smart word break
             */
            
            function smartWordBreaker() {
                // Locally scoped version of the HTML                     
                var smartHTML = originalHTML;
                var lwOriginal;
                var lwBroken;
                var lwIntact;
                var fontsizeIntact;
                var fontsizeBroken;
                
                // Save an array of all words
                var longWordArray = originalText
                    .trim()
                    .split(" ")
                    .filter(function(word) {
                        return word.indexOf(settings.smartBreakCharacter) > -1;
                    })
                ;
                
                // Create an object for each longword with three properties
                var objectArray = longWordArray.map(function(longword) {                    
                    var splitWord = longword.split(settings.smartBreakCharacter);
                    
                    return {
                        longwordOriginal : longword,
                        longwordBroken   : splitWord.join("- "),
                        longwordIntact   : splitWord.join("")
                    };
                });
                
                // Build the initial HTML which we will start optimizing                
                for( var i=0; i<objectArray.length; i++ ) {        
                    lwOriginal  = objectArray[i].longwordOriginal;
                    lwBroken    = '<span class="smartWordBreak">' + objectArray[i].longwordBroken + '</span>';
                    
                    smartHTML = smartHTML.replace( lwOriginal , lwBroken );
                }
                newSpan.html(smartHTML);
                
                // Get a reference to all smart words
                var allSmartWords = newSpan.find('.smartWordBreak');
                
                // We have to do a wordbreak-check with a double textfit for each smart word
                for( var j=0; j<objectArray.length; j++ ) {                    
                    // First fit is with word broken
                    findBestFit(toFit);
                    // And store font-size
                    fontsizeBroken = toFit.css('font-size');
                    console.log('font-size with word broken: ' + fontsizeBroken);
                    
                    // Find [j-th] wordBroken and replace with wordIntact
                    $(allSmartWords[j]).text(objectArray[j].longwordIntact);
                    // Fit again
                    findBestFit(toFit);
                    // And store font-size
                    fontsizeIntact = toFit.css('font-size');
                    console.log('font-size with word intact: ' + fontsizeIntact);
                    
                    // If the broken version gives a better result,
                    // e.g. a bigger -fitted- font-size, then use that.
                    if (fontsizeBroken > fontsizeIntact) {
                        $(allSmartWords[j]).text(objectArray[j].longwordBroken);
                        findBestFit(toFit);
                    }
                }                
            }
            
            // Some checks for using `smart word breaker` or not
            if(!settings.smartBreak || originalText.indexOf(settings.smartBreakCharacter) === -1 ) {
                findBestFit(toFit);                
            } else {                            
                smartWordBreaker();
            }

            
            /**
             * Alignment to center
             */
            
            // Horizontal
            if (settings.centerHorizontal) {
                toFit.css({
                    textAlign: "center"
                });
            }
            
            // Vertical
            if (settings.centerVertical) {            
                parent.css({
                    display: "flex",
                    flexDirection: "column",
                    justifyContent: "center"
                });  
            }
            
        });
    };
    
    
    /**
     * Defining the Plugin
     */
    
    $.fn.bbEqualizeText = function() {
        
        // Find font size of passed element
        function findFontSize(element) {
            return parseInt($(element).css("fontSize"));
        }
        
        // Compare values, return smallest number
        function findSmallest(val1, val2) {
            return val2 < val1 ? val2 : val1;
        }
        
        // Get smallest font size
        var smallestFontSize = this
            .toArray()
            .map(findFontSize)
            .reduce(findSmallest)
        ;
        
        // Assign smallest font size to every element
        // ..and return object for chainability
        return this.each(function() {
            $(this).css("fontSize", smallestFontSize);
        }); 
    };   
    
}(jQuery));