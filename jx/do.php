<?
    $ajax = true;
    require_once "../libs/libs.inc";
    require_once "../_config.inc";

    /*
     * ALL CUSTOM AJAX REFERENCES HAPPENS HERE
     *
     * adding new action:
     * - add new line in switch
     * - add function to be called in switch to the end of file
     * - include all includes and headers in the beginning of your function
     */

    /** *************
     * choose action
     ************* **/
    $action = ((isset($_POST['action'])) ? ( (!empty($_POST['action'])) ? $_POST['action'] : false ) : false);

    if( !$action ) header("Location: /404.html");

    switch($action) {
        case 'log':         jx_log();           break;
        case 'login':       legacy_login();     break;
        case 'register':    legacy_register();  break;
        case 'script':      giveScript();       break;
        default:            invalid_action();   break;
    }

    /** ****************************
     * perform actions chosen above
     **************************** **/

     function invalid_action() {
        head('json');
        respond(false, 'invalid action');
     }

    function jx_log() {
        head('json');

        $msg =  (isset($_POST['msg'] )) ? ( (!empty($_POST['msg'] )) ? $_POST['msg']  : false ) : false;
        $type = (isset($_POST['type'])) ? ( (!empty($_POST['type'])) ? $_POST['type'] : 'ajax' ) : 'ajax';

        if($msg) toLog($msg,'ajax');
        else respond('false', 'logged with empty msg');  // all saving already happens in respond(), so no need to double it
    }

    function legacy_login() {
        head('json');

        respond(false, 'not implemented yet');
        // check is user is_logged(); if so set proper cookies
        // if anything on the way fails: remove all cookies|session data
    }

    function legacy_register() {
        head('json');
        respond(false, 'not implemented yet');

        
        // check if this email hasn't been already used?
        //  - yes, by legacy_register  => prompt to login or remind password instead
        //  - yes, with social network => login and prompt to login to that network and merge accounts
        //  - no, newer-ever seen that email b4 && everything else is valid => create account and login
        // if user havn't already set account, create one for him and login him to the page right after that
    }

    function giveScript() {
        head('script');
        ?>alert("new script successfully loaded!");<?
    }

?>
