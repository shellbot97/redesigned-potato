<?php
// https://www.geeksforgeeks.org/binary-search/
// https://paiza.io/projects/RktPPPv_pq9RrvDp1joRmg?language=php

$testCase1 = [1,2,3,4,5,6,7,8,9];


/**
 * return -1 of validation fails
 * -2 if element doesnt exist in array
**/
function binarySearchInArray($arrayToBeSearched = [], $valueToBeSearched = '') : int
{
    $sizeOfArray = count($arrayToBeSearched);
    if ($sizeOfArray == 0 || $valueToBeSearched == '') {
        return -1;
    }
    $middleIndex = floor($sizeOfArray/2);
    if($arrayToBeSearched[$middleIndex] == $valueToBeSearched){
        return $middleIndex;
    }
    if ($arrayToBeSearched[$middleIndex] > $valueToBeSearched) {
        for ($i = 0; $i < $middleIndex; $i++) {
            if($arrayToBeSearched[$i] == $valueToBeSearched){
                return $i;
            }
        }
    }else{
        for ($i = $middleIndex+1; $i < $sizeOfArray; $i++) {
            if($arrayToBeSearched[$i] == $valueToBeSearched){
                return $i;
            }
        }
    }
    return -2;
}


print_r(binarySearchInArray($testCase1, 8));

?>
