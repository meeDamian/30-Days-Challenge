<?

    $test = true;

    require_once "_config.inc";

    $type       = (isset($_GET['json'])) ? ( ($_GET['json'] == "true") ? "json" : "http" ) : 'http';
    $detailed   = (isset($_GET['detailed'])) ? ( ($_GET['detailed'] == "true") ? true : false ) : false;

    if($type == 'http' ) { // nagios output

        // if can't connect to db
        if (!$db_c) {
            toLog('NAGIOS test requested: CONNECT ERROR', 'admin');
            header("HTTP/1.0 500 Internal Server Error");
            exit();
        }

        // if can't select db
        if (!$db_s) {
            toLog('NAGIOS test requested: SELECT ERROR', 'admin');
            header("HTTP/1.0 500 Internal Server Error");
            exit();
        }

        exit('<p>ALL success</p>');
        toLog('NAGIOS test requested: PASSED', 'admin');

    } else {
        header('Content-Type: application/json; charset=utf-8');
        // TODO: generate json raport
    }
?>
