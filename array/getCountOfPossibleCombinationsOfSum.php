<?php
// https://paiza.io/projects/glCuwn71K3KTpJBkkDLh7g?language=php
$testCase1 = [1,2,3,4,5,6,7,8,9];
$sum1 = 19;

function getCountOfPossibleCombinationsOfSum(array $numbers = [], int $expectedSum = 0) : int 
{
    $combinations = [];
    getPossibleCombinationsOfSum($numbers, $expectedSum);
    return count($combinations); 
}


/**
 * does not consider negative numbers or floating point integers
 * the array has to be sorted
 * numbers: 123456789 | sum: 19
 * v1 : unique numbers
 * v2 : repeated numbers
 * if the value to be searched is closer to end
 *      start from end
 * 19 = 9,8,2 | 8,7,4 
 *      
**/
function getPossibleCombinationsOfSum(array $numbers = [], int $expectedSum = 0) : void
{
    // Invalid input
    if ((count($numbers) == 0) || ($sum == 0)) {
        return -1;   
    }
    // is max sum possible
    $maxSumPossible = array_sum($numbers);
    if ($expectedSum > $maxSumPossible) {
        return -2;
    }
    // calculate first last element delta to decide from which end loop should start 
    $firstIndexDelta = abs($expectedSum - current($numbers));
    $lastIndexDelta = abs($expectedSum - end($numbers));
    // if expected sum is closer to last index
    if ($lastIndexDelta < $firstIndexDelta) {
        for ($i = count($numbers)-1; $i <= 0; $i++) {
            $indexSum = $numbers[$i]+$numbers[$i-1];
            $expectedSumDelta = $expectedSum - $indexSum;
            // if expected sum needs more number to complete, find the number in array
            if ($expectedSumDelta > 0) {
                $indexRequiredToCompleteSum = arrayValueExists($numbers, $expectedSumDelta);
                // if the exact number which is required to complete the expected sum is found in the array 
                if($indexRequiredToCompleteSum > -1){
                    $combinations[] = implode("|", [$numbers[$i],$numbers[$i-1], $numbers[$indexRequiredToCompleteSum]]);
                }else{
                       
                }
            }elseif($expectedSumDelta == 0){
                $combinations[] = implode("|", [$numbers[$i],$numbers[$i-1]]);   
            }
        }
    }
    // if expected sum is closer to first index
    else{
        
    }
    
}

function arrayValueExists(array $arrayToBeTraversed = [], int $valueToBeSearched = '-1') : int
{
    if($valueToBeSearched == -1 || count($arrayToBeTraversed) == 0){
        return -1; 
    }
    for ($i = 0; $i < count($arrayToBeTraversed); $i++) {
        if($arrayToBeTraversed[$i] == $valueToBeSearched){
            return $i;
        }
    }
    return -2;
}

print_r(getCountOfPossibleCombinationsOfSum($testCase1, $sum1));


?>
