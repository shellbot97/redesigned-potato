<?php
// https://www.geeksforgeeks.org/search-an-element-in-a-sorted-and-pivoted-array/
// https://paiza.io/projects/TeWNffWBC8iEycDsLxnkLg?language=php

$testCase1 = [1,2,3,4,5,6,7,8,9];
$findElement = 6;

/**
 * find pivotal point
 * if valid pivotal point
 *      if pivotalPoint > $elementToBeFound > firstIndex
 *          binarySearch(firstIndex to pivotal point)
 *      elseif pivotalPoint+1 > elementToBeFound > lastIndex
 *          binarySearch(pivotalPoint+1 to lastIndex)
 * else
 *      binarySearch(firstIndex to lastIndex)
**/
function searchArrayInRotatedSortedArray(array $arrayToBeTraversed = [], int $elementToBeFound = 0) : int
{
    $index = -1;
    $pivotalPoint = findPivotalPoint($arrayToBeTraversed);
    if($pivotalPoint > -1){
        if (($arrayToBeTraversed[$pivotalPoint] >= $elementToBeFound) && ($elementToBeFound >= $arrayToBeTraversed[0])) {
            // echo "1";
            $slicedArray = array_slice($arrayToBeTraversed, 0, $pivotalPoint);
            $index = binarySearchInArray($slicedArray, $elementToBeFound);
            if ($index >= 0) {
                return $index;
            }
        }elseif((end($arrayToBeTraversed) >= $elementToBeFound) && ($elementToBeFound >= $arrayToBeTraversed[$pivotalPoint+1])){
            // echo "2";
            $slicedArray = array_slice($arrayToBeTraversed, $pivotalPoint+1, count($arrayToBeTraversed));
            $index = binarySearchInArray($slicedArray, $elementToBeFound);
            if ($index >= 0) {
                return $index+$pivotalPoint+1;
            }
        }
    }else{
        $index = binarySearchInArray($arrayToBeTraversed, $elementToBeFound);
        if ($index >= 0) {
            return $index;
        }
    }
    return $index;
}

/**
 * finds the pivotal point
 * 345678123
 * i+1 has to be bigger then i
 * get i where i+1 < i
 * if not found return -1
 **/
function findPivotalPoint(array $pivotedArray = []) : int
{
    for ($i = 0; $i < count($pivotedArray); $i++) {
        if (isset($pivotedArray[$i+1]) && ($pivotedArray[$i+1] < $pivotedArray[$i])) {
            return $i;
        }
    }
    return -1;
}


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
    if (current($arrayToBeSearched) == $valueToBeSearched) {
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
    }elseif($arrayToBeSearched[$middleIndex] < $valueToBeSearched && $valueToBeSearched <= end($arrayToBeSearched)){
        $recursedIndex = binarySearchInArray(array_slice($arrayToBeSearched, $middleIndex+1, count($arrayToBeSearched)-$middleIndex), $valueToBeSearched);
        // echo "$arrayToBeSearched[$middleIndex] < $valueToBeSearched\n";
        return $middleIndex + 1 + $recursedIndex;
    }else{
        return -2;
    }
}

// Driver code
print_r(searchArrayInRotatedSortedArray($testCase1, $findElement));
// print_r(findPivotalPoint($testCase1));
?>
