<?php
// https://paiza.io/projects/Vqyohuvjub451VEz0JAAFA?language=php
// https://www.geeksforgeeks.org/program-for-array-rotation-continued-reversal-algorithm/

$testCase1 = [1,2,3,4,5,6,7];
$stepTestCase1 = 7;

/**
 * rotate arrayToBeRotated by step steps
 * 1234567
 * split at $step => 12 34567
 *  reverse at step => 2134567
 *  reverse rest of the array => 2176543
 *  reverse everything => 3456712
**/
function rotateArrayByStep(array $arrayToBeRotated = [], int $step = 0) : array
{
    if ($step <= 0 || $step >= count($arrayToBeRotated)) {
        return $arrayToBeRotated;
    }
    $slicedArray = sliceArray($arrayToBeRotated, $step);
    $arrayToBeRotated = reverseArray(array_merge(reverseArray($slicedArray[0]), reverseArray($slicedArray[1])));
    return $arrayToBeRotated;
    
}

/**
 * reverse arrayToBeReversed
 * 12345 i -> count(arrayToBeReversed)-1-i
 * 52341 => 0 -> 5-1-0 = 4
**/
function reverseArray(array $arrayToBeReversed = []) : array
{
    if(empty($arrayToBeReversed)){
        return $arrayToBeReversed;
    }
    for ($i = 0; $i < floor(count($arrayToBeReversed)/2); $i++) {
        swapElementsAtIndices($i, count($arrayToBeReversed)-1-$i, $arrayToBeReversed);
    }
    return $arrayToBeReversed;
}

/**
 * swap index1 th element in arrayToBeSwapped with index2
 **/
function swapElementsAtIndices(int $index1 = 0, int $index2 = 0, array &$arrayToBeSwapped = [])
{
    if(!isset($arrayToBeSwapped[$index1]) || !isset($arrayToBeSwapped[$index2]) || ($index1 == $index2)){
        return $arrayToBeSwapped;
    }
    $temp = $arrayToBeSwapped[$index1];
    $arrayToBeSwapped[$index1] = $arrayToBeSwapped[$index2];
    $arrayToBeSwapped[$index2] = $temp;
}

/**
 * slices arrayToBeSliced at sliceIndex from 0th element 
**/
function sliceArray(array $arrayToBeSliced = [], int $sliceIndex = 0) : array
{
    $slicedArray = [];
    for($i = 0; $i < count($arrayToBeSliced); $i++){
        if ($i < $sliceIndex) {
            $slicedArray[0][] = $arrayToBeSliced[$i];
        }else {
            $slicedArray[1][] = $arrayToBeSliced[$i];
        }
    }
    return $slicedArray;
}

print_r(rotateArrayByStep($testCase1, $stepTestCase1));

?>
