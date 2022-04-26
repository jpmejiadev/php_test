<?php
$start =  ord(',');
$end = ord('|');

$arrayAscii = range($start, $end);
$initialArray = $arrayAscii;
// random
shuffle($arrayAscii);
// unset
$randomIndex = rand(0, count($arrayAscii) -  1);
$randomCharacter = $arrayAscii[$randomIndex];
$arrayAscii[$randomIndex] = 0;
// find char
$findCharacter = array_sum($initialArray) - array_sum($arrayAscii);

echo chr($randomCharacter);
echo chr($findCharacter);

