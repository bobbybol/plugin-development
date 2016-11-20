<?php 

    // SET VARIABLES
    $pageTitle="";
    $renderedTitle="";
    $pageDescription="";
    $keywords="";
    $pageClass="";
    $canonical="";
    $path="";
    $font="";
    
    // values for PLUGIN HOME
    if ($thisPage=="bb-plugins") {
        $pageTitle="All BB Plugins | by Bobby Bol";
        $renderedTitle="BB Plugins";
        $pageDescription="All BB Plugins";
        $keywords = "";
        $pageClass="bb-plugins";  
    }

    // values for BB ACCORDION
    elseif ($thisPage=="bb-accordion"){
        $pageTitle="BB Accordion Plugin | by Bobby Bol";
        $renderedTitle="BB Accordion";
        $pageDescription="A fully configurable JavaScript accordion plugin.";
        $keywords = "";
        $pageClass="bb-accordion";
        $canonical="/bb-accordion";
        $path="../";
        $font='<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">';
    }

    // values for BB TEXT FITTER
    elseif ($thisPage=="bb-textfitter"){
        $pageTitle="BB Text Fitter Plugin | by Bobby Bol";
        $renderedTitle="BB Text Fitter";
        $pageDescription="A JavaScript plugin to resize text in order to fit perfectly within its parent container.";
        $keywords = "";
        $pageClass="bb-textfitter";
        $canonical="/bb-textfitter";
        $path="../";
        $font='<link href="//fonts.googleapis.com/css?family=Gloria+Hallelujah|Josefin+Slab:300" rel="stylesheet">';
    }

    // values for BB PIXELIFY
    elseif ($thisPage=="bb-pixelify"){
        $pageTitle="BB Pixelify Plugin | by Bobby Bol";
        $renderedTitle="BB Pixelify";
        $pageDescription="A JavaScript plugin to resize text in order to fit perfectly within its parent container.";
        $keywords = "";
        $pageClass="bb-pixelify";
        $canonical="/bb-pixelify";
        $path="../";
    }

?>