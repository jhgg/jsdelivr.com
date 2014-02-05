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
            <a class="pull-left" href="index.php">
                <img src="img/jsdelivr-logo.png" alt="jsdelivr.com" width="167" height="50">
            </a>
            <div class="sponsortop">
                <a href="https://portal.cdn.net/priceplan/createfreetrialnocc/3?content=whycdnnet&amp;utm_source=jsdelivr&amp;utm_medium=banner&amp;utm_campaign=sponsorship"><img src="img/cdnnet.png" alt="Sponsored by CDN.NET" width="53" height="40"></a>
                <a href="http://tracking.maxcdn.com/c/47243/36539/378"><img src="img/maxcdn.png" alt="Sponsored by MaxCDN" width="110" height="26"></a>
                <a href="http://www.cedexis.com"><img src="img/cedexis.png" alt="Sponsored by Cedexis" width="85" height="27"></a>
            </div>
            <nav class="pull-right">
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
        <p class="header-note">
            Search for javascript libraries, jQuery plugins, fonts, CSS frameworks and anything else you might need. You can submit if something is missing.
            <p>
                <div class="hosted">
                    <p>
                        <span>914</span> projects hosted
                    </p>
                </div>
                <label class="hide" for="s">Search:</label>
                <input type="text" class="search_input" id="s" autofocus placeholder="What are you looking for?">
                <div id="result">
<?php if ($google) {
    include('code/suggest.php'); // If google bot then dont use ajax but simply generate a static html page with the results he requested.
    } else {
?>
                    <img src="img/ajax-loader.gif" alt="Loading" width="16" height="16">
<?php } ?>
                </div>
                <div class="modal hide fade" id="update">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3>A new version available?</h3>
                    </div>
                    <div class="modal-body">
                        <p>Please enter your email and press send.<br>
                        We will receive your request and will try to find a newer version of this project.<br>
                        If we can't we will contact you.</p>
                        <form method="post" class="form-inline" action="code/newversion.php" name="update_form">
                            <input type="text" class="span3" name="project" id="project" placeholder="Project" readonly>
                            <input type="text" class="span3" name="email" id="email" placeholder="Email">
                            <button type="submit" class="btn btn-primary">Send</button>
                        </form>
                    </div>
                </div>

<?php include('footer.php'); ?>
