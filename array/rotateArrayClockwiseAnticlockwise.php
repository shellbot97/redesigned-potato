<?php
// Rotate array clockwise/anticlockwise
// https://paiza.io/projects/PLyCJ2a3Kr7SzG-pLbPQfw?language=php

$testCase1 = [1,2,3,4,5,6,7,8,9,0];
$step = 2;

/**
 * rotates array in 2 directions by 1 step
 * if arrayToBeRotated = a
 *     rotate array anticlockwise
 * elseif arrayToBeRotated = c
 *     rotate array clockwise
 **/
function rotateArrayCyclically(string $direction = 'a', array $arrayToBeRotated = []) : array
{
    if(count($arrayToBeRotated) == 0 && ($direction != 'a' || $direction != 'c')){
        return $arrayToBeRotated;
    }
    return $direction == 'a' ? rotateAntiClockwise($arrayToBeRotated) : rotateClockwise($arrayToBeRotated);
}

/**
 * 1234567
 * 2345671
 **/
function rotateClockwise(array $arrayToBeRotated = []) : array
{
    $first = $arrayToBeRotated[0];
    for ($i = 0; $i < count($arrayToBeRotated); $i++) {
        $arrayToBeRotated[$i] = isset($arrayToBeRotated[$i+1]) ? $arrayToBeRotated[$i+1] : $first;
    }
    return $arrayToBeRotated;
}

/**
 * 1234567
 * 7123456
 **/
function rotateAntiClockwise(array $arrayToBeRotated = []) : array
{
    $last = end($arrayToBeRotated);
    for ($i = count($arrayToBeRotated)-1; $i >= 0; $i--) {        
        $arrayToBeRotated[$i] = isset($arrayToBeRotated[$i-1]) ? $arrayToBeRotated[$i-1] : $last;
    }
    return $arrayToBeRotated;
}

echo "before rotating\n";
print_r($testCase1);
echo "Anticlockwise\n";
print_r(rotateArrayCyclically('a', $testCase1));
echo "Clockwise\n";
print_r(rotateArrayCyclically('c', $testCase1));

?>
