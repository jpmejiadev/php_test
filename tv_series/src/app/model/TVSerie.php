<?php

class TVSerie
{
    private $title;
    private $channel;
    private $gender;
    private $tvSerialIntervals;

    public function __construct()
    {
        $this->tvSerialIntervals = array();
    }

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
    public function addTvSerialIntervals($interval)
    {
        $this->tvSerialIntervals[] = $interval;
    }

    /**
     * @return mixed
     */
    public function toArray()
    {
        $convertArray = function ($intervals) {
            return $intervals->toArray();
        };
        return array(
            'title' => $this->getTitle(),
            'channel' => $this->getChannel(),
            'gender' => $this->getGender(),
            'tvSerialIntervals' => array_map($convertArray, $this->getTvSerialIntervals())
        );
    }


}
