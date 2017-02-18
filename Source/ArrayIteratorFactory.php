<?php
/**
 * @author  Ishwor Khadka <ishworkh@gmail.com>
 * @created 2016-12-09
 */

declare(strict_types = 1);

namespace ArrayIterator;

use ArrayIterator\ArrayElement\ArrayElementFactory;
use ArrayIterator\Iterator\ArrayIterator;
use ArrayIterator\KeyHierarchy\KeyHierarchyFactory;

/**
 * @author Ishwor Khadka <ishworkh@gmail.com>
 * @see    \Unittest\ArrayIteratorFactoryTest
 */
class ArrayIteratorFactory
{
    /***
     * @var ArrayElementFactory
     */
    private $_ArrayElementFactory;

    /**
     * @var KeyHierarchyFactory
     */
    private $_KeyHierarchyFactory;

    /**
     * ArrayIteratorFactory constructor.
     *
     * @param ArrayElementFactory $ArrayElementFactory
     * @param KeyHierarchyFactory $KeyHierarchyFactory
     */
    public function __construct(ArrayElementFactory $ArrayElementFactory, KeyHierarchyFactory $KeyHierarchyFactory)
    {
        $this->_ArrayElementFactory = $ArrayElementFactory;
        $this->_KeyHierarchyFactory = $KeyHierarchyFactory;
    }

    /**
     * @param array $array
     *
     * @return ArrayIterator
     */
    public function createIterator(array $array):ArrayIterator
    {
        return new ArrayIterator($array, $this->_ArrayElementFactory, $this->_KeyHierarchyFactory);
    }
}