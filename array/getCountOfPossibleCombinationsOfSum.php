<?php

// https://paiza.io/projects/glCuwn71K3KTpJBkkDLh7g?language=php
// brute force solution


class Abc
{
    public function __construct()
    {
        $this->numbers = [1,2,4,5,6,7,8];
        $this->sum = 8;
        $this->combinations = [];
        $this->getCountOfPossibleCombinationsForSum();    
        
    }
    
    function getCountOfPossibleCombinationsForSum(){
        if (array_sum($this->numbers) < $this->sum) {
            return -1;
        }
        for ($i = 0; $i < count($this->numbers); $i++) {
            $combina = $this->getCombinationsForSum($this->sum);
            $explodedCombi = explode("|", $combina);
            sort($explodedCombi);
            $this->combinations[] = implode("|", $explodedCombi);
        }
        print_r($this->combinations);
    }
    
    function getCombinationsForSum($expectedSum){
        $numberExists = array_search($expectedSum, $this->numbers);
        if ($numberExists !== false) {
            echo "0\n";
            $combin = implode("|", [$this->numbers[$numberExists]]);
            if($this->combinationNotExists($combin)){
                return $combin;
            }
        }
        $firstDelta = abs(current($this->numbers) - $expectedSum);
        $lastDelta = abs(end($this->numbers) - $expectedSum);
        if ($lastDelta < $firstDelta) {
            echo "1\n";
            for ($i = count($this->numbers)-1; $i >= 0; $i--) {
                $this->sumDelta = $expectedSum - ($this->numbers[$i] + $this->numbers[$i-1]);
                if ($this->sumDelta == 0 && $this->combinationNotExists()) {
                    echo "1.1\n";
                    $combin = implode("|", [$this->numbers[$i], $this->numbers[$i-1]]);
                    if($this->combinationNotExists($combin)){
                        return $combin;
                    }
                }
                elseif($this->sumDelta > 0) {
                    echo "1.2\n";
                    $combin = implode("|", array_merge([$this->getCombinationsForSum($this->sumDelta)], [$this->numbers[$i], $this->numbers[$i-1]]));
                    if($this->combinationNotExists($combin)){
                        return $combin;
                    }
                }
                elseif($this->sumDelta < 0) {
                    echo "1.3\n";
                    if ($expectedSum > $this->numbers[$i]) {
                        echo "1.3.1\n";
                        $remainingSumDelta = $expectedSum - $this->numbers[$i];
                        $combin = implode("|", array_merge([$this->getCombinationsForSum($remainingSumDelta)], [$this->numbers[$i]]));
                        if($this->combinationNotExists($combin)){
                            return $combin;
                        }
                    }
                }
            }
        } else {
            echo "2\n";
            for ($i = 0; $i < count($this->numbers)-1; $i++) {
                $this->sumDelta = $expectedSum - ($this->numbers[$i] + $this->numbers[$i+1]);
                if ($this->sumDelta == 0) {
                    echo "2.1\n";
                    $combin = implode("|", [$this->numbers[$i], $this->numbers[$i+1]]);
                    if($this->combinationNotExists($combin)){
                        return $combin;
                    }
                }
                elseif($this->sumDelta > 0) {
                    echo "2.2\n";
                    $combin = implode("|", array_merge([$this->getCombinationsForSum($this->sumDelta)], [$this->numbers[$i], $this->numbers[$i+1]]));
                    if($this->combinationNotExists($combin)){
                        return $combin;
                    }
                }
                elseif($this->sumDelta < 0) {
                    echo "2.3\n";
                    if ($expectedSum > $this->numbers[$i]) {
                        echo "2.3.1\n";
                        $remainingSumDelta = $expectedSum - $this->numbers[$i];
                        $combin = implode("|", array_merge([$this->getCombinationsForSum($remainingSumDelta)], [$this->numbers[$i]]));
                        if($this->combinationNotExists($combin)){
                            return $combin;
                        }
                    }
                }
            }
        }
        echo "---\n";
    }
    
    function combinationNotExists($combination){
        $explodedCombi = explode("|", $combination);
        sort($explodedCombi);
        return !in_array(implode("|", $explodedCombi), $this->combinations);
    }
}

(new Abc());
