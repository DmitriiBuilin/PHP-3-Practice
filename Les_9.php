<?php

/*
 * Task #1
 */

// Function for bubble sort
function bubbleSort($array) {
    for($i = 0; $i < count($array); $i++) {
        $count = count($array);
        for($j = $i + 1; $j < $count; $j++) {
            if($array[$i] > $array[$j]) {
                $temp = $array[$j];
                $array[$j] = $array[$i];
                $array[$i] = $temp;
            }
        }
    }
    return $array;
}

// Function for quick sort

function quickSort(array $arr, $low, $high) {
    $i = $low;
    $j = $high;
    $middle = $arr[ceil(($low + $high) / 2)];
    do {
        while ($arr[$i] < $middle) {
            ++$i;
        }
        while ($arr[$j] > $middle) {
            --$j;
        }
        if ($i <= $j) {
            $temp = $arr[$i];
            $arr[$i] = $arr[$j];
            $arr[$j] = $temp;
            $i++;
            $j--;
        }
    } while ($i < $j);

    if($low < $j) {
        quickSort($arr, $low, $j);
    }

    if($i < $high) {
        quickSort($arr, $i, $high);
    }
}

// Create and shuffle array
function getArray(): array
{
    $array = range(0, 999);
    shuffle($array);

    return $array;
}

// Sorting array

$unsortedArr = getArray();
$start = microtime(true);
bubbleSort($unsortedArr);
echo "Bubble sort: " . (microtime(true) - $start) . PHP_EOL;

$lastIndex = count($unsortedArr) - 1;
$unsortedArr = getArray();
$start = microtime(true);
quickSort($unsortedArr, 0, $lastIndex);
echo "Quick sort: " . (microtime(true) - $start) . PHP_EOL;





/*
 * Task #2
 */

// Remove element of array by value
$removingValue = 256;

foreach($unsortedArr as $key => $item){
    if ($item == $removingValue){
        unset($unsortedArr[$key]);
    }
}

$key = array_search($removingValue, $unsortedArr);
echo $key;


/*
 * Task #3 Search
 */

function LinearSearch ($myArray, $num): ?int
{
    $count = count($myArray);
    $LinearSearchCount = 0;
    for ($i=0; $i < $count; $i++) {
        $LinearSearchCount++;
        if ($myArray[$i] == $num) {
            echo 'LinearSearch iterations is: ' . $LinearSearchCount . PHP_EOL;
            return $i;
        }
        elseif ($myArray[$i] > $num) {
            return null;
        }
    }
    echo 'Why? ';
    return null;
}

function BinarySearch ($myArray, $num) {
//определяем границы массива
    $left = 0;
    $right = count($myArray) - 1;
    $LinearSearchCount = 0;
    while ($left <= $right) {
    //находим центральный элемент с округлением индекса в меньшую сторону
        $middle = floor(($right + $left)/2);
    //если центральный элемент и есть искомый
        if ($myArray[$middle] == $num) {
            echo 'BinarySearch iterations is: ' . $LinearSearchCount . PHP_EOL;
            return $middle;
        }
        elseif ($myArray[$middle] > $num) {
            $LinearSearchCount++;
    //сдвигаем границы массива до диапазона от left до middle-1
            $right = $middle - 1;
        }
        elseif ($myArray[$middle] < $num) {
            $LinearSearchCount++;
            $left = $middle + 1;
        }
    }
    return null;
}

function InterpolationSearch($myArray, $num)
{
    $start = 0;
    $last = count($myArray) - 1;
    $LinearSearchCount = 0;
    while (($start <= $last) && ($num >= $myArray[$start])
        && ($num <= $myArray[$last])) {
        $pos = floor($start + (
                (($last - $start) / ($myArray[$last] - $myArray[$start]))
                * ($num - $myArray[$start])
            ));
        if ($myArray[$pos] == $num) {
            echo 'InterpolationSearch iterations is: ' . $LinearSearchCount . PHP_EOL;
            return $pos;
        }
        if ($myArray[$pos] < $num) {
            $LinearSearchCount++;
            $start = $pos + 1;
        }
        else {
            $LinearSearchCount++;
            $last = $pos - 1;
        }
    }
    return null;
}


// Step counter

$newArray = range(0, 999);

LinearSearch($newArray, 365);

BinarySearch($newArray, 12);

InterpolationSearch($newArray, 366);

echo 'The end';



