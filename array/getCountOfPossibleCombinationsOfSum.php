<?php
// https://paiza.io/projects/glCuwn71K3KTpJBkkDLh7g?language=php
$testCase1 = [1,2,3,4,5,6,7,8,9];

/**
 * does not consider negative numbers or floating point integers
 * the array has to be sorted
**/
function getCountOfPossibleCombinationsOfSum(array $numbers = [], int $expectedSum = 0) : int
{
    if ((count($numbers) == 0) || ($sum == 0)) {
        return -1;   
    }
    
    $maxSumPossible = array_sum($numbers);
    if ($expectedSum > $maxSumPossible) {
        return -2;
    }
    
    
}

?>
