<?php


$n = 100;
$Icounter = 0;
$counter = 0;
for ($i = 0; $i < $n; $i += 2) {
    $Icounter++;
    for ($j = $i; $j < $n; $j++) {
        $counter++;
    } }

echo $Icounter .PHP_EOL;
echo $counter.PHP_EOL;


$n = 100;
$array=0;
for ($i = 0; $i < $n; $i++) {
    for ($j = 1; $j < $n; $j *= 2) {
        $array++;
    } }

echo $array.PHP_EOL;