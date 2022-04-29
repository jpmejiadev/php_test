<?php
class JsonView implements View {
    public function getView($params) {
        echo '<pre>';
        echo json_encode($params, JSON_PRETTY_PRINT);
        echo '</pre>';
    }
}