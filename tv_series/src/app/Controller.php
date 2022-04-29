<?php

class Controller
{
    public static function getNextTVSerie() {
        //validation request
        $weekDay = getQueryRequest('weekday', date('l'),
            "/^(monday|tuesday|wednesday|thursday|friday|saturday|sunday)$/");
        $time = getQueryRequest('time', date('H:i'), "/^[0-9]?[0-9]:[0-9][0-9]$/");
        //query db.
        $query = ConfigDatabase::$mainQuery;
        $parameters = array();
        if(!empty($weekDay)) {
            // escape
            $query .= ' and week_day=:week_day';
            $parameters[':week_day'] = strtolower($weekDay);
            $query .= " and show_time > '" . $time ."' order by show_time asc limit 1";
        }
        $resultObjects = DBManager::getResultDBObject($query, $parameters);
        $results = DBManager::dbObjectToSerie($resultObjects);
        // view
        $view = new SeriesView();
        $view->getView($results);
        return $results;
    }

    public static function getSeriesFilterName() {
        // validation request
        $name = getQueryRequest('name', '', '/^[a-zA-Z0-9]*$/');
        // query db for filtering by name if is empty return all series
        $query = ConfigDatabase::$mainQuery;

        $parameters = array();
        if(!empty($name)) {
            $query .= ' and title like :name';
            $parameters[':name'] = '%' . $name . '%';
        }
        $resultObjects = DBManager::getResultDBObject($query, $parameters);
        $results = DBManager::dbObjectToSerie($resultObjects);
        //view
        $view = new SeriesView();
        $view->getView($results);
        return $results;
    }
}
