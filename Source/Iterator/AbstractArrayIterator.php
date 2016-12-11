<?php
/**
 * @author  Ishwor Khadka <ishworkh@gmail.com>
 * @created 2016-12-09
 */

namespace ArrayIterator\Iterator;

use ArrayIterator\ArrayElement\ArrayElement;
use ArrayIterator\ArrayElement\ArrayElementFactory;
use ArrayIterator\ArrayElement\ArrayElementInterface;
use ArrayIterator\KeyHierarchy\KeyHierarchy;
use ArrayIterator\KeyHierarchy\KeyHierarchyFactory;
use Generator;

/**
 * @author Ishwor Khadka <ishworkh@gmail.com>
 */
abstract class AbstractArrayIterator implements ArrayIteratorInterface
{
    /**
     * @var array
     */
    private $_array;

    /**
     * @var ArrayElementFactory
     */
    private $_ArrayElementFactory;

    /**
     * @var KeyHierarchyFactory
     */
    private $_KeyHierarchyFactory;

    /**
     * ArrayIterator constructor.
     *
     * @param array               $array
     * @param ArrayElementFactory $ArrayElementFactory
     * @param KeyHierarchyFactory $KeyHierarchyFactory
     */
    public function __construct(
        array $array,
        ArrayElementFactory $ArrayElementFactory,
        KeyHierarchyFactory $KeyHierarchyFactory
    )
    {
        $this->_array               = $array;
        $this->_ArrayElementFactory = $ArrayElementFactory;
        $this->_KeyHierarchyFactory = $KeyHierarchyFactory;
    }


    /**
     * @return Generator|ArrayElementInterface[]
     */
    public function getElements()
    {
        return $this->goThroughArray($this->_array, $this->_createKeyHierarchy());
    }

    /**
     * @param array        $array
     * @param KeyHierarchy $KeyHierarchy
     *
     * @return Generator|ArrayElementInterface[]
     */
    abstract protected function goThroughArray(array $array, KeyHierarchy $KeyHierarchy);

    /**
     * @param mixed        $value
     * @param KeyHierarchy $KeyHierarchy
     *
     * @return ArrayElement
     */
    protected function createArrayElement($value, KeyHierarchy $KeyHierarchy)
    {
        return $this->_ArrayElementFactory->create($value, $KeyHierarchy);
    }

    /**
     * @return KeyHierarchy
     */
    private function _createKeyHierarchy()
    {
        return $this->_KeyHierarchyFactory->create();
    }

    /**
     * @param KeyHierarchy $KeyHierarchy
     *
     * @return KeyHierarchy
     */
    protected function cloneKeyHierarchy(KeyHierarchy $KeyHierarchy)
    {
        return $this->_KeyHierarchyFactory->createFromAnotherKeyHierarchy($KeyHierarchy);
    }
}