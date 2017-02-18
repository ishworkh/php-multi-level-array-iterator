<?php
/**
 * @author Ishwor Khadka <ishworkh@gmail.com>
 * @created 18/02/2017
 */

declare(strict_types = 1);

namespace Test;

require_once __DIR__ . '/BaseIntegration.php';

use ArrayIterator\ArrayIteratorFacade;

/**
 * @author Ishwor Khadka <ishworkh@gmail.com>
 * @see ArrayIteratorFacade
 */
class ArrayIteratorFacadeTest extends BaseIntegration
{
    /**
     * @param array $array
     * @param array $flattened
     *
     * @dataProvider getElementsProvider
     */
    public function testIterate(array $array, array $flattened)
    {
        foreach (ArrayIteratorFacade::iterate($array) as $key => $ArrayElement) {
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
}
