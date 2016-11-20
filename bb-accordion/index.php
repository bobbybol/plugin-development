<!doctype html>
<html class="no-js" lang="en">

    <!-- Declare current Page -->
    <?php $thisPage="bb-accordion"; ?>

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
                <div class="myAccordion">
                    <div class="myAccordion--topbar clearfix">
                        <p class="icon">
                            <i class="fa fa-hand-rock-o" aria-hidden="true"></i>
                        </p>
                        <p class="title">Rock</p>
                        <p class="toggle bb-accordion--button">
                            <i class="fa fa-chevron-down" aria-hidden="true"></i>
                        </p>
                    </div>
                    <div class="myAccordion--content bb-accordion--outer">
                        <div class="bb-accordion--inner">
                            <ul>
                                <li>
                                    Rock crushes Scissors
                                    <span class="win">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    </span>
                                </li>
                                <li>
                                    Rock crushes Lizard
                                    <span class="win">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    </span>
                                </li>
                                <li>
                                    Paper Covers Rock
                                    <span class="lose">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </span>
                                </li>
                                <li>
                                    Spock vaporizes Rock
                                    <span class="lose">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="myAccordion">
                    <div class="myAccordion--topbar clearfix">
                        <p class="icon">
                            <i class="fa fa-hand-paper-o" aria-hidden="true"></i>
                        </p>
                        <p class="title">Paper</p>
                        <p class="toggle bb-accordion--button">
                            <i class="fa fa-chevron-down" aria-hidden="true"></i>
                        </p>
                    </div>
                    <div class="myAccordion--content bb-accordion--outer">
                        <div class="bb-accordion--inner">
                            <ul>
                                <li>
                                    Paper Covers Rock
                                    <span class="win">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    </span>
                                </li>
                                <li>
                                    Paper disproves Spock
                                    <span class="win">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    </span>
                                </li>
                                <li>
                                    Scissors cuts Paper
                                    <span class="lose">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </span>
                                </li>
                                <li>
                                    Lizard eats Paper
                                    <span class="lose">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="myAccordion">
                    <div class="myAccordion--topbar clearfix">
                        <p class="icon">
                            <i class="fa fa-hand-scissors-o" aria-hidden="true"></i>
                        </p>
                        <p class="title">Scissors</p>
                        <p class="toggle bb-accordion--button">
                            <i class="fa fa-chevron-down" aria-hidden="true"></i>
                        </p>
                    </div>
                    <div class="myAccordion--content bb-accordion--outer">
                        <div class="bb-accordion--inner">
                            <ul>
                                <li>
                                    Scissors cuts Paper
                                    <span class="win">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    </span>
                                </li>
                                <li>
                                    Scissors decapitate Lizard
                                    <span class="win">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    </span>
                                </li>
                                <li>
                                    Rock crushes Scissors
                                    <span class="lose">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </span>
                                </li>
                                <li>
                                    Spock smashes Scissors
                                    <span class="lose">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="myAccordion">
                    <div class="myAccordion--topbar clearfix">
                        <p class="icon">
                            <i class="fa fa-hand-lizard-o" aria-hidden="true"></i>
                        </p>
                        <p class="title">Lizard</p>
                        <p class="toggle bb-accordion--button">
                            <i class="fa fa-chevron-down" aria-hidden="true"></i>
                        </p>
                    </div>
                    <div class="myAccordion--content bb-accordion--outer">
                        <div class="bb-accordion--inner">
                            <ul>
                                <li>
                                    Lizard poisons Spock
                                    <span class="win">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    </span>
                                </li>
                                <li>
                                    Lizard eats Paper
                                    <span class="win">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    </span>
                                </li>
                                <li>
                                    Rock crushes Lizard
                                    <span class="lose">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </span>
                                </li>
                                <li>
                                    Scissors decapitate Lizard
                                    <span class="lose">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="myAccordion">
                    <div class="myAccordion--topbar clearfix">
                        <p class="icon">
                            <i class="fa fa-hand-spock-o" aria-hidden="true"></i>
                        </p>
                        <p class="title">Spock</p>
                        <p class="toggle bb-accordion--button">
                            <i class="fa fa-chevron-down" aria-hidden="true"></i>
                        </p>
                    </div>
                    <div class="myAccordion--content bb-accordion--outer">
                        <div class="bb-accordion--inner">
                            <ul>
                                <li>
                                    Spock smashes Scissors
                                    <span class="win">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    </span>
                                </li>
                                <li>
                                    Spock vaporizes Rock
                                    <span class="win">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    </span>
                                </li>
                                <li>
                                    Lizard poisons Spock
                                    <span class="lose">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </span>
                                </li>
                                <li>
                                    Paper disproves Spock
                                    <span class="lose">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <section class="plugin--explanation">
                <div class="explanation-container">
                    <h3 class="h3">Fully customizable</h3>
                    <p class="p">Nori grape silver beet broccoli kombu beet greens fava bean potato quandong celery. Bunya nuts black-eyed pea prairie turnip leek lentil turnip greens parsnip. Sea lettuce lettuce water chestnut eggplant winter purslane fennel azuki bean earthnut pea sierra leone bologi leek soko chicory celtuce parsley salsify.

                    Celery quandong swiss chard chicory earthnut pea potato. Salsify taro catsear garlic gram celery bitterleaf wattle seed collard greens nori. Grape wattle seed kombu beetroot horseradish carrot squash brussels sprout chard.</p>
                </div>
            </section>
        </main>
        
        <!-- Page Footer -->
        <?php include("../shared/_footer.php"); ?>
        
        <!-- jQuery -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

        <!-- Plugin -->
        <script src="js/jquery.bb-accordion.js"></script>

        <!-- Call -->
        <script>
            $('.myAccordion').bbAccordion({
                changeButtonHtml: true,
                toggledButtonHtml: '<i class="fa fa-chevron-up" aria-hidden="true"></i>'
            });
        </script>
        
    </body>
</html>