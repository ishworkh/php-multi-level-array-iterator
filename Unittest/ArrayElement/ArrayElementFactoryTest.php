<?php
/**
 * @author  Ishwor Khadka <ishworkh@gmail.com>
 * @created 2016-12-08
 */

declare(strict_types = 1);

namespace Unittest\ArrayElement;

require_once __DIR__ . '/../BaseUnittest.php';

use ArrayIterator\ArrayElement\ArrayElement;
use ArrayIterator\ArrayElement\ArrayElementFactory;
use ArrayIterator\KeyHierarchy\KeyHierarchyInterface;
use PHPUnit_Framework_MockObject_MockObject;
use Unittest\BaseUnittest;

/**
 * @author Ishwor Khadka <ishworkh@gmail.com>
 * @see    ArrayElementFactory
 */
class ArrayElementFactoryTest extends BaseUnittest
{
    public function testCreate()
    {
        $Factory = new ArrayElementFactory();
        self::assertInstanceOf(ArrayElement::class, $Factory->create('value', $this->_createMockedKeyHierarchy()));
    }

    /**
     * @return PHPUnit_Framework_MockObject_MockObject|KeyHierarchyInterface
     */
    private function _createMockedKeyHierarchy()
    {
        return $this->getMockBuilder(KeyHierarchyInterface::class)
            ->getMock();
    }
}