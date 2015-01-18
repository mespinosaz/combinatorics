<?php

namespace mespinosaz\Combinatorics\Tests;

use mespinosaz\Combinatorics\Permutations;

class PermutationsTest extends \PHPUnit_Framework_TestCase
{
    public function testPermutations()
    {
        $permutations = new Permutations(array(1,2,3));
        $result = array();
        foreach($permutations as $permutation) {
            $result[] = $permutation;
        }
        $expectedPermutations = array(
            array(1,2,3),
            array(2,1,3),
            array(1,3,2),
            array(3,1,2),
            array(2,3,1),
            array(3,2,1)
        );

        $this->assertEquals($expectedPermutations, $result);
    }
}