        <div class="stuff">
            <div id="shareme" data-url="http://www.jsdelivr.com" data-text="jsDelivr - A free CDN for javascript and jquery plugins" data-title="share this page"></div>
        </div>
        <div class="sponsor">
             Official sponsors:<br>
            <a href="http://www.uservoice.com">
                <img alt="Sponsored by UserVoice" src="img/uservoice.png" width="122" height="27">
            </a>
        </div>
        <footer>
            <p>Also visit: <a href="http://www.super-ping.com/">super-ping.com</a> and <a href="http://www.cdnperf.com/">CDNperf</a></p>
            <hr>
            <p>
                jsDelivr &copy; 2014 | <a href="https://twitter.com/jimaek">@jimaek</a>
             </p>
             <ul>
                <li>contact@jsdelivr.com | <a href="https://groups.google.com/forum/#!forum/jsdelivr">Mailing Group</a></li>
                <li>For Developers: <a href="https://github.com/jsdelivr/api">Official API</a></li>
                <li>Design based on NASA.Code</li>
            </ul>
        </footer>
    </div> <!-- /container -->
    <script src="//cdn.jsdelivr.net/g/jquery@1.11.0,bootstrap@2.3.2,sharrre@1.3.5"></script>
    <script src='js/custom.js'></script>
    <script src='js/jquery.showMore.js'></script>

<?php if(!$google){ include('code/config.php');?>
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
                    var yt_url = 'http://<?php echo $domain; ?>/code/suggest.php?q=' + keyword;
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