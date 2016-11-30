<!doctype html>
<html class="no-js" lang="en">

    <!-- Declare current Page -->
    <?php $thisPage="bb-pixelify"; ?>

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
                <div class="imgWrapper">
                    <img src="img/eagle-speedster@1x.png"/>
                </div>

                <button id="basic" class="btn btn-centered">
                    Pixelify
                </button>
            </section>
            <section class="plugin--explanation">
                <div class="explanation-container">
                    <h3 class="h3">The Plugin</h3>
                    <p class="p">
                        BB Pixelify is a plugin developed to help you create specialized image animations. It can cut any image up into any number of tiles, and provides you with plenty of hooks to subsequently animate those tiles.
                    </p>
                    
                    <hr>
                    
                    <h3 class="h3">Usage</h3>
                    <p class="p">
                        To start using the Pixelify plugin, simple browse to the <a href="https://github.com/bobbybol/pixelify" target="_blank">Github</a> page, download the plugin, and include it in your project. Instructions on how to use the plugin are provided there as well.
                    </p>
                    
                    <hr>
                    
                    <h3 class="h3">About the demo</h3>
                    <p class="p">
                        The 'scale-down' effect is added to visualize the tiles. The plugin itself doesn't add any effect; it simply cuts the image up into tiles and leaves the animation to you.
                    </p>
                    
                    <hr>
                    
                    <h3 class="h3">More power with BB Matrix Shuffler</h3>
                    <p class="p">
                        A
                    </p>
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