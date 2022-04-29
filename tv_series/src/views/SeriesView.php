<?php
class SeriesView implements View {
    public function getView($params) {
        $convertArray = function ($serie) {
            return $serie->toArray();
        };
        echo '<pre>';
        echo json_encode(array_map($convertArray, $params), JSON_PRETTY_PRINT);
        echo '</pre>';
    }
}