<?php
// Your code here!

$testCase1 = [1,2,3,4,5,6,7,8,9,10,11,12,13];
$step = 4;

/**
 * rotates values in arrayToBeRotated by step  
 * arrayToBeRotated = [1,2,3,4,5,6,7] step = 2 | expected : [3,4,5,6,7,1,2]
 * i -> i+2
 * 1234567
 * 3214567
 * 3412567
 * 3452167
 * 3456127
 * 3456721
 * 3456712 // step = 1
 * i -> i+3
 * 1234567 -> 4567123
 * 4231567
 * 4531267
 * 4561237
 * 4567231
 * 4567132 // step = 2
 * 4567123 // step 1
**/
function rotateArrayByStep(int $step = 0, array $arrayToBeRotated = []) : array
{
    if ($step <= 0) {
        return $arrayToBeRotated;
    }
    for ($i = 0; $i < count($arrayToBeRotated)-1; $i++) {
        if(!isset($arrayToBeRotated[$i+$step])) {
            $step--;
        }
       $arrayToBeRotated = swapValuesAtIndexes($i, $i+$step, $arrayToBeRotated);
    }
    return $arrayToBeRotated;
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
