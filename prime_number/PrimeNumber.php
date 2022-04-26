<?php

$result = array();
$start = 2;
$end = 100;
for($i = $start; $i <= $end; $i++){
    for($j = 1; $j <= $i; $j++) {
        if($i % $j == 0) {
            $result[$i][] = $j;
        }
    }
}
// Show
for($i = $start; $i <= $end; $i++) {
    if(count($result[$i]) > 2) {
        printf("%d [%s]\n", $i, implode(",", $result[$i]));
    } else {
        printf("%d [PRIME]\n", $i);
    }
}
