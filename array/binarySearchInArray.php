<?php
// https://www.geeksforgeeks.org/binary-search/
// https://paiza.io/projects/RktPPPv_pq9RrvDp1joRmg?language=php

$testCase1 = [1,2,3,4,5,6,7,8,9];


/**
 * return -1 of validation fails
 * -2 if element doesnt exist in array
 * 
 * validate
 *  of sizeOfArray is 0 or valueToBeSearched is empty
 *  return invalid
 * if first element is in array is equal to valueToBeSearched
 *  return 0
 * get the middleIndex of current arrayToBeSearched
 * if valueToBeSearched is greater than middle index of arrayToBeSearched
 *  slice arrayToBeSearched from 0 to middleIndex
 * elseif valueToBeSearched is between middle index and last index
 *  slice arrayToBeSearched from middle index and last index
 * else
 *  return not found
**/
function binarySearchInArray(array $arrayToBeSearched = [], $valueToBeSearched = '') : int
{
    $sizeOfArray = count($arrayToBeSearched);
    if ($sizeOfArray == 0 || $valueToBeSearched == '') {
        return -1;
    }
    if ($arrayToBeSearched[0] == $valueToBeSearched) {
        return 0;
    }
    $middleIndex = floor($sizeOfArray/2);
    // echo $middleIndex."----\n";
    if($arrayToBeSearched[$middleIndex] == $valueToBeSearched){
        // echo "=\n";
        return $middleIndex;
    }elseif ($arrayToBeSearched[$middleIndex] > $valueToBeSearched) {
        $recursedIndex = binarySearchInArray(array_slice($arrayToBeSearched, 0, $middleIndex-1), $valueToBeSearched);
        // echo "$arrayToBeSearched[$middleIndex] > $valueToBeSearched\n";
        return $recursedIndex;
    }elseif($arrayToBeSearched[$middleIndex] < $valueToBeSearched && $valueToBeSearched < end($arrayToBeSearched)){
        $recursedIndex = binarySearchInArray(array_slice($arrayToBeSearched, $middleIndex+1, count($arrayToBeSearched)-$middleIndex), $valueToBeSearched);
        // echo "$arrayToBeSearched[$middleIndex] < $valueToBeSearched\n";
        return $middleIndex + 1 + $recursedIndex;
    }else{
        return -2;
    }
}
print_r(binarySearchInArray($testCase1, 15));

?>
