<?php
include 'DBManager.php';

$weekDay = date('l');
$time = date('H:i');
if(isset($_GET['weekday'])) {
    $weekDay = $_GET['weekday'];
    $weekDay = date('l', strtotime($weekDay));
}

if(isset($_GET['time'])) {
    $time = $_GET['time'];
}
$name = 'T';
if(isset($_GET['name'])) {
    $time = $_GET['name'];
}
// regex
// page next | filter name
$page = 'next';
if(isset($_GET['page'])) {
    $time = $_GET['page'];
}
try {
    // Routing;
    $response = array();
    if($page == 'next') {
        $response = DBManager::getNextTVSerie($weekDay, $time);
    } else if($page == 'filter') {
        $response = DBManager::getSeriesFilterName($name);
    }
    // Section View
    $convertArray = function ($serie) {
        return $serie->toArray();
    };
    echo '<pre>';
    echo json_encode(array_map($convertArray, $response), JSON_PRETTY_PRINT);
    echo '</pre>';
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
