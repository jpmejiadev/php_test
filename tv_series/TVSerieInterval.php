<?php
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

    /**
     * @return mixed
     */
    public function toArray()
    {
        return array(
            'weekday' => $this->getWeekday(),
            'showTime' => $this->getShowTime(),
        );
    }

}
