<!doctype html>
<html class="no-js" lang="en">

    <!-- Declare current Page -->
    <?php $thisPage="bb-textfitter"; ?>

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
                <div class="textfitWrapper clearfix">          

                    <!-- Regular fit -->
                    <div class="textfitContainer">                
                        <div class="textContainer">
                            <p class="fit-regular">
                                Some text that by default doesn't fit its parent container. This text at its regular size of 18px in fact exceeds the fixed height of the parent, but we can solve that by calling bbFitText().
                            </p>
                        </div>              
                        <p class="textfitTitle">
                            Regular settings, only scaling down to fit height.
                        </p>                
                        <button id="fit-regular" class="btn btn-textfit">Text Fittie</button>
                    </div>            

                    <!-- Align center -->
                    <div class="textfitContainer">                
                        <div class="textContainer">
                            <p class="align-center">Centered</p>
                        </div>              
                        <p class="textfitTitle">
                            Centering vertically & horizontally, <em>not</em> scaling up.
                        </p>                
                        <button id="align-center" class="btn btn-textfit">Text Fittie</button>
                    </div>

                    <!-- Scaling up in width -->
                    <div class="textfitContainer">                
                        <div class="textContainer">
                            <p class="scale-up-width">Enlarged</p>
                        </div>              
                        <p class="textfitTitle">
                            Scaling <em>up</em> in width.<br><br>
                        </p>                
                        <button id="scale-up-width" class="btn btn-textfit">Text Fittie</button>
                    </div>

                    <!-- Big word -->
                    <div class="textfitContainer">                
                        <div class="textContainer">
                            <p class="big-word">
                                This text contains a very long and <span style="text-decoration: underline;">impressivelycomplicated</span> word, or perhaps we just forgot a space.
                            </p>
                        </div>              
                        <p class="textfitTitle">
                            Perfect scaling of big words.<br><br>
                        </p>                
                        <button id="big-word" class="btn btn-textfit">Text Fittie</button>
                    </div>

                    <!-- Single line -->
                    <div class="textfitContainer">                
                        <div class="textContainer">
                            <p class="force-single-line">Force text on single line</p>
                        </div>              
                        <p class="textfitTitle">
                            Force text on fitted single line.<br><br>
                        </p>                
                        <button id="force-single-line" class="btn btn-textfit">Text Fittie</button>
                    </div>

                    <!-- Line Height -->
                    <div class="textfitContainer">                
                        <div class="textContainer">
                            <p class="line-height">Nice big line height</p>
                        </div>              
                        <p class="textfitTitle">
                            Set line height with em.<br><br>
                        </p>                
                        <button id="line-height" class="btn btn-textfit">Text Fittie</button>
                    </div>

                    <!-- Font combinations -->
                    <div class="textfitContainer">                
                        <div class="textContainer">
                            <p class="font-combination">
                                <span style="font-family: 'Josefin Slab'; font-weight: 300;">Any combination of</span><span style="font-family: 'Gloria Hallelujah'; font-weight: 400;"> any number of fonts</span>
                            </p>
                        </div>              
                        <p class="textfitTitle">
                            Set line height with em.<br><br>
                        </p>                
                        <button id="font-combination" class="btn btn-textfit">Text Fittie</button>    
                    </div>

                    <!-- Padding too -->
                    <div class="textfitContainer">                
                        <div class="textContainer" style="padding: 40px;">
                            <p class="padding-too">Padding works too</p>
                        </div>              
                        <p class="textfitTitle">
                            Put padding on parent with <br><em>box-sizing: border-box;</em>
                        </p>                
                        <button id="padding-too" class="btn btn-textfit">Text Fittie</button>       
                    </div>

                    <!-- Multiple -->
                    <div class="textfitContainer">                
                        <div class="textContainer">
                            <div class="fitOne">
                                <p class="multiple">Some text</p>
                            </div>
                            <div class="fitOne">
                                <p class="multiple">A little more text</p>
                            </div>
                            <div class="fitOne">
                                <p class="multiple">Some more text still ;)</p>
                            </div>
                        </div>              
                        <p class="textfitTitle">
                            It's possible to fit all your text nodes with just one call.
                        </p>                
                        <button id="multiple" class="btn btn-textfit">Text Fittie</button>     
                    </div>

                    <!-- Equalize multiple -->
                    <div class="textfitContainer">                
                        <div class="textContainer">
                            <div class="fitOne">
                                <p class="equalize">Some text</p>
                            </div>
                            <div class="fitOne">
                                <p class="equalize">A little more text</p>
                            </div>
                            <div class="fitOne">
                                <p class="equalize">Some more text still ;)</p>
                            </div>
                        </div>              
                        <p class="textfitTitle">
                            It's also possible to equalize selected text nodes.
                        </p>                
                        <button id="equalize" class="btn btn-textfit">Text Fittie</button>   
                    </div>
                    
                    <!-- Smart Word Break -->
                    <div class="textfitContainer">                
                        <div class="textContainer">
                            <p class="smart-break">
                                I watched the movie 'It' and now I suffer from coulro~phobia.
                            </p>
                        </div>              
                        <p class="textfitTitle">
                            Smart word breaking for extra control over layout.
                        </p>                
                        <button id="smart-break" class="btn btn-textfit">Text Fittie</button>
                    </div>
                    
                </div>
            </section>
            <section class="plugin--explanation">
                <div class="explanation-container">
                    <h3 class="h3">The Plugin</h3>
                    <p class="p">
                        BB Text Fitter is a plugin developed to help you with fitting text into a limited amount of space. This can occur when designing a responsive site with some complex layout, or if you have text coming from a database that should fit a certain container, but you don't have control over the amount of text provided.
                        <br>
                        <br>
                        Thanks to some excellent user feedback over time, this plugin has come to include a wealth of interesting features. Most of these are included into the Text Fitter plugin itself, and can be configured by changing the plugin settings. The exception to this is the Equalize Text feature, which has evolved to become a separate plugin by itself. It is included with Text Fitter, and can be used immediately.
                    </p>
                    
                    
                    <hr>
                    
                    <h3 class="h3">Usage</h3>
                    <p class="p">
                        To start using the Text Fitter plugin, simply browse to the <a href="<?php echo $linkGit ?>" target="_blank">Github</a> page, download the plugin, and include it in your project. Instructions on how to use the plugin are provided there as well.
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
                     
                    <hr>
                    
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
        
        <!-- Page Footer & Common Script -->
        <?php include("../shared/_footer.php"); ?>
        
        <!-- Plugin -->
        <script src="js/jquery.bb-textfitter.js"></script>

        <!-- Call -->
        <script>
            $('#fit-regular').click(function() {
                $('.fit-regular').bbFitText();
            });
            
            $('#align-center').click(function() {
                $('.align-center').bbFitText({
                    centerHorizontal    : true,
                    centerVertical      : true
                });
            });
            
            $('#scale-up-width').click(function() {
                $('.scale-up-width').bbFitText({
                    scaleUpToo          : true
                });
            });
            
            $('#big-word').click(function() {
                $('.big-word').bbFitText();
            });
            
            $('#force-single-line').click(function() {
                $('.force-single-line').bbFitText({
                    forceSingleLine     : true
                });
            });
            
            $('#line-height').click(function() {
                $('.line-height').bbFitText({
                    lineHeight          : 2,
                    scaleUpToo          : true
                });
            });
            
            $('#font-combination').click(function() {
                $('.font-combination').bbFitText({
                    scaleUpToo          : true,
                    centerVertical      : true
                });
            });
            
            $('#padding-too').click(function() {
                $('.padding-too').bbFitText({
                    scaleUpToo          : true,
                    centerVertical      : true,
                    centerHorizontal    : true
                });
            });
            
            $('#multiple').click(function() {
                $('.multiple').bbFitText({
                    scaleUpToo          : 'true',
                    centerVertical      : true,
                    lineHeight          : 1.1,
                    forceSingleLine     : true
                });
            });
            
            $('#equalize').click(function() {
                $('.equalize').bbFitText({
                    scaleUpToo          : 'true',
                    centerVertical      : true,
                    lineHeight          : 1.1,
                    forceSingleLine     : true
                }).bbEqualizeText();
            });
            
            $('#smart-break').click(function() {
                $('.smart-break').bbFitText({
                    smartBreak          : true,
                    scaleUpToo          : true
                });
            });
        </script>
        
    </body>
</html>