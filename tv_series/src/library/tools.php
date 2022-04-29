<?php
function getQueryRequest($parameter, $default, $patternValidation) {
    $_GET   = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
    $query = $default;
    if(isset($_GET[$parameter])) {
        if(!preg_match($patternValidation, $_GET[$parameter])) {
            throw new Exception("Invalid Format $_GET[$parameter], format valid : " .$patternValidation);
        }
        $query = $_GET[$parameter];
    }
    return $query;
}

function getURI($defaultURI) {
    $request = $_SERVER['REQUEST_URI'];
    $request = explode('?', $request);
    $request = $request[0];
    $request = $request == '/' ? $defaultURI : $request;
    return $request;
}