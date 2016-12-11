<?php

use ArrayIterator\ArrayIteratorFacade;

require_once __DIR__ . '/vendor/autoload.php';
$before = memory_get_usage();
$array = [
    1,
    2,
    [
        3,
        4,
        [
            9,
            11,
            [
                39,
                [
                    324,
                ],
                23,
                [
                    2, 3,
                ],
            ],
            [
                23,
                [
                    23,
                    [
                        90,
                        89,

                    ],
                    45,
                    [
                        344,
                        222,
                    ],
                ],
            ],
        ],
    ],
];



$after = memory_get_usage();
var_dump($after - $before);
foreach (ArrayIteratorFacade::iterate(($array)) as $index => $ArrayElement)
{
    echo $ArrayElement->getValue();
    echo '----';
    echo $ArrayElement->getKeysHierarchy()->getHierarchyLevel();
    echo "\n";
}

$aa = memory_get_usage();
var_dump($aa - $before);
