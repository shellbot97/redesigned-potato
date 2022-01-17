<?php

class Abc
{
    public function __construct()
    {
        $this->numbers = [1,2,3,4,5,6,7,8];
        $this->sum = 10;
        $this->getCountOfPossibleCombinationsForSum();
    }
    
    function getCountOfPossibleCombinationsForSum(){
        if (array_sum($this->numbers) < $this->sum) {
            return -1;
        }
        $combinations[] = $this->getCombinationsForSum($this->sum);
        print_r($combinations);
    }
    
    function getCombinationsForSum($expectedSum){
        $numberExists = array_search($expectedSum, $this->numbers);
        if ($numberExists !== false) {
            echo "0\n";
            return [$this->numbers[$numberExists]];
        }
        $firstDelta = abs(current($this->numbers) - $expectedSum);
        $lastDelta = abs(end($this->numbers) - $expectedSum);
        if ($lastDelta < $firstDelta) {
            echo "1\n";
            for ($i = count($this->numbers)-1; $i >= 0; $i--) {
                $this->sumDelta = $expectedSum - ($this->numbers[$i] + $this->numbers[$i-1]);
                if ($this->sumDelta == 0) {
                    echo "1.1\n";
                    return [$this->numbers[$i], $this->numbers[$i-1]];
                }
                elseif($this->sumDelta > 0) {
                    echo "1.2\n";
                    return array_merge($this->getCombinationsForSum($this->sumDelta), [$this->numbers[$i], $this->numbers[$i-1]]);
                }
                elseif($this->sumDelta < 0) {
                    echo "1.3\n";
                    if ($expectedSum > $this->numbers[$i]) {
                        echo "1.3.1\n";
                        $remainingSumDelta = $expectedSum - $this->numbers[$i];
                        return array_merge($this->getCombinationsForSum($remainingSumDelta), [$this->numbers[$i]]);
                    }
                }
            }
        } else {
            echo "2\n";
            for ($i = 0; $i < count($this->numbers); $i++) {
                $this->sumDelta = $expectedSum - ($this->numbers[$i] + $this->numbers[$i+1]);
                if ($this->sumDelta == 0) {
                    echo "2.1\n";
                    return [$this->numbers[$i], $this->numbers[$i+1]];
                }
                elseif($this->sumDelta > 0) {
                    echo "2.2\n";
                    return array_merge($this->getCombinationsForSum($this->sumDelta), [$this->numbers[$i], $this->numbers[$i+1]]);
                }
                elseif($this->sumDelta < 0) {
                    echo "2.3\n";
                    if ($expectedSum > $this->numbers[$i]) {
                        echo "2.3.1\n";
                        $remainingSumDelta = $expectedSum - $this->numbers[$i];
                        return array_merge($this->getCombinationsForSum($remainingSumDelta), [$this->numbers[$i]]);
                    }
                }
            }
        }
    }
}

(new Abc());
