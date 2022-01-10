<?php
// https://www.geeksforgeeks.org/block-swap-algorithm-for-array-rotation/?ref=lbp
// https://paiza.io/projects/zHAF5fEbTe-uPf1w0BjACw?language=php

$testCase1 = [1,2,3,4,5,6,7];
$step = 2;

/**
 * 1234567 , 2 => 3456712
 * A:12345 B:67
 * Al:12 Ar:345 B:67
 * BArAl: 67 345 12
 * 
 * 
**/
function rotateArrayByStepUsingBlockSwap(array $arrayToBeRotated = [], int $step = 0) : array
{
    $firstSlicedArray = sliceArray($arrayToBeRotated, $step);
    if(count($firstSlicedArray['l']) > count($firstSlicedArray['r'])) {
        $secondSlicedArray = sliceArray($firstSlicedArray['l'], count($firstSlicedArray['r']));
        $arrayToBeRotated = array_merge($firstSlicedArray['r'], );
    }else{
        
    }
    
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
            $slicedArray['l'][] = $arrayToBeSliced[$i];
        }else {
            $slicedArray['r'][] = $arrayToBeSliced[$i];
        }
    }
    return $slicedArray;
}


print_r(rotateArrayByStepUsingBlockSwap($testCase1, $step));

?>
