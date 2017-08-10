<?php

namespace Helpers;

use Combinatorics\Permutation;

class Generator
{

    /**
     * @var Permutation
     */
    protected $permutation;

    /**
     * @var Math
     */
    protected $math;

    /**
     * Permutation constructor.
     *
     * @param Permutation $permutation
     * @param Math $math
     */
    public function __construct(Permutation $permutation, Math $math)
    {
        $this->permutation = $permutation;
        $this->math = $math;
    }

    /**
     * @return float
     */
    public function countTotalSubsets()
    {
        $fields = $this->permutation->getFieldsCount();
        $chips = $this->permutation->getChipCount();

        return $this->math->getFactorial($fields) /
        ($this->math->getFactorial($fields - $chips) * $this->math->getFactorial($chips));
    }

    /**
     * @param $subset
     * @return bool
     */
    public function composeNewSubset(&$subset)
    {
        $fieldsCount = $this->permutation->getFieldsCount();

        $i = $fieldsCount - 2;
        while ($i != -1 && $subset[$i] >= $subset[$i + 1]) {
            $i--;
        }

        if ($i == -1) {
            return false;
        }

        $j = $fieldsCount - 1;
        while ($subset[$i] >= $subset[$j]) {
            $j--;
        }
        $this->swapElements($subset, $i, $j);

        $this->sortTheRestSequence($subset, $i + 1, $fieldsCount - 1);

        return true;
    }

    /**
     * @param $subset
     * @return string
     */
    public function prepareSubsetString(&$subset)
    {
        return implode('', $subset) . PHP_EOL;
    }

    /**
     * @param $subset
     * @param int $left
     * @param int $right
     */
    private function sortTheRestSequence(&$subset, $left, $right)
    {
        while ($left < $right) {
            $this->swapElements($subset, $left++, $right--);
        }
    }

    /**
     * @param $subset
     * @param int $i
     * @param int $j
     */
    private function swapElements(&$subset, $i, $j)
    {
        $s = $subset[$i];
        $subset[$i] = $subset[$j];
        $subset[$j] = $s;
    }
}