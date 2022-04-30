<?php
require 'vendor/autoload.php';
include 'src/ABTestingGenerator.php';
include 'src/ABPromotion.php';
include 'src/library/tools.php';
try {
    $id = getQueryRequest('id', 0, "/^[123]$/");
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