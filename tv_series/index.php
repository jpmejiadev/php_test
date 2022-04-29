<?php
include 'Controller.php';
include 'DBManager.php';
include 'ResultDB.php';
include 'TVSerie.php';
include 'TVSerieInterval.php';
include 'tools.php';

try {

    // Routing;
    $page = getQueryRequest('page', 'filter', "/^(filter|next)$/");
    $response = array();
    switch ($page) {
        case 'next':
            $weekDay = getQueryRequest('weekday', date('l'),
                "/^(monday|tuesday|wednesday|thursday|friday|saturday|sunday)$/");
            $time = getQueryRequest('time', date('H:i'), "/^[0-9]?[0-9]:[0-9][0-9]$/");
            $response = Controller::getNextTVSerie($weekDay, $time);
            break;
        case 'filter':
            $name = getQueryRequest('name', '', '/^[a-zA-Z0-9]*$/');
            $response = Controller::getSeriesFilterName($name);
            break;
        default:break;
    }

    // Section View
    $convertArray = function ($serie) {
        return $serie->toArray();
    };
    echo '<pre>';
    echo json_encode(array_map($convertArray, $response), JSON_PRETTY_PRINT);
    echo '</pre>';
} catch (Exception $e) {
    echo "ERROR: " . $e->getMessage();
}
