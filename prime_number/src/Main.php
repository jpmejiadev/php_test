<?php
include 'PrimeNumber.php';
class  Main {
    public static function generatorPrime(){
        $primeNumber = new PrimeNumber;
        $primeNumber->echoPrimeNumberGenerator(1, 100);
    }
}
Main::generatorPrime();