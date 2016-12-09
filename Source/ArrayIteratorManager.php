<?php
/**
 * @author  Ishwor Khadka <ishwor.khadka@kiosked.com>
 * @created 2016-12-09
 */

namespace ArrayIterator;


use ArrayIterator\ArrayElement\ArrayElementFactory;
use ArrayIterator\Iterator\ArrayIterator;
use ArrayIterator\Iterator\Php7ArrayIterator;
use ArrayIterator\KeyHierarchy\KeyHierarchyFactory;

/**
 * @author Ishwor Khadka <ishwor.khadka@kiosked.com>
 * @see    TODO
 */
class ArrayIteratorManager
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
     * ArrayIteratorManager constructor.
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
     * @return ArrayIterator|Php7ArrayIterator
     */
    public function createIterator(array $array)
    {
        if ($this->getPhpVersion() < 7) {
            return new ArrayIterator($array, $this->_ArrayElementFactory, $this->_KeyHierarchyFactory);
        }

        return new Php7ArrayIterator($array, $this->_ArrayElementFactory, $this->_KeyHierarchyFactory);
    }

    /**
     * @return string
     */
    protected function getPhpVersion()
    {
        return floatval(phpversion());
    }
}