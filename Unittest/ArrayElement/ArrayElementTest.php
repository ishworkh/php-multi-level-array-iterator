<?php
/**
 * @author  Ishwor Khadka <ishworkh@gmail.com>
 * @created 2016-12-08
 */

namespace Unittest\ArrayElement;

require_once __DIR__ . '/../BaseUnittest.php';

use ArrayIterator\ArrayElement\ArrayElement;
use ArrayIterator\ArrayElement\ArrayElementInterface;
use ArrayIterator\KeyHierarchy\KeyHierarchyInterface;
use PHPUnit_Framework_MockObject_MockObject;
use Unittest\BaseUnittest;

/**
 * @author Ishwor Khadka <ishworkh@gmail.com>
 * @see    ArrayElement
 */
class ArrayElementTest extends BaseUnittest
{
    public function testInterface()
    {
        $ArrayElement = new ArrayElement('value', $this->_createMockedKeyHierarchy());

        self::assertInstanceOf(ArrayElementInterface::class, $ArrayElement);
    }

    public function testGetValue()
    {
        $value        = 'value';
        $ArrayElement = new ArrayElement($value, $this->_createMockedKeyHierarchy());

        self::assertSame($value, $ArrayElement->getValue());
    }

    public function testGetKeysHierarchy()
    {
        $Hierarchy    = $this->_createMockedKeyHierarchy();
        $ArrayElement = new ArrayElement('value', $Hierarchy);

        self::assertSame($Hierarchy, $ArrayElement->getKeysHierarchy());
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