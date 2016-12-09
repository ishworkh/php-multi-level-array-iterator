<?php
/**
 * @author  Ishwor Khadka <ishworkh@gmail.com>
 * @created 2016-12-08
 */

namespace Unittest;

require_once __DIR__ . '/AbstractArrayIteratorTest.php';

use ArrayIterator\ArrayElement\ArrayElementFactory;
use ArrayIterator\Iterator\ArrayIterator;
use ArrayIterator\Iterator\ArrayIteratorInterface;
use ArrayIterator\KeyHierarchy\KeyHierarchyFactory;

/**
 * @author Ishwor Khadka <ishworkh@gmail.com>
 * @see    ArrayIterator
 */
class ArrayIteratorTest extends AbstractArrayIteratorTest
{
    /**
     * @return ArrayIteratorInterface
     */
    function createArrayIterator(
        array $array, ArrayElementFactory $ArrayElementFactory, KeyHierarchyFactory $KeyHierarchyFactory
    )
    {
        return new ArrayIterator(
            $array, $ArrayElementFactory, $KeyHierarchyFactory
        );
    }

    /**
     * @return bool
     */
    protected function php7()
    {
        return false;
    }
}