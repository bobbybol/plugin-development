<!doctype html>
<html class="no-js" lang="en">

    <!-- Declare current Page -->
    <?php $thisPage="bb-matrixshuffler"; ?>

    <!-- Base PHP Controller -->
    <?php include("../shared/controllers/base-controller.php"); ?>
    
    <!-- Page Head -->
    <?php include("../shared/_head.php"); ?>
        
    <!-- Page Body -->
    <body class="bb-plugin <?php echo $pageClass ?>">
        
        <!-- Page Header & Navigation -->
        <?php include("../shared/_navigation.php"); ?>
        
        <main>
            <section class="plugin--demonstration">
                
                <div class="matrixDemo">
                    <h2 class="matrixTitle"><span>Linear Shuffle</span></h2>
                    <div class="imgWrapper matrixLinear">
                        <img src="img/eagle-speedster@1x.png"/>
                    </div>                    
                    <p class="matrixText">
                        Can go linearly in horizontal and vertical directions.<br>
                        Current: "bottom->top"
                    </p>
                    <button id="matrixLinear" class="btn btn-centered-closeby">
                        Animate
                    </button>
                </div>
                
                <div class="matrixDemo">
                    <h2 class="matrixTitle"><span>Diagonal Shuffle</span></h2>
                    <div class="imgWrapper matrixDiagonal">
                        <img src="img/eagle-speedster@1x.png"/>
                    </div>
                    <p class="matrixText">
                        Can go linearly in horizontal and vertical directions.<br>
                        Current: "bottom->top"
                    </p>
                    <button id="matrixDiagonal" class="btn btn-centered-closeby">
                        Animate
                    </button>
                </div>
                
                <div class="matrixDemo">
                    <h2 class="matrixTitle"><span>Random Shuffle</span></h2>
                    <div class="imgWrapper matrixRandom">
                        <img src="img/eagle-speedster@1x.png"/>
                    </div>
                    <p class="matrixText">
                        Can go linearly in horizontal and vertical directions.<br>
                        Current: "bottom->top"
                    </p>
                    <button id="matrixRandom" class="btn btn-centered-closeby">
                        Animate
                    </button>
                </div>
                
                <div class="matrixDemo">
                    <h2 class="matrixTitle"><span>Circular Shuffle</span></h2>
                    <div class="imgWrapper matrixCircular">
                        <img src="img/eagle-speedster@1x.png"/>
                    </div>
                    <p class="matrixText">
                        Can go linearly in horizontal and vertical directions.<br>
                        Current: "bottom->top"
                    </p>
                    <button id="matrixCircular" class="btn btn-centered-closeby">
                        Animate
                    </button>
                </div>
                
            </section>
            <section class="plugin--explanation">
                <div class="explanation-container">
                    <h3 class="h3">The Plugin</h3>
                    <p class="p">
                        BB Matrix Shuffler is a plugin developed to..
                    </p>
                    
                    <hr>
                    
                    <h3 class="h3">Usage</h3>
                    <p class="p">
                        To start using the Pixelify plugin, simple browse to the <a href="<?php echo $linkGit ?>" target="_blank">Github</a> page, download the plugin, and include it in your project. Instructions on how to use the plugin are provided there as well.
                    </p>
                    
                    <hr>
                    
                    <h3 class="h3">About the demo</h3>
                    <p class="p">
                        ..
                    </p>
                    
                    <hr>
                    
                    <h3 class="h3">Changelog</h3>
                    <p class="p changelog">
                        <strong>2.2.0</strong>
                        <br>
                        Added<br>
                        • Smart Word Breaker functionality<br>
                        • Smartbreak character now configurable in options
                        <br>
                        <br>
                        
                        <strong>2.1.0</strong>
                        <br>
                        Added<br>
                        • Text Equalizer plugin<br>
                        • Text Equalizer can be called seperately, after fitting
                        <br>
                        <br>
                        
                        <strong>2.0.0</strong>
                        <br>
                        Added<br>
                        • New repository with completely rebuilt textfitter<br>
                        • Text Aligner included in main plugin<br>
                        • Upscaling is now optional
                    </p>

                </div>
                <div class="dl">
                    <p class="p">download</p>
                    <a href="<?php echo $linkGit ?>" target="_blank">
                        <i class="fa fa-github" aria-hidden="true"></i>
                    </a>
                    <a href="<?php echo $linkDL ?>">
                        <i class="fa fa-download" aria-hidden="true"></i>
                    </a>
                </div>
            </section>
        </main>
        
        <!-- Page Footer -->
        <?php include("../shared/_footer.php"); ?>

        <!-- Plugin -->
        <script src="js/jquery.bb-pixelify.js"></script>
        <script src="js/jquery.bb-matrixshuffler.js"></script>

        <!-- Call -->
        <script>
            $("#basic").click(function() {
                $('.imgWrapper')
                    .bbPixelify({
                        columns: 7, 
                        rows: 4
                    })
                    .children()
                    .css('transition', 'all .3s ease-out')
                ;
                
                setTimeout(function() {
                    $('.imgWrapper')
                        .children()
                        .css('transform', 'scale(0.95)')
                    ;
                }, 10);
            });
            
            /*$(window).load(function() {
                var myShuffledPixelMatrix = $('.imgWrapper')
                    .bbPixelify({rows: 4, columns: 7})
                    .bbShuffleMatrix({
                        shuffleAlgorithm: "circular",
                        shuffleDirection: "outside->in"
                    })
                ;

                console.log(myShuffledPixelMatrix);
            });*/
        </script>
        
    </body>
</html>