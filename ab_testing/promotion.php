<?php
require 'vendor/autoload.php';
include 'ABTestingGenerator.php';

$id = 0;
if(isset($_GET['id'])){
    $id = intval($_GET['id']);
}
try {
    $main = new ABTestingGenerator();
    $promotion = $main->getData($id);
    echo '<pre>';
    echo json_encode($promotion->toArray(), JSON_PRETTY_PRINT);
    echo '</pre>';
} catch (Exception $exception) {
    http_response_code(404);
    echo '<pre>';
    echo json_encode(array(
        'status' => 404,
        'message' => $exception->getMessage()
    ), JSON_PRETTY_PRINT);
    echo '</pre>';
}