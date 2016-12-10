<?php
/**
 * @author  Ishwor Khadka <ishwor.khadka@kiosked.com>
 * @created 2016-12-09
 */

namespace Test;

require_once __DIR__ . '/../BaseIntegration.php';

use ArrayIterator\ArrayElement\ArrayElementFactory;
use ArrayIterator\Iterator\ArrayIteratorInterface;
use ArrayIterator\KeyHierarchy\KeyHierarchyFactory;

/**
 * @author Ishwor Khadka <ishwor.khadka@kiosked.com>
 */
abstract class AbstractArrayIteratorTest extends \PHPUnit_Framework_TestCase
{

    protected function setUp()
    {
        if ($this->php7() && phpversion() < 7) {
            self::markTestSkipped(true);
        }
    }

    /**
     * @param array $array
     *
     * @return void
     *
     * @dataProvider getElementsProvider
     */
    public function testGetElements(array $array, array $flattened)
    {
        $Iterator = $this->createArrayIterator($array, $this->_createArrayElementFactory(), $this->_createKeyHierarchyFactory());

        foreach ($Iterator->getElements() as $key => $ArrayElement) {
            self::assertSame($key, $ArrayElement->getKeysHierarchy()->getParentKey(0));
            self::assertSame($ArrayElement->getValue(), $flattened[$ArrayElement->getKeysHierarchy()->__toString()]);
        }
    }

    /**
     * @return array
     */
    public function getElementsProvider()
    {
        return [
            [
                [
                    0,
                    1,
                    [
                        2,
                        3,
                        [
                            4,
                            5,
                        ],
                        [
                            6,
                            7,
                        ],
                        8,
                        [
                            [
                                9,
                                [
                                    10,
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    '0'         => 0,
                    '1'         => 1,
                    '2-0'       => 2,
                    '2-1'       => 3,
                    '2-2-0'     => 4,
                    '2-2-1'     => 5,
                    '2-3-0'     => 6,
                    '2-3-1'     => 7,
                    '2-4'       => 8,
                    '2-5-0-0'   => 9,
                    '2-5-0-1-0' => 10,
                ],
            ],
            [
                [
                    [
                        1,
                        [
                            [
                                [
                                    2,
                                ],
                            ],
                        ],

                    ],
                    3,
                    4,
                ],
                [
                    '0-0'       => 1,
                    '0-1-0-0-0' => 2,
                    '1'         => 3,
                    '2'         => 4,
                ],

            ],
            [
                [
                    'name'    => 'abc',
                    'surname' => 'cde',
                    'address' => [
                        'street'   => 'streetname',
                        'building' => 24,
                        'postcode' => 3,
                    ],
                    'age'     => 54,
                ],
                [
                    'name'             => 'abc',
                    'surname'          => 'cde',
                    'address-street'   => 'streetname',
                    'address-building' => 24,
                    'address-postcode' => 3,
                    'age'              => 54,
                ],
            ],
            [
                [
                    1,
                    2,
                    3,
                    4
                ],
                [
                    '0' => 1,
                    '1' => 2,
                    '2' => 3,
                    '3' => 4
                ]
            ]
        ];
    }

    /**
     * @return ArrayElementFactory
     */
    private function _createArrayElementFactory()
    {
        return new ArrayElementFactory();
    }

    /**
     * @return KeyHierarchyFactory
     */
    private function _createKeyHierarchyFactory()
    {
        return new KeyHierarchyFactory();
    }

    /**
     * @return ArrayIteratorInterface
     */
    abstract protected function createArrayIterator(
        array $array, ArrayElementFactory $ArrayElementFactory, KeyHierarchyFactory $KeyHierarchyFactory
    );

    /**
     * @return bool
     */
    abstract protected function php7();
}