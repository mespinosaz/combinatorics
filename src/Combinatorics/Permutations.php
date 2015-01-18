<?php

namespace mespinosaz\Combinatorics;

class Permutations implements \Iterator
{
    private $currentPosition = 0;
    private $permutations = array();

    public function __construct(array $elements)
    {
        $this->computePermutations($elements);
    }

    /*
     * Extracted from O'Reilly PHP Cookbook chapter 4.26
     */
    private function computePermutations($items, $permutation = array())
    {
        if (empty($items)) {
            $this->permutations[] = $permutation;
        } else {
            for ($i = count($items) - 1; $i >= 0; --$i) {
                $newItems = $items;
                $newPermutation = $permutation;
                list($foo) = array_splice($newItems, $i, 1);
                array_unshift($newPermutation, $foo);
                $this->computePermutations($newItems, $newPermutation);
            }
        }
    }

    public function rewind()
    {
        $this->currentPosition = 0;
    }

    public function current()
    {
        return $this->permutations[$this->currentPosition];
    }

    public function key()
    {
        return $this->currentPosition;
    }

    public function next()
    {
        $this->currentPosition++;
    }

    public function valid()
    {
        return isset($this->permutations[$this->currentPosition]);
    }
}
