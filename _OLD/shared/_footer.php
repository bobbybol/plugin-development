<footer class="mainFooter">
    <p>Copyright © 2016 bobbybol.com - A project by Bobby Bol</p>
</footer>

<div class="preloader">
    <img class="prelogo" src="<?php echo $path ?>img/identity/bb-logo-100@2x.png" alt="bb plugin logo" />
</div>

<!-- jQuery -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

<script>
    $(window).load(function() {
        setTimeout(function() {
            $('.preloader').fadeOut();
        }, 200);
    });
</script>