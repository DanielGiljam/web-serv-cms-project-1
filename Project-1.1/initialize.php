<?php

    ob_start(); // output buffering is turned on

    // Assign the root URL to a PHP constant
    // * Do not need to include the domain
    // * Use same document root as webserver
    // define("WWW_ROOT", ''); //on production machine
    // * Can dynamically find everything in URL up to "/public"
    $public_end = strpos($_SERVER['SCRIPT_NAME'], '/project-1.1') + 8;
    $doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
    define("WWW_ROOT", $doc_root);

    require_once ("functions.php");
    require_once ("database.php");
    require_once ("query_functions.php");

    $db = db_connect();