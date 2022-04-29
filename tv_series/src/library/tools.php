<?php
function getQueryRequest($parameter, $default, $patternValidation){
    $query = $default;
    if(isset($_GET[$parameter])) {
        if(!preg_match($patternValidation, $_GET[$parameter])) {
            throw new Exception("Invalid Format $_GET[$parameter], format valid : " .$patternValidation);
        }
        $query = $_GET[$parameter];
    }
    return $query;
}
