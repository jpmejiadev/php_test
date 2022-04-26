<?php


$weekDay = date('l');
$time = date('H:i');
if(isset($_GET['weekday'])) {
    $weekDay = $_GET['weekday'];
    $weekDay = date('l', strtotime($weekDay));
}

if(isset($_GET['time'])) {
    $time = $_GET['time'];
}

class TVSerie {
    private $title;
    private $channel;
    private $gender;
    private $tvSerialIntervals;

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getChannel()
    {
        return $this->channel;
    }

    /**
     * @param mixed $channel
     */
    public function setChannel($channel)
    {
        $this->channel = $channel;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return mixed
     */
    public function getTvSerialIntervals()
    {
        return $this->tvSerialIntervals;
    }

    /**
     * @param mixed $tvSerialIntervals
     */
    public function setTvSerialIntervals($tvSerialIntervals)
    {
        $this->tvSerialIntervals = $tvSerialIntervals;
    }

}
class TVSerieInterval {
    private $weekday;
    private $showTime;

    /**
     * @return mixed
     */
    public function getWeekday()
    {
        return $this->weekday;
    }

    /**
     * @param mixed $weekday
     */
    public function setWeekday($weekday)
    {
        $this->weekday = $weekday;
    }

    /**
     * @return mixed
     */
    public function getShowTime()
    {
        return $this->showTime;
    }

    /**
     * @param mixed $showTime
     */
    public function setShowTime($showTime)
    {
        $this->showTime = $showTime;
    }

}
// regex
$servername = "localhost";
$username = "root";
$password = "";
$database = "test";
// query
//  select * from tv_series as s, tv_series_intervals as i where s.id=id_tv_series and week_day='monday' and show_time > '15:00' order by show_time limit 1;
$query = "select * from tv_series as s, tv_series_intervals as i where s.id=id_tv_series and week_day='". strtolower($weekDay)."' and show_time > '". $time."' order by show_time limit 1;";
// Create connection

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $statement = $conn->prepare($query);
    $statement->execute();
    // set the resulting array to associative
    $result = $statement->setFetchMode(PDO::FETCH_ASSOC);
    $resultObject = ($statement->fetchObject());
    $interval = new TVSerieInterval();
    $interval->setWeekday($resultObject->week_day);
    $interval->setShowTime($resultObject->show_time);
    $intervals[] = $interval;
    $serie = new TVSerie();
    $serie->setTitle($resultObject->title);
    $serie->setChannel($resultObject->channel);
    $serie->setGender($resultObject->gender);
    $serie->setTvSerialIntervals($intervals);
    var_dump($serie);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
$conn = null;

