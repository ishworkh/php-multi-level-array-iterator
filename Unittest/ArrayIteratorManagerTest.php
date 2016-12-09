<?php
/**
 * @author  Ishwor Khadka <ishwor.khadka@kiosked.com>
 * @created 2016-12-09
 */

namespace Unittest;

use ArrayIterator\ArrayElement\ArrayElementFactory;
use ArrayIterator\ArrayIteratorManager;
use ArrayIterator\Iterator\ArrayIterator;
use ArrayIterator\Iterator\Php7ArrayIterator;
use ArrayIterator\KeyHierarchy\KeyHierarchyFactory;
use PHPUnit_Framework_MockObject_MockObject;

require_once __DIR__ . '/BaseUnittest.php';

/**
 * @author Ishwor Khadka <ishwor.khadka@kiosked.com>
 * @see    TODO
 */
class ArrayIteratorManagerTest extends BaseUnittest
{
    /**
     * @param string $version
     * @param string $expectedIteratorClass
     *
     * @return void
     *
     * @dataProvider phpVersionsProvider
     */
    public function testCreateIterator($version, $expectedIteratorClass)
    {
        if (phpversion() < 7 && floatval($version) >= 7)
        {
            self::markTestSkipped(true);
        }
        $Manager = $this->_createArrayIteratorManager();
        $Manager->expects(self::once())
            ->method('getPhpVersion')
            ->willReturn($version);

        self::assertInstanceOf($expectedIteratorClass, $Manager->createIterator([]));
    }

    /**
     * @return array
     */
    public function phpVersionsProvider()
    {
        return [
            ['1.9', ArrayIterator::class],
            ['5.6', ArrayIterator::class],
            ['5.5.27', ArrayIterator::class],
            ['7.0', Php7ArrayIterator::class],
            ['7.2', Php7ArrayIterator::class],
        ];
    }

    /**
     * @return PHPUnit_Framework_MockObject_MockObject|ArrayIteratorManager
     */
    private function _createArrayIteratorManager()
    {
        $Mock = $this->getMockBuilder(ArrayIteratorManager::class)
            ->setConstructorArgs(
                [
                    $this->_createMockedArrayElementFactory(),
                    $this->_createMockedKeyHierarchyFactory(),
                ]
            )
            ->setMethods(['getPhpVersion'])
            ->getMock();

        return $Mock;
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