<?php include('header.php'); ?>
<?php include('code/config.php'); ?>

<body>
    <div class="github-fork-ribbon-wrapper left">
        <div class="github-fork-ribbon">
            <a href="https://github.com/jimaek/jsdelivr">Fork me on GitHub</a>
        </div>
    </div>
    <div class="container">
        <header class="clearfix">
            <h1>
                <a href="index.php"><img src="images/jsdelivr-logo.png" alt="jsdelivr.com"></a>
            </h1>
            <div id="plugins">
                <a href="http://wordpress.org/extend/plugins/jsdelivr-wordpress-cdn-plugin/"><img width="40" height="40" alt="Get jsDelivr for WordPress" title="Get WordPress Plugin" src="images/wordpress-logo-square.png"></a>
                <!--<img width="40" height="40" alt="Get jsDelivr for Joomla" title="Joomla plugin coming *not* soon" src="images/joomla-s.png">
                    <img width="40" height="40" alt="Get jsDelivr for Drupal" title="Drupal plugin coming *not* soon" src="images/drupal.png">-->
            </div>
            <div id="sponsortop">
                <a href="https://portal.cdn.net/priceplan/createfreetrialnocc/3?content=whycdnnet&amp;utm_source=jsdelivr&amp;utm_medium=banner&amp;utm_campaign=sponsorship"><img alt="Sponsored by CDN.NET" src="images/cdnnet.png"></a>
                <a href="http://tracking.maxcdn.com/c/47243/36539/378"><img alt="Sponsored by MaxCDN" src="images/maxcdn.png"></a>
                <a href="http://www.cedexis.com"><img alt="Sponsored by Cedexis" src="images/cedexis.png"></a>
            </div>
            <nav>
                <ul>
                    <li><a href="network.php">Network</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="faq.php">FAQ</a></li>
                    <li><a target="_blank" href="http://blog.jsdelivr.com">Blog <i class="icon-share-alt icon-white"></i></a></li>
                    <li id="submit"><a href="https://github.com/jimaek/jsdelivr">Submit</a></li>
                </ul>
            </nav>
        </header>
        <h3>A free super-fast CDN for developers and webmasters.</h3>
        <p style="margin-top:-17px;">
            Search for javascript libraries, jQuery plugins, fonts, CSS frameworks and anything else you might need. You can submit if something is missing.
            <p>
                <div class="hosted">
                    <p>
                        <span style="text-shadow: 1px 1px 1px #969696; font-size:24px; color:#000;">870</span> projects hosted
                    </p>
                </div>
                <label class="hide" for="s">Search:</label>
                <input type="text" class="search_input" id="s" autofocus placeholder="What are you looking for?"/>
                <div id="result">
<?php if ($google) {
    include('code/suggest.php'); // If google bot then dont use ajax but simply generate a static html page with the results he requested.
    } else {
?>
                    <img src="images/ajax-loader.gif" alt="Loading" width="16" height="16"/>
<?php } ?>
                </div>
                <div class="modal hide" id="update" style="width:290px; margin-left: -170px;">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">x</button>
                        <h3>A new version available?</h3>
                    </div>
                    <div class="modal-body">
                        Please enter your email and press send. <br/>We will receive your request and will try to find a newer version of this project.<br/> If we can't we will contact you.
                        <form method="post" action='code/newversion.php' name="update_form">
                            <input type="text" class="span3" name="project" id="project" placeholder="Project" readonly>
                            <input type="text" class="span3" name="email" id="email" placeholder="Email">
                            <p>
                                <button type="submit" class="btn btn-primary">Send</button>
                            </p>
                        </form>
                    </div>
                </div>

<?php include('footer.php'); ?>
