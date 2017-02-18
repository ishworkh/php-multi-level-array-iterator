<?php
/**
 * @author  Ishwor Khadka <ishworkh@gmail.com>
 * @created 2016-12-09
 */

declare(strict_types = 1);

namespace Test\Iterator;

require_once __DIR__ . '/../BaseIntegration.php';

use ArrayIterator\ArrayElement\ArrayElementFactory;
use ArrayIterator\Iterator\ArrayIterator;
use ArrayIterator\KeyHierarchy\KeyHierarchyFactory;
use Test\BaseIntegration;

/**
 * @author Ishwor Khadka <ishworkh@gmail.com>
 * @see ArrayIterator
 */
class ArrayIteratorTest extends BaseIntegration
{
    /**
     * @param array $array
     * @param array $flattened
     *
     * @dataProvider getElementsProvider
     */
    public function testGetElements(array $array, array $flattened)
    {
        $Iterator = new ArrayIterator($array, $this->_createArrayElementFactory(), $this->_createKeyHierarchyFactory());

        foreach ($Iterator->getElements() as $key => $ArrayElement) {
            self::assertSame($key, $ArrayElement->getKeysHierarchy()->getParentKey(0));
            self::assertSame($ArrayElement->getValue(), $flattened[$ArrayElement->getKeysHierarchy()->__toString()]);
        }
    }

    /**
     * @return array
     */
    public function getElementsProvider():array
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
                    '0' => 0,
                    '1' => 1,
                    '2-0' => 2,
                    '2-1' => 3,
                    '2-2-0' => 4,
                    '2-2-1' => 5,
                    '2-3-0' => 6,
                    '2-3-1' => 7,
                    '2-4' => 8,
                    '2-5-0-0' => 9,
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
                    '0-0' => 1,
                    '0-1-0-0-0' => 2,
                    '1' => 3,
                    '2' => 4,
                ],

            ],
            [
                [
                    'name' => 'abc',
                    'surname' => 'cde',
                    'address' => [
                        'street' => 'streetname',
                        'building' => 24,
                        'postcode' => 3,
                    ],
                    'age' => 54,
                ],
                [
                    'name' => 'abc',
                    'surname' => 'cde',
                    'address-street' => 'streetname',
                    'address-building' => 24,
                    'address-postcode' => 3,
                    'age' => 54,
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
    private function _createArrayElementFactory():ArrayElementFactory
    {
        return new ArrayElementFactory();
    }

    /**
     * @return KeyHierarchyFactory
     */
    private function _createKeyHierarchyFactory():KeyHierarchyFactory
    {
        return new KeyHierarchyFactory();
    }
}