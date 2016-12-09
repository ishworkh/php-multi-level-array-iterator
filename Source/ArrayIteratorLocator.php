<?php
/**
 * @author  Ishwor Khadka <ishworkh@gmail.com>
 * @created 2016-12-09
 */

namespace ArrayIterator;

use ArrayIterator\ArrayElement\ArrayElementFactory;
use ArrayIterator\KeyHierarchy\KeyHierarchyFactory;

/**
 * @author Ishwor Khadka <ishworkh@gmail.com>
 */
class ArrayIteratorLocator
{
    /**
     * @var ArrayIteratorLocator
     */
    private static $_Instance;

    /**
     * @return ArrayIteratorLocator
     */
    public static function getInstance()
    {
        if (null === self::$_Instance) {
            self::$_Instance = new self();
        }

        return self::$_Instance;
    }

    /**
     * ArrayIteratorLocator constructor.
     */
    private function __construct()
    {
    }

    /**
     * @var ArrayElementFactory
     */
    private $_ArrayElementFactory;

    /**
     * @return ArrayElementFactory
     */
    public function getArrayElementFactory()
    {
        if (null === $this->_ArrayElementFactory) {
            $this->_ArrayElementFactory = new ArrayElementFactory();
        }

        return $this->_ArrayElementFactory;
    }

    /**
     * @var KeyHierarchyFactory
     */
    private $_KeyHierarchyFactory;

    /**
     * @return KeyHierarchyFactory
     */
    public function getKeyHierarchyFactory()
    {
        if (null === $this->_KeyHierarchyFactory) {
            $this->_KeyHierarchyFactory = new KeyHierarchyFactory();
        }

        return $this->_KeyHierarchyFactory;
    }
}