<?php

namespace Combinatorics;

class Permutation
{

    /**
     * @var int
     */
    protected $fieldsCount;

    /**
     * @var int
     */
    protected $chipCount;

    /**
     * Permutation constructor.
     *
     * @param int $fieldsCount
     * @param int $chipCount
     */
    public function __construct($fieldsCount, $chipCount)
    {
        $this->fieldsCount = $fieldsCount;
        $this->chipCount = $chipCount;
    }

    /**
     * @return int
     */
    public function getFieldsCount()
    {
        return $this->fieldsCount;
    }

    /**
     * @param int $fieldsCount
     */
    public function setFieldsCount($fieldsCount)
    {
        $this->fieldsCount = $fieldsCount;

        return $this;
    }

    /**
     * @return int
     */
    public function getChipCount()
    {
        return $this->chipCount;
    }

    /**
     * @param int $chipCount
     */
    public function setChipCount($chipCount)
    {
        $this->chipCount = $chipCount;

        return $this;
    }

    /**
     * @return array
     */
    public function getInitialSubset()
    {
        return array_pad(array_fill(0, $this->chipCount, 0), $this->fieldsCount, 1);
    }
}