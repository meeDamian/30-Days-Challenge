<?
    $lang = "en";
    $URL = "//".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

    /*********************************
     * Database connection
     * - $db array is in vars/_db_.inc
     *********************************/

    require_once "vars/_db_.inc";
    if($db['on']) {

        $db_c = mysql_pconnect($db['host'], $db['user'], $db['pass']); // persistent connection
        if(!$db_c) {
            toLog('MySQL error while connecting to: "' . $db['host'] . '" as: "' . $db['user'] . '"', 'error');
            $db_s = false;
        } else {
            $db_s = mysql_select_db($db['name'], $db_c);
            if(!$db) toLog('MySQL error while selecting "' . $db['name'] . '"', 'error');
        }

        // raport error if it's not test
        if(!$test and (!$db_c or !$db_s)) {
            header('HTTP/1.0 500 Internal Server Error');
            exit("<h1>500 Internal Server Error</h1>\n<p>The server encountered an unexpected condition which prevented it from fulfilling the request. (".((!$db_c)?"connect":"select").")</p>");
        }
    }


    /*************************
     * Manage reference stats
     *************************/

    session_start();
    if(isset($_GET['utm_source'])) {
        $_SESSION['source'] = $_GET['utm_source'];
        $_SESSION['medium'] = (isset($_GET['utm_medium'])) ? $_GET['utm_medium'] : false;
    } elseif(isset($_GET['from'])) $_SESSION['source'] = $_GET['from'];
    elseif(!isset($_SESSION['source'])) $_SESSION['source'] = $_SESSION['medium'] = false;


    /********************
     * Facebook settings
     ********************/

    require_once "vars/_fb_.inc";
    if($fb['on']) {
        // do somfink hir
    }

    /********************
     * Google+ settings
     ********************/

    require_once "vars/_gplus_.inc";
    if($gplus['on']) {
        // nothing to put here yet :(
    }


    
?>