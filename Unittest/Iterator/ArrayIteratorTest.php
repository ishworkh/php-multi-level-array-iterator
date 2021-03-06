<?php
/**
 * @author  Ishwor Khadka <ishworkh@gmail.com>
 * @created 2016-12-09
 */

declare(strict_types = 1);

namespace Unittest;

require_once __DIR__ . '/../BaseUnittest.php';

use ArrayIterator\ArrayElement\ArrayElementFactory;
use ArrayIterator\ArrayElement\ArrayElementInterface;
use ArrayIterator\Iterator\ArrayIterator;
use ArrayIterator\Iterator\ArrayIteratorInterface;
use ArrayIterator\KeyHierarchy\KeyHierarchy;
use ArrayIterator\KeyHierarchy\KeyHierarchyFactory;
use PHPUnit_Framework_MockObject_MockObject;

/**
 * @author Ishwor Khadka <ishworkh@gmail.com>
 * @see ArrayIterator
 */
abstract class ArrayIteratorTest extends BaseUnittest
{
    public function testInterface()
    {
        $ArrayIterator = new ArrayIterator(
            [], $this->_createMockedArrayElementFactory(), $this->_createMockedKeyHierarchyFactory()
        );
        self::assertInstanceOf(ArrayIteratorInterface::class, $ArrayIterator);
    }

    /**
     * @param array $array
     * @param int $flattenedCount
     *
     * @return void
     *
     * @dataProvider getElementsArrayProvider
     */
    public function testGetElements(array $array, $flattenedCount)
    {
        $ArrayElementFactory = $this->_createMockedArrayElementFactory();
        $ArrayElementFactory->expects(self::exactly($flattenedCount))
            ->method('create')
            ->willReturn($this->_createMockedArrayElement());

        $KeyHierarchyFactory = $this->_createMockedKeyHierarchyFactory();
        $KeyHierarchyFactory->expects(self::once())
            ->method('create')
            ->willReturn($this->_createMockedKeyHierarchy());
        $KeyHierarchyFactory->expects(self::any())
            ->method('createFromAnotherKeyHierarchy')
            ->willReturn($this->_createMockedKeyHierarchy());

        $ArrayIterator = new ArrayIterator(
            $array, $ArrayElementFactory, $KeyHierarchyFactory
        );

        iterator_to_array($ArrayIterator->getElements());
    }

    /**
     * @return array
     */
    public function getElementsArrayProvider()
    {
        return [
            [
                [
                    1,
                    [
                        3,
                        4,
                        [
                            5,
                        ],
                    ],
                    4,
                    [
                        4,
                        6,
                    ],
                ],
                7,
                10,
            ],
            [
                [
                    1,
                    2,
                    [
                        3,
                    ],
                ],
                3,
            ],

        ];
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

    /**
     * @return PHPUnit_Framework_MockObject_MockObject|ArrayElementInterface
     */
    private function _createMockedArrayElement()
    {
        return $this->getMockBuilder(ArrayElementInterface::class)->getMock();
    }

    /**
     * @return PHPUnit_Framework_MockObject_MockObject|KeyHierarchy
     */
    private function _createMockedKeyHierarchy()
    {
        $Mock = $this->getMockBuilder(KeyHierarchy::class)
            ->disableOriginalConstructor()
            ->getMock();
        $Mock->expects(self::any())
            ->method('addKey')
            ->willReturnSelf();

        return $Mock;
    }
}