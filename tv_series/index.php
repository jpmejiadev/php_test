<?php
include 'src/app/Controller.php';
include 'src/app/model/TVSerie.php';
include 'src/app/model/TVSerieInterval.php';
include 'src/config/database.php';
include 'src/db/DBManager.php';
include 'src/db/model/ResultDB.php';
include 'src/library/tools.php';
include 'src/views/View.php';
include 'src/views/SeriesView.php';
include 'src/views/JsonView.php';

try {
    $uri = getURI('/api/filter');
    $response = array();
    switch ($uri) {
        case '/api/next':
            Controller::getNextTVSerie();
            break;
        case '/api/filter':
            Controller::getSeriesFilterName();
            break;
        default:
            http_response_code(404);
            $view = new JsonView();
            $view->getView(array(
                'status' => 404,
                'message' => 'page not fount',
                'page' => $uri
            ));;
            break;
    }

} catch (Exception $e) {
    http_response_code(500);
    $view = new JsonView();
    $view->getView(array(
        'status' => 500,
        'message' => 'Internal Server Error',
        'page' => $e->getMessage()
    ));;}
