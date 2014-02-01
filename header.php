<?php
error_reporting(E_ERROR);
$google = $_GET["_escaped_fragment_"]; // https://developers.google.com/webmasters/ajax-crawling/docs/specification
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <?php if(!$google){ ?>
        <title>jsDelivr - Free CDN for javascript libraries, jQuery plugins, CSS frameworks, Fonts and more</title>
        <?php }else{ ?>
        <title>jsDelivr - Free CDN for <?php echo $google; ?> and other javascript libraries, jQuery plugins, CSS frameworks, Fonts and more</title>
        <link rel="canonical" href="http://www.jsdelivr.com.com/#!<?php echo $google; ?>">
        <?php } ?>
        <meta name="description" content="A free CDN for javascript and jquery plugins">
        <meta name="author" content="Dmitriy Akulov">
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="dns-prefetch" href="//cdn.jsdelivr.net">
        <link rel="dns-prefetch" href="//ajax.googleapis.com">
        <link rel="dns-prefetch" href="//www.google-analytics.com">
        <link rel="dns-prefetch" href="//widget.uservoice.com">
        <link rel="dns-prefetch" href="//by.uservoice.com">
        <link rel="dns-prefetch" href="//s3.amazonaws.com">
        <link rel="prefetch" href="http://cdn.jsdelivr.net/bootstrap/2.3.2/img/glyphicons-halflings-white.png" />
        <!--[if lt IE 9]>
            <script src="//cdn.jsdelivr.net/html5shiv/3.7.0/html5shiv.js"></script>
        <![endif]-->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/bootstrap/2.3.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="//cdn.jsdelivr.net/hint.css/1.2.1/hint.min.css">
        <link rel="stylesheet" href="css/style.css">

    </head>
