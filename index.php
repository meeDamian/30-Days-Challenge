<?php
    require_once "libs/libs.inc";
    require_once "_config.inc";
?>

<!DOCTYPE html>
<!-- this site external address: http://goo.gl/ZDdzf -->
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!-- Consider adding a manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">

    <!-- Use the .htaccess and remove these lines to avoid edge case issues.
        More info: h5bp.com/b/378 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>30 days challange</title>

    <meta name="description" content=" The challange to keep you busy for following 30 days. ">
    <meta name="author" content="Maurycy Damian Wasilewski">

    <!-- Mobile viewport optimized: h5bp.com/viewport -->
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <link rel="stylesheet" href="css/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="js/libs/modernizr-2.0.6.min.js"></script>
    <script src="js/mylibs/fileuploader.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/script.js"></script>

    <!-- Asynchronous Google Analytics snippet. -->
    <script>
        var _gaq=[['_setAccount','UA-12389124-4'],['_trackPageview']];
        (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
        g.src=('https:'==location.protocol?'https://ssl':'http://www')+'.google-analytics.com/ga.js';
        s.parentNode.insertBefore(g,s)}(document,'script'));
    </script>
</head>
<body>

    <? if($fb['on']): ?>
        <!-- root node required by fb -->
        <div id="fb-root"></div>
        <!-- init facebook js sdk -->
        <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=<?=$fb['app_id'];?>";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
    <? endif; ?>

    <!-- Top user bar -->
    <header id="ubar"></header>

    <!-- main|current content -->
    <section id="main" role="main">

        <section id="login_openid">

            <? if($fb['on']): ?>
                <div class="fb-login-button" data-show-faces="false" data-width="200" data-max-rows="1" scope="<?=$fb['scope'];?>"></div>
            <? endif; ?>

            <div id="login_google">
            </div>

        </section>

        <form id="login_site" action="jx/do.php" method="post">
            <input type="hidden" name="action" value="login" />
            <input type="email" name="l_email" placeholder="Your email address..." />
            <input type="password" name="l_password" placeholder="Your password..." />
            <input type="submit" name="l_submit" value="Login" />
            <a href="#forget">forgotten password</a>
        </form>

        <form id="register_site" action="jx/do.php" method="post">
            <input type="hidden" name="action" value="register" />
            <input type="email" name="r_email" placeholder="Your email address" />
            <input type="email" name="r_email2" placeholder="Re-enter your email" />
            <input type="password" name="r_password" placeholder="New password" />
            <input type="submit" name="l_submit" value="Register" />
        </form>

    </section>

    <!-- some footer stuff (send feedback, etc...) -->
    <footer>

    </footer>

    <!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
        chromium.org/developers/how-tos/chrome-frame-getting-started -->
    <!--[if lt IE 7 ]>
        <script defer src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
        <script defer>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
    <![endif]-->

</body>
</html>
