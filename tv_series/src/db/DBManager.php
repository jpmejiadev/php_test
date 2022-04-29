<?php
class DBManager
{
    public static function getConnection()
    {
        $servername = ConfigDatabase::$servername;
        $username = ConfigDatabase::$username;
        $password = ConfigDatabase::$password;
        $database = ConfigDatabase::$database;
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }

    public static function getResultDBObject($query, $parameters)
    {
        $conn = self::getConnection();
        $statement = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $statement->execute($parameters);
        $statement->setFetchMode(PDO::FETCH_CLASS, 'ResultDB');
        $resultObjects = $statement->fetchAll();
        $conn = null;
        return $resultObjects;
    }
    public static function dbObjectToSerie($resultObjects){
        $results = array();
        foreach ($resultObjects as $resultObject) {
            if(!isset($results[$resultObject->id_tv_series])){
                $serie = new TVSerie();
                $serie->setTitle($resultObject->title);
                $serie->setChannel($resultObject->channel);
                $serie->setGender($resultObject->gender);
                $results[$resultObject->id_tv_series] = $serie;
            }
            $interval = new TVSerieInterval();
            $interval->setWeekday($resultObject->week_day);
            $interval->setShowTime($resultObject->show_time);
            $results[$resultObject->id_tv_series]->addTvSerialIntervals($interval);
        }
        return $results;
    }

}
