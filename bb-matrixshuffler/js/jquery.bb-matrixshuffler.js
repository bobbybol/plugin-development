/* jshint -W117 */

/*!
 * BB Matrix Shuffle 1.0.0
 * Reshuffle a grid array into various other layouts
 * https://github.com/bobbybol/matrixshuffler
 * @license MIT licensed
 *
 * Copyright (C) 2016 bobbybol.com - A project by Bobby Bol
 */

;(function ($) {
    "use strict";

    /**
     * The Plugin Definition
     */
        
    $.fn.bbShuffleMatrix = function(options) {
        
        /**
         * The Variables
         */
        
        var pixelArray;
        var shuffledArray   = [];
        
        // Get some data if called on matrix container built by Pixelify
        if (this.data("bbMatrixInfo")) {
            options.rows    = this.data("bbMatrixInfo").rows;
            options.columns = this.data("bbMatrixInfo").columns;
            pixelArray      = this.children().toArray();
        } else {
            pixelArray      = this.toArray();
        }
        
        
        /**
         * The Default Settings
         */

        var settings = {
            rows                : 10,               // number of columns
            columns             : 10,               // number of rows
            shuffleAlgorithm    : "linear",         // linear, diagonal, circular, random
            shuffleDirection    : "top->bottom"     // Direction is different for different algorithms:
                                                    // ---------------------------------------------------
                                                    // For linear:
                                                    // top->bottom, bottom->top, left->right, right->left
                                                    // ---------------------------------------------------
                                                    // For diagonal:
                                                    // topleft->bottomright, bottomright->topleft,
                                                    // topright->bottomleft, bottomleft->topright
                                                    // ---------------------------------------------------
                                                    // For circular:
                                                    // inside->out, outside->in
                                                    // ---------------------------------------------------
        };        
        // Settings extendable with options
        $.extend(settings, options);
            
        
        /**
         * The Test Array
         *
         *   With 3 rows and 5 columns
         *
         *   | 0  | 1  | 2  | 3  | 4  |
         *   +----+----+----+----+----+
         *   | 5  | 6  | 7  | 8  | 9  |
         *   +----+----+----+----+----+
         *   | 10 | 11 | 12 | 13 | 14 |
         *
         *
         *   With 5 rows and 3 columns
         *
         *   | 0  | 1  | 2  |
         *   +----+----+----+
         *   | 3  | 4  | 5  |
         *   +----+----+----+
         *   | 6  | 7  | 8  |
         *   +----+----+----+
         *   | 9  | 10 | 11 |
         *   +----+----+----+
         *   | 12 | 13 | 14 |
         *
         */

        var testArray = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14];
        
        
        /**
         * The Simple Helper Functions
         */
        
        function attachRandomNumber(element) {
            // returns a 2-value array, comprising of:
            // [0] random number
            // [1] the element passed to function
            return [Math.random(), element];
        }
        
        function returnLastArrayValue(array) {
            // returns z of [.., x, y, z]
            return array[array.length - 1];
        }
        
        function flatten2dMatrix(array) {
            // flattens:  [[a, b], [..], [x, z]]
            // to:        [a, b, .., x, z]
            return [].concat.apply([], array);
        }
        
        /**
         * The Shuffle Functions
         */
        
        // Random
        function randomShuffle(array) {
            return array
                .map(attachRandomNumber)
                .sort()
                .map(returnLastArrayValue)
            ;
        }
        
        // Diagonal
        // #TODO - refactor functionally
        function diagonalShuffle(array) {
            var columns             = settings.columns;
            var rows                = settings.rows;
            var numberOfDiagonals   = rows + columns - 1;                 
            var newDiagonalArray    = [];
            var i;
            var j;  
            
            // We're doing n number of loops, where n = the number of diagonals
            for(i = 0; i < numberOfDiagonals; i++) {

                for(j = Math.max(0, i - columns + 1); j <= Math.min(rows, i + 1) - 1; j++) {
                    var originalArrayIndex = (j * columns) + i - j;
                    newDiagonalArray.push(array[originalArrayIndex]);
                }  

            }
            
            return newDiagonalArray;
        }
    
        // Mirror
        // #TODO - refactor reduce either:
        // - with function that returns function using `rowLength` as closure
        // - or use `rowLength` as `this` inside reduce
        function mirrorShuffle(array) {
            var rowLength           = array.length / settings.rows;
            
            // Reduce an array of items to an array of rows..
            var newMirroredArray = array
                .reduce(function (rowArray, item, index) { 
                    return (index % rowLength === 0 ? rowArray.push([item]) 
                            : rowArray[rowArray.length-1].push(item)) && rowArray;
                }, [])
                // ..and reverse those rows
                .map(function (arrayRow) {
                    return arrayRow.reverse();
                })
            ;
            
            return flatten2dMatrix(newMirroredArray);
        }
        
        // Rotate
        // #TODO - refactor functionally
        function rotateShuffle(array) {
            var numRows = settings.rows;
            var numColumns = settings.columns;
            var newRotatedArray = [];
            var i;
            var j;
            
            for(i=0; i<numColumns; i++) {
                // make new row
                var newRow = [];
                
                for(j=0; j<numRows; j++) {
                    newRow.push(array[j*numColumns+i]);
                }
                
                // push new row to 2d array
                newRotatedArray.push(newRow);
            }
            
            return flatten2dMatrix(newRotatedArray);
        }
        
        // Inside Out
        // #TODO - refactor functionally (..and good luck with that)
        function insideOutShuffle(array) {
            var rows                = settings.rows;
            var columns             = settings.columns;
            
            var rowLength           = columns;
            var columnLength        = rows;
            
            var longestAxis         = rowLength >= columnLength ? columns : rows;
            var shortestAxis        = rowLength >= columnLength ? rows : columns;

            var numberOfRings;
            var numberOfFullRings;
            
            var arrayRow;
            var arrayOfRowArrays    = [];
            var newGuttedArray      = [];
            var i;
            var j;
            var k;
            var l;
             
            // number of rings
            if(longestAxis % 2) {
                // true & uneven
                numberOfRings       = (longestAxis+1)/2;
            }else{
                // false & even
                numberOfRings       = longestAxis/2;
            }
            
            // number of complete rings
            if(shortestAxis % 2) {
                // true & uneven
                numberOfFullRings   = (shortestAxis+1)/2;
            }else{
                // false & even
                numberOfFullRings   = shortestAxis/2;
            }
                        
            // create a n number of new arrays, where n = the number of rows
            for(i = 0; i < rows; i++) {
                arrayRow =  array.slice( rowLength * i, rowLength * i + rowLength);
                arrayOfRowArrays.push(arrayRow);
            } 
                        
            for(j = 0; j < numberOfRings; j++) {
                var ring                = [];
                var subRing             = [];
                var firstRow;
                var lastRow;
                var firstItem;
                var lastItem;
                var currentNumRows    = arrayOfRowArrays.length;
                var currentNumColumns = arrayOfRowArrays[0].length;
                                
                // CASE 1: if there's more rows than inner rings
                if(currentNumRows >= currentNumColumns + 1) {
                    console.log("more rows than rings");

                    // shave off first and last row completely
                    firstRow = arrayOfRowArrays.shift();
                    lastRow  = arrayOfRowArrays.pop();
                    // put them into ring array
                    ring.push(firstRow, lastRow);
                    
                    newGuttedArray.push(flatten2dMatrix(ring));  
                }
                
                // CASE 2: if there's more columns than inner rings
                else if(currentNumColumns >  currentNumRows + 1) {
                    console.log("more columns than rings");
                    
                    // shave off all first and last elements of all rows
                    for (k = 0; k < arrayOfRowArrays.length; k++) {
                        firstItem   = arrayOfRowArrays[k].shift();
                        lastItem    = arrayOfRowArrays[k].pop();
                        // put them into subRing array
                        subRing.push(firstItem, lastItem);
                    }

                    newGuttedArray.push(flatten2dMatrix(subRing));
                }
                
                // CASE 3: it's a square!!
                else {
                    console.log("square");
                    
                    if (arrayOfRowArrays.length === 1) {
                        ring.push(arrayOfRowArrays[0]);
                        j++;
                    } else if (arrayOfRowArrays.length === 2) {
                        ring.push(arrayOfRowArrays[0], arrayOfRowArrays[1]);
                        j++;
                    } else {
                        // shave off first and last row completely
                        firstRow = arrayOfRowArrays.shift();
                        lastRow  = arrayOfRowArrays.pop();

                        // shave off all first and last elements of all rows
                        for (l = 0; l < arrayOfRowArrays.length; l++) {
                            firstItem   = arrayOfRowArrays[l].shift();
                            lastItem    = arrayOfRowArrays[l].pop();
                            // put them into subRing array
                            subRing.push(firstItem, lastItem);
                        }
                    
                        ring.push(firstRow, subRing, lastRow);
                    }
                    
                    newGuttedArray.push(flatten2dMatrix(ring));
                }
            } 
            
            return newGuttedArray;
        }
        //insideOutShuffle(testArray);  
        
        
        /**
         * The Shuffling
         */
        
        // Linear
        if (settings.shuffleAlgorithm === "linear") {
            if (settings.shuffleDirection === "top->bottom") {
                shuffledArray = pixelArray;
            }
            else if (settings.shuffleDirection === "bottom->top") {
                shuffledArray = pixelArray.reverse();
            }
            else if (settings.shuffleDirection === "left->right") {
                shuffledArray = rotateShuffle(pixelArray);
            }
            else if (settings.shuffleDirection === "right->left") {
                shuffledArray = rotateShuffle(pixelArray).reverse();
            }
            else {
                console.warn("You chose a shuffleDirection that isn't compatible with the shuffleAlgorithm you specified. Please match direction with algorithm.");
            }
        }
        
        // Random
        if (settings.shuffleAlgorithm === "random") {
            shuffledArray = randomShuffle(pixelArray);
        }
        
        // Diagonal
        if (settings.shuffleAlgorithm === "diagonal") {
            if (settings.shuffleDirection === "topleft->bottomright") {
                shuffledArray = diagonalShuffle(pixelArray);
            }
            else if (settings.shuffleDirection === "bottomright->topleft") {
                shuffledArray = diagonalShuffle(pixelArray).reverse();
            }
            else if (settings.shuffleDirection === "topright->bottomleft") {
                shuffledArray = diagonalShuffle(mirrorShuffle(pixelArray));
            }
            else if (settings.shuffleDirection === "bottomleft->topright") {
                shuffledArray = diagonalShuffle(mirrorShuffle(pixelArray)).reverse();
            }
            else {
                console.warn("You chose a shuffleDirection that isn't compatible with the shuffleAlgorithm you specified. Please match direction with algorithm.");
            }
        }

        // Circular
        if (settings.shuffleAlgorithm === "circular") {
            if (settings.shuffleDirection === "outside->in") {
                shuffledArray = insideOutShuffle(pixelArray);
            }
            else if (settings.shuffleDirection === "inside->out") {
                shuffledArray = insideOutShuffle(pixelArray).reverse();
            }
            else {
                console.warn("You chose a shuffleDirection that isn't compatible with the shuffleAlgorithm you specified. Please match direction with algorithm.");
            }
        }
                
        
        /**
         * The Return Value
         *   -> Shuffled array as jQuery object
         */
        
        return $(shuffledArray);
         
    };    
}(jQuery));