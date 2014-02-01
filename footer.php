        <div class="stuff">
            <div id="shareme" data-url="http://www.jsdelivr.com" data-text="jsDelivr - A free CDN for javascript and jquery plugins" data-title="share this page"></div>
        </div>
        <div class="sponsor">
             Official sponsors:<br>
            <a href="http://www.uservoice.com">
                <img alt="Sponsored by UserVoice" src="images/uservoice.png" width="122" height="27">
            </a>
        </div>
        <footer>
            <p>Also visit: <a href="http://www.super-ping.com/">super-ping.com</a></p>
            <hr>
            <p>
                jsDelivr &copy; 2013 | <a href="https://twitter.com/jimaek">@jimaek</a>
             </p>
             <ul>
                <li>contact@jsdelivr.com | <a href="https://groups.google.com/forum/#!forum/jsdelivr">Mailing Group</a></li>
                <li>Dev: <a href="http://api.jsdelivr.com/packages.php">Packages</a> - <a href="http://www.jsdelivr.com/hash.xml">Packages &amp; Hash</a></li>
                <li>Design based on NASA.Code</li>
                <li>Support us by donating Bitcoins<br>1HZrTcdVieoDsihhBhE3gcnGxR9isJENMT</li>
            </ul>
        </footer>
    </div> <!-- /container -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src='//cdn.jsdelivr.net/bootstrap/2.3.2/js/bootstrap.min.js'></script>
    <script src='//cdn.jsdelivr.net/sharrre/1.3.5/jquery.sharrre.min.js'></script>
    <script src='js/custom.js'></script>
    <script src='js/jquery.showMore.js'></script>

<?php if(!$google){?>
    <script>
        // Search
        $(document).ready(gogo());
        $(window).bind('hashchange', function () {
            var file = window.location.hash;
            file = file.replace(/\#!/g, "");
            if (file) {
                document.getElementById('s').value = file;
                $(".search_input").keyup(function () {

                    var search_input = $(this).val();
                    var keyword = encodeURIComponent(search_input);
                    var yt_url = 'http://www.jsdelivr.com/code/suggest.php?q=' + keyword;
                    $.ajax({
                        type: "GET",
                        url: yt_url,

                        success: function (response) {
                            $("#result").html('');
                            if (response.length) {
                                $("#result").append(response);
                            }

                        }

                    });
                }).keyup();

            }
        });
    </script>
<?php } ?>

    <script>
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-31822709-1']);
        _gaq.push(['_trackPageview']);

        (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();

        (function(w, d) { var a = function() { var a = d.createElement('script'); a.type = 'text/javascript';
        a.async = 'async'; a.src = '//' + ((w.location.protocol === 'https:') ? 's3.amazonaws.com/cdx-radar/' :
        'radar.cedexis.com/') + '01-11475-radar10.min.js'; d.body.appendChild(a); };
        if (w.addEventListener) { w.addEventListener('load', a, false); }
        else if (w.attachEvent) { w.attachEvent('onload', a); }
        }(window, document));
    </script>


    </body>
</html>