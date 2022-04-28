<?php

class PrimeNumber
{
    private $start;
    private $end;

    public function getMultiple($number)
    {
        $result = array();
        for ($j = 1; $j <= $number; $j++) {
            if ($number % $j == 0) {
                $result[] = $j;
            }
        }
        return $result;
    }

    public function getListMultiple($start, $end)
    {
        $result = array();
        for ($i = $start; $i <= $end; $i++) {
            $result[$i] = $this->getMultiple($i);
        }
        return $result;
    }
    public function toListString($list)
    {
        $result = array();
        foreach($list as $key => $multiples) {
            if(count($multiples) > 2) {
                $result[] = $key. ' ['.implode(",", $multiples) . ']';
            } else {
                $result[]= $key. " [PRIME]";
            }
        }
        return $result;
    }
}

