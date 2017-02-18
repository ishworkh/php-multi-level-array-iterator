<?php
/**
 * @author  Ishwor Khadka <ishworkh@gmail.com>
 * @created 2016-12-09
 */

declare(strict_types = 1);

namespace Unittest;

use ArrayIterator\ArrayElement\ArrayElementFactory;
use ArrayIterator\ArrayIteratorFactory;
use ArrayIterator\Iterator\ArrayIterator;
use ArrayIterator\KeyHierarchy\KeyHierarchyFactory;
use PHPUnit_Framework_MockObject_MockObject;

require_once __DIR__ . '/BaseUnittest.php';

/**
 * @author Ishwor Khadka <ishworkh@gmail.com>
 * @see    ArrayIteratorFactory
 */
class ArrayIteratorFactoryTest extends BaseUnittest
{
    public function testCreate()
    {
        $ArrayElementFactory = $this->_createMockedArrayElementFactory();
        $KeyHierarchyFactory = $this->_createMockedKeyHierarchyFactory();

        $Factory = new ArrayIteratorFactory($ArrayElementFactory, $KeyHierarchyFactory);

        self::assertInstanceOf(ArrayIterator::class, $Factory->createIterator([]));
    }

    /**
     * @return PHPUnit_Framework_MockObject_MockObject|ArrayElementFactory
     */
    private function _createMockedArrayElementFactory()
    {
        return $this->getMockBuilder(ArrayElementFactory::class)
            ->disableOriginalConstructor()
            ->getMock();
    }

    /**
     * @return PHPUnit_Framework_MockObject_MockObject|KeyHierarchyFactory
     */
    private function _createMockedKeyHierarchyFactory()
    {
        return $this->getMockBuilder(KeyHierarchyFactory::class)
            ->disableOriginalConstructor()
            ->getMock();
    }
}