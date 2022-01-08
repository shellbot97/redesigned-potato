<?php
$testCase1 = [-2,-3,4,-1,-2,1,5,-3];
$expectedResultCase1 = [4,-1,-2,1,5];
$testCase2 = [1,2,-4,4,0,6,7,-17,9];
$expectedResultCase2 = [4,0,6,7];

// https://www.geeksforgeeks.org/largest-sum-contiguous-subarray/
// https://paiza.io/projects/NNNO9LLV-aJ9q3zS4EDTKA?language=php
function getContiguousSubArrayWithLargestSum($mainArray){
    $maximumSumSubArray = [];
    $maximumSum = 0;
    for ($i = 0; $i < count($mainArray); $i++) {
        $sum = 0;
        for ($j = $i; $j < count($mainArray); $j++) {
            $sum += $mainArray[$j];
            if ($sum > $maximumSum) {
                $maximumSum = $sum;
                $maximumSumSubArray = array_slice($mainArray, $i, ($j-$i)+1);
            }
        }
    }
    return $maximumSumSubArray;
}

print_r(getContiguousSubArrayWithLargestSum($testCase1));
print_r(getContiguousSubArrayWithLargestSum($testCase2));
?>
