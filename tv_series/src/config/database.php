<?php
class ConfigDatabase {
    public static $servername = "localhost";
    public static $username = "root";
    public static $password = "";
    public static $database = "test";
    public static $mainQuery = 'select * from tv_series as s, tv_series_intervals as i where s.id=id_tv_series ';
}
