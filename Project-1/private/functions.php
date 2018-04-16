<?php

// function that creates absolute url instead of being relative to .php location...
function url_for($script_path) {
    // add the leading '/' if not present
    if($script_path[0] != '/') {
        $script_path = '/' . $script_path;
    }

    return WWW_ROOT . $script_path;
}


// sanitizes the string input to meet url standards
function u($string=""){
    return urlencode("$string");

}
// sanitizes the string input to meet raw_url standards
function raw_u($string=""){
    return rawurlencode("$string");

}

// protects against XSS attacks
// use on all dynamic data input!
function h($string=""){
    return htmlspecialchars("$string");
}

function error_404(){
    header($_SERVER['SERVER_PROTOCOL'] . " 404 Not Found");
    exit();
}

function error_500(){
    header($_SERVER['SERVER_PROTOCOL'] . " 500 Internal Server Error");
    exit();
}

function redirect_to($location){
    header("location: " . $location);
    exit();
}

// checks if a form has been submitted
function is_post_request(){
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function is_get_request(){
    return $_SERVER['REQUEST_METHOD'] == 'GET ';
}