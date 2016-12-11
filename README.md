# (PHP) Multi Level Array Iterator

There are times when there is a need to iterate over an array being unknown about the level of nested array it contains.
Multi Level Array Iterator lets u do that. This functionality supports associative array and is properly tested. 

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

foreach(\ArrayIterator\ArrayIteratorFacade::iterate($array) as $key => $ArrayItem)
{
    echo $key . ' - ' . $ArrayItem->getValue() . "\n";
}

Result:
    0 - 1
    1 - 2
    0 - 3
    1 - 4
    0 - 5
    1 - 6
    0 - 7
    1 - 8
    0 - 9
    0 - 10
    2 - 11
```

## Advanced

```\ArrayIterator\ArrayIteratorFacade::iterate($array)``` returns a generator of ```ArrayElementInterface```.

```ArrayElementInterface``` provides
   1. getValue():mixed
   2. getKeyHierarchy():KeyHierarchyInterface
       - getParentKey(int $parentLevel): string
       - getHierarchyLevel(): int

Note:
    For debugging purpose, echoing  ``` KeyHierarchyInterface ``` prints out string representation of keys hierarchy
    starting from root array separated by '-'.

