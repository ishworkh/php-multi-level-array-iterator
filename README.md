# (PHP) Multi Level Array Iterator

There are times when there is a need to iterate over an array unknown about the level of nested array it contains.
Multi Level Array Iterator lets u do that. The functionalities are properly tested.

## Basic Usage
```php
$array = [
    1,
    2,
    [
        3,
        4
    ],
    [
        5,
        6,
        [
            7,
            8
        ]
    ],
    [
        9,
        [
            [
                10
            ]
        ],
        11
    ]
];

foreach(\ArrayIterator\MultiLevelArrayIterator::iterate($array) as $ArrayItem)
{
    echo $ArrayItem->getValue() . "\n";
}

Result:
    1
    2
    3
    4
    5
    6
    7
    8
    9
    10
    11
```

## Advanced

```\ArrayIterator\MultiLevelArrayIterator::iterate($array)``` returns a generator of ```ArrayElementInterface```.

```ArrayElementInterface``` provides
   1. getValue()
   2. getKeyHierarchy()
       - getParentKey(int $parentLevel): string
       - getHierarchyLevel(): int

Note:
    For debugging purpose, echo ing  ``` KeyHierarchyInterface ``` prints out strings which indicates hierarchical
    keys gradually from root array to nested children arrays, separated by '-'.

