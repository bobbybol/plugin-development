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
    $linkGit="";
    $linkDL="";

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
        $linkGit="https://github.com/bobbybol/textFitter";
        $linkDL="https://github.com/bobbybol/textFitter/archive/master.zip";
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
        $linkGit="https://github.com/bobbybol/pixelify";
        $linkDL="https://github.com/bobbybol/pixelify/archive/master.zip";
    }

?>