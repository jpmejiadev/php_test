<?php
class AsciiArray
{
    public function getRangeAscii( $start, $end) {
        $arrayAscii = range($start, $end);
        return $arrayAscii;
    }
    public function getRandomArrayAscii($arrayAscii) {
        shuffle($arrayAscii);
        return $arrayAscii;
    }

    public function removeOnerandomCharacter($arrayAscii) {
        $indexRandom = rand(0, count($arrayAscii) - 1);
        $character = $arrayAscii[$indexRandom];
        unset($arrayAscii[$indexRandom]);
        return array(
            $character,
            $arrayAscii
        );
    }

    public function searchCharacter($start , $end, $newRandomAscii){
        $originalList = range($start, $end);
        $sumOriginal = array_sum($originalList);
        $newRandomAsciiSum = array_sum($newRandomAscii);
        $res = chr($sumOriginal - $newRandomAsciiSum);
        return $res;
    }
}
