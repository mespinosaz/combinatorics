<?php

namespace mespinosaz\Combinatorics;

class Permutations implements \Iterator
{
    private $currentPosition = 0;
    private $permutations = array();

    /**
     * @param array $elements
     */
    public function __construct(array $elements)
    {
        $this->computePermutations($elements);
    }

    /**
     * Extracted from O'Reilly PHP Cookbook chapter 4.26
     * @param array $items
     * @param array $permutation
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

    public function removeDuplicates()
    {
        $this->permutations = array_unique($this->permutations, SORT_REGULAR);
    }

    public function rewind()
    {
        $this->currentPosition = 0;
    }

    /**
     * @return mixed
     */
    public function current()
    {
        return $this->permutations[$this->currentPosition];
    }

    /**
     * @return int
     */
    public function key()
    {
        return $this->currentPosition;
    }

    public function next()
    {
        $this->currentPosition++;
    }

    /**
     * @return bool
     */
    public function valid()
    {
        return isset($this->permutations[$this->currentPosition]);
    }
}
