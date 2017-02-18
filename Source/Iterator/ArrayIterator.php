<?php
/**
 * @author Ishwor Khadka <ishworkh@gmail.com>
 * @created 18/02/2017
 */

declare(strict_types = 1);

namespace ArrayIterator\Iterator;

use ArrayIterator\ArrayElement\ArrayElement;
use ArrayIterator\ArrayElement\ArrayElementFactory;
use ArrayIterator\ArrayElement\ArrayElementInterface;
use ArrayIterator\KeyHierarchy\KeyHierarchy;
use ArrayIterator\KeyHierarchy\KeyHierarchyFactory;
use Generator;

/**
 * @author Ishwor Khadka <ishworkh@gmail.com>
 * @see \Unittest\ArrayIteratorTest
 * @see \Test\Iterator\ArrayIteratorTest
 */
class ArrayIterator implements ArrayIteratorInterface
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
     * @param array $array
     * @param ArrayElementFactory $ArrayElementFactory
     * @param KeyHierarchyFactory $KeyHierarchyFactory
     */
    public function __construct(
        array $array,
        ArrayElementFactory $ArrayElementFactory,
        KeyHierarchyFactory $KeyHierarchyFactory
    )
    {
        $this->_array = $array;
        $this->_ArrayElementFactory = $ArrayElementFactory;
        $this->_KeyHierarchyFactory = $KeyHierarchyFactory;
    }


    /**
     * @return Generator|ArrayElementInterface[]
     */
    public function getElements():Generator
    {
        yield from $this->_goThroughArray($this->_array, $this->_createKeyHierarchy());
    }

    /**
     * @param array $array
     * @param KeyHierarchy $KeyHierarchy
     *
     * @return Generator|ArrayElementInterface[]
     */
    private function _goThroughArray(array $array, KeyHierarchy $KeyHierarchy):Generator
    {
        foreach ($array as $key => $value) {
            $NewKeyHierarchy = $this->cloneKeyHierarchy($KeyHierarchy)->addKey($key);
            if (!is_array($value)) {
                yield $key => $this->createArrayElement(
                    $value,
                    $NewKeyHierarchy
                );
            } else {
                yield from $this->_goThroughArray($value, $NewKeyHierarchy);
            }
        }
    }

    /**
     * @param mixed $value
     * @param KeyHierarchy $KeyHierarchy
     *
     * @return ArrayElement
     */
    protected function createArrayElement($value, KeyHierarchy $KeyHierarchy):ArrayElement
    {
        return $this->_ArrayElementFactory->create($value, $KeyHierarchy);
    }

    /**
     * @return KeyHierarchy
     */
    private function _createKeyHierarchy():KeyHierarchy
    {
        return $this->_KeyHierarchyFactory->create();
    }

    /**
     * @param KeyHierarchy $KeyHierarchy
     *
     * @return KeyHierarchy
     */
    protected function cloneKeyHierarchy(KeyHierarchy $KeyHierarchy):KeyHierarchy
    {
        return $this->_KeyHierarchyFactory->createFromAnotherKeyHierarchy($KeyHierarchy);
    }

}