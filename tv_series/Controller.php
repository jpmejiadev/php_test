<?php


class Controller
{
    public static function getNextTVSerie($weekDay, $time) {
        $query = DBManager::$mainQuery;
        $parameters = array();
        if(!empty($weekDay)) {
            $query .= ' and week_day=:week_day';
            $parameters[':week_day'] = strtolower($weekDay);
            $query .= " and show_time > '" . $time ."' order by show_time asc limit 1";
            //$parameters[':show_time'] = '01:47:00';
        }
        //var_dump($time);die;
        $resultObjects = DBManager::getResultDBObject($query, $parameters);
        $results = DBManager::dbObjectToSerie($resultObjects);
        return $results;
    }

    public static function getSeriesFilterName($name) {
        $query = DBManager::$mainQuery;
        $parameters = array();
        if(!empty($name)) {
            $query .= ' and title like :name';
            $parameters[':name'] = '%' . $name . '%';
        }
        $resultObjects = DBManager::getResultDBObject($query, $parameters);
        $results = DBManager::dbObjectToSerie($resultObjects);
        return $results;
    }
}
