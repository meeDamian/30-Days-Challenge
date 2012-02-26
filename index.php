<?
    $ajax = false;
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
    <!-- Google Analytics -->
    <script>var _gaq=_gaq||[];_gaq.push(['_setAccount','UA-29448228-1']);_gaq.push(['_trackPageview']);(function(){var ga=document.createElement('script');ga.type='text/javascript';ga.async=true;ga.src=('https:'==document.location.protocol?'https://ssl':'http://www')+'.google-analytics.com/ga.js';var s=document.getElementsByTagName('script')[0];s.parentNode.insertBefore(ga,s);})();</script>
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
                <a id="login_facebook_btn" class="openid_btn" title="log in with Facebook" href="<?=$fb['loginUrl'];?>"></a>
            <? endif; ?>

            <a id="login_google_btn" class="openid_btn"></a>

            <a id="login_openid_btn" class="openid_btn"></a>

        </section>

        <form id="login_site">
            <input type="hidden" name="action" value="login" />

            <input type="email" name="email" id="l_email" pattern="<?=EMAIL_REGEXP;?>" placeholder="Your email address..." />
            <label for="l_email" id="l_email-l"></label>

            <input type="password" name="password" id="l_password" placeholder="Your password..." />
            <label for="l_password" id="l_password-l"></label>

            <input type="submit" name="l_submit" value="Login" />

            <a href="#forget" id="forgot_site">forgotten password</a>
        </form>

        <form id="register_site">
            <input type="hidden" name="action" value="register" />

            <input type="email" name="email" id="r_email" pattern="<?=EMAIL_REGEXP;?>" placeholder="Your email address" />
            <label for="r_email" id="r_email-l"></label>

            <input type="email" name="email2" id="r_email2" pattern="<?=EMAIL_REGEXP;?>" placeholder="Re-enter your email" />
            <label for="r_email2" id="r_email2-l"></label>

            <input type="password" name="password" id="r_password" placeholder="New password" />
            <label for="r_password" id="r_password-l"></label>

            <input type="submit" name="l_submit" value="Register" />
        </form>

    </section>

    <!-- some footer stuff (send feedback, etc...) -->
    <footer>

        <!-- temporary not implemented-yet-info section -->
        <section id="not-yet-implemented">
            <h2>Oups, error :(</h2>
            <p>This function has not been implemented yet...</p>
        </section>
    </footer>

    <!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
        chromium.org/developers/how-tos/chrome-frame-getting-started -->
    <!--[if lt IE 7 ]>
        <script defer src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
        <script defer>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
    <![endif]-->

</body>
</html>
