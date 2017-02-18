<?php
/**
 * @author  Ishwor Khadka <ishworkh@gmail.com>
 * @created 2016-12-08
 */

declare(strict_types = 1);

namespace ArrayIterator\ArrayElement;

use ArrayIterator\KeyHierarchy\KeyHierarchyInterface;

/**
 * @author Ishwor Khadka <ishworkh@gmail.com>
 * @see    \Unittest\ArrayElement\ArrayElementFactoryTest
 */
class ArrayElementFactory
{
    /**
     * @param mixed $value
     * @param KeyHierarchyInterface $KeyHierarchy
     *
     * @return ArrayElement
     */
    public function create($value, KeyHierarchyInterface $KeyHierarchy):ArrayElement
    {
        return new ArrayElement($value, $KeyHierarchy);
    }
}