// https://paiza.io/projects/hM3K7-v9YtoVrlHkJWU7yg?language=php
// https://www.geeksforgeeks.org/array-rotation/

<?php
// Your code here!

$testCase1 = [1,2,3,4,5,6,7];
$step = 2;

/**
 * rotates values in arrayToBeRotated by step  
 * arrayToBeRotated = [1,2,3,4,5,6,7] step = 2 | expected : [3,4,5,6,7,1,2]
 * i -> i+2
 * 3214567
 * 3412567
 * 3452167
 * 3456127
 * 3456721
 * 3456712 // step = 1
**/
function rotateArrayByStep(int $step= 0, array $arrayToBeRotated = []) : array
{
    $rotatedArray = [];
    if ($step <= 0) {
        return $arrayToBeRotated;
    }
    for ($i = 0; $i < count($arrayToBeRotated); $i++) {
        swapValuesAtIndexes($i, $i+1, $arrayToBeRotated);
    }
    return $rotatedArray;
}

/**
 * swaps the value at index1 and index2 inside arrayTobeSwapped
 * using a temp variable
 * 
**/
function swapValuesAtIndexes(int $index1, int $index2, array $arrayToBeSwapped) : array
{
    $temp = $arrayToBeSwapped[$index1];
    $arrayToBeSwapped[$index1] = $arrayToBeSwapped[$index2];
    $arrayToBeSwapped[$index2] = $temp;
    return $arrayToBeSwapped;
}

print_r(rotateArrayByStep($step, $testCase1));
?>
