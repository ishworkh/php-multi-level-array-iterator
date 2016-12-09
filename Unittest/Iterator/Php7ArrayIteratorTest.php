<?php
/**
 * @author  Ishwor Khadka <ishwor.khadka@kiosked.com>
 * @created 2016-12-09
 */

namespace Unittest;

require_once __DIR__ . '/AbstractArrayIteratorTest.php';

use ArrayIterator\ArrayElement\ArrayElementFactory;
use ArrayIterator\Iterator\ArrayIteratorInterface;
use ArrayIterator\Iterator\Php7ArrayIterator;
use ArrayIterator\KeyHierarchy\KeyHierarchyFactory;

/**
 * @author Ishwor Khadka <ishwor.khadka@kiosked.com>
 * @see    Php7ArrayIterator
 */
class Php7ArrayIteratorTest extends AbstractArrayIteratorTest
{
    /**
     * @return ArrayIteratorInterface
     */
    protected function createArrayIterator(
        array $array, ArrayElementFactory $ArrayElementFactory, KeyHierarchyFactory $KeyHierarchyFactory
    )
    {
        return new Php7ArrayIterator($array, $ArrayElementFactory, $KeyHierarchyFactory);
    }

    /**
     * @return bool
     */
    protected function php7()
    {
        return true;
    }

}