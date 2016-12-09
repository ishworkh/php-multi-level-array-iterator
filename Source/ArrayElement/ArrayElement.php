<?php
/**
 * @author  Ishwor Khadka <ishworkh@gmail.com>
 * @created 2016-12-08
 */

namespace ArrayIterator\ArrayElement;

use ArrayIterator\KeyHierarchy\KeyHierarchyInterface;

/**
 * @author Ishwor Khadka <ishworkh@gmail.com>
 * @see    Unittest\ArrayElement\ArrayElementTest
 */
class ArrayElement implements ArrayElementInterface
{
    /**
     * @var mixed
     */
    private $_value;

    /**
     * @var KeyHierarchyInterface
     */
    private $_KeyHierarchy;

    /**
     * ArrayElement constructor.
     *
     * @param mixed                 $value
     * @param KeyHierarchyInterface $KeyHierarchy
     */
    public function __construct($value, KeyHierarchyInterface $KeyHierarchy)
    {
        $this->_value        = $value;
        $this->_KeyHierarchy = $KeyHierarchy;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->_value;
    }


    /**
     * @return KeyHierarchyInterface
     */
    public function getKeysHierarchy()
    {
        return $this->_KeyHierarchy;
    }
}