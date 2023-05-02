<?php

/*
 * Task #1
 */

$dir = new DirectoryIterator("../PHP 3 Practice");

foreach ($dir as $item) {
    echo " | Name: " . $item . " | Type: " . $item->getType() . " | Size: " . $item->getSize() . PHP_EOL
        . "--------------------------------------------------------------" .PHP_EOL;
}
