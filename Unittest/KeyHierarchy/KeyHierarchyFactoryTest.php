<?php
/**
 * @author  Ishwor Khadka <ishworkh@gmail.com>
 * @created 2016-12-08
 */

namespace Unittest\KeyHierarchy\KeyHierarchyTest;

require_once __DIR__ . '/../BaseUnittest.php';

use ArrayIterator\KeyHierarchy\KeyHierarchy;
use ArrayIterator\KeyHierarchy\KeyHierarchyFactory;
use Unittest\BaseUnittest;

/**
 * @author Ishwor Khadka <ishworkh@gmail.com>
 * @see    KeyHierarchyFactory
 */
class KeyHierarchyFactoryTest extends BaseUnittest
{
    public function testCreate()
    {
        $Factory = new KeyHierarchyFactory();

        self::assertInstanceOf(KeyHierarchy::class, $Factory->create());
    }

    public function testCreateFromAnotherKeyHierarchy()
    {
        $Factory      = new KeyHierarchyFactory();
        $KeyHierarchy = $this->_createMockedKeyHierarchy();

        $NewKeyHierarchy = $Factory->createFromAnotherKeyHierarchy($KeyHierarchy);
        self::assertInstanceOf(KeyHierarchy::class, $NewKeyHierarchy);
        self::assertNotSame($KeyHierarchy, $NewKeyHierarchy);
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|KeyHierarchy
     */
    private function _createMockedKeyHierarchy()
    {
        return $this->getMockBuilder(KeyHierarchy::class)
            ->disableOriginalConstructor()
            ->getMock();
    }
}