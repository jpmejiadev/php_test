<?php

class Controller
{
    public static function getNextTVSerie($weekDay, $time) {
        $query = DBManager::$mainQuery;
        $parameters = array();
        if(!empty($weekDay)) {
            // escape
            $query .= ' and week_day=:week_day';
            $parameters[':week_day'] = strtolower($weekDay);
            $query .= " and show_time > '" . $time ."' order by show_time asc limit 1";
        }
        $resultObjects = DBManager::getResultDBObject($query, $parameters);
        $results = DBManager::dbObjectToSerie($resultObjects);
        return $results;
    }

    public static function getSeriesFilterName($name) {
        $query = DBManager::$mainQuery;
        $parameters = array();
        if(!empty($name)) {
            // escape
            $query .= ' and title like :name';
            $parameters[':name'] = '%' . $name . '%';
        }
        $resultObjects = DBManager::getResultDBObject($query, $parameters);
        $results = DBManager::dbObjectToSerie($resultObjects);
        return $results;
    }
}
