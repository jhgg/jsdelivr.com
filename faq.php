<?php include('header.php'); ?>

<body>
    <div class="github-fork-ribbon-wrapper right">
        <div class="github-fork-ribbon">
            <a href="https://github.com/jimaek/jsdelivr">Fork me on GitHub</a>
        </div>
    </div>
    <div class="container">
        <header class="clearfix">
            <h1>
                <a href="index.php">
                    <img src="images/jsdelivr-logo.png" alt="jsdelivr.com">
                </a>
            </h1>
            <div id="plugins">
                <a href="http://wordpress.org/extend/plugins/jsdelivr-wordpress-cdn-plugin/">
                    <img src="images/wordpress-logo-square.png" width="40" height="40" alt="Get jsDelivr for WordPress" title="Get WordPress Plugin">
                </a>
                <!--<img src="images/joomla-s.png" width="40" height="40" alt="Get jsDelivr for Joomla" title="Joomla plugin coming *not* soon">
                    <img src="images/drupal.png" width="40" height="40" alt="Get jsDelivr for Drupal" title="Drupal plugin coming *not* soon">-->
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

        <div class="row first single">
            <div class="span11">
                <h3>FAQ</h3>

                <h2>How can jsDelivr be free? How can it survive in the long term?</h2>
                <p>
                    CDN traffic is expensive, yes. But all of our traffic and services are sponsored by awesome companies
                    that want to make the web a faster and better place. Check out the footer for credits.<br>
                    It means that it doesnt matter how much traffic a plugin or project can generate, there is nothing to worry about.
                </p>

                <h2>Are there any bandwidth limits?</h2>
                <p>
                    No and there will never be.
                </p>

                <h2>Why are some projects tagged as version 0.1?</h2>
                <p>
                    Some times its hard to find what version is a project because the developer doesnt mention it anywhere.
                    In these cases we just use 0.1 as the starting version and increase it on next updates.
                </p>

                <h2>Why do some files lead to 404 errors?</h2>
                <p>
                    This happens when the propagation through the CDN takes longer than usual.
                    Just wait a little bit and the error should fix.
                </p>

                <h2>Many projects have wrong Github links</h2>
                <p>
                    Yes, unfortunately in the first version of jsDelivr all projects only had a homepage link.
                    In the new version we decided to add a github link too. So all the files added before the update
                    don't have a github link. Its something that is going to be fixed in time.
                </p>

                <h2>Can I use HTTPS to load files from your CDN?</h2>
                <p>
                    Yes, we have a valid SSL certificate. All cdn.jsdelivr.net traffic can be served via HTTPS without any problems.
                </p>

                <h2>Do you actually use the Github repo?</h2>
                <p>
                    Yes, all changes made to the github repo of jsDelivr are synced to the CDN.
                    Create pulls, open tickets, make a difference.
                </p>

                <h2>How are you making money?</h2>
                <p>
                    I don't, the project is a non-profit. Most of the stuff is sponsored by companies and rest is paid by me.
                </p>

                <h2>How can I help?</h2>
                <p>
                    If you are a company you could consider donating your services or products.
                    You could also help us with promoting our product, integrating jsDelivr into your own solutions,
                    donating money, giving advices, ideas, human resources... As a non-profit we will appriciate anything at all.
                    The same goes for individuals, you can always donate money or even help with the development/design.
                    Write blog posts or submit new ideas and features. Just send us an email.
                </p>

                <h2>Who's is behind jsDelivr?</h2>
                <p>
                    Basically just me, Dmitriy A. or <a href="https://twitter.com/jimaek">@jimaek</a>.
                    But a lot of other people are involved, giving their advice and helping me out.
                    I always refer to jsDelivr in the plural sense because of this.
                </p>

                <h2>Your grammar sucks.</h2>
                <p>
                    English is not my native language. I try to proof-read all of my content but it's hard.
                    Send me an email if you find any mistakes or want to help me with the content.
                </p>

                <h2>Your coding/design sucks.</h2>
                <p>
                    Maybe, I work as a system administrator and I never actually studied programming or web design.
                    Its just a hobby of mine, everything I know comes from different sources and online tutorials.
                    The important this is that it all works! :)
                </p>
            </div> <!-- span11 -->
        </div> <!-- row first single -->



<?php include('footer.php'); ?>
