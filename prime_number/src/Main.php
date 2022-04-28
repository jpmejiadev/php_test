<?php
include 'PrimeNumber.php';
class  Main {
    public static function generatorPrime(){
        $primeNumber = new PrimeNumber;
        $list = $primeNumber->getListMultiple(2, 100);
        $output = $primeNumber->toListString($list);
        $output = implode(PHP_EOL, $output);
        echo $output;
    }
}
Main::generatorPrime();