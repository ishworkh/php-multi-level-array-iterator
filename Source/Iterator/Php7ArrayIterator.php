<?php
/**
 * @author  Ishwor Khadka <ishwor.khadka@kiosked.com>
 * @created 2016-12-09
 */

namespace ArrayIterator\Iterator;

use ArrayIterator\ArrayElement\ArrayElementInterface;
use ArrayIterator\KeyHierarchy\KeyHierarchy;
use Generator;

/**
 * @author Ishwor Khadka <ishwor.khadka@kiosked.com>
 * @see    Unittest\Php7ArrayIteratorTest
 * @see    Test\Php7ArrayIteratorTest
 */
class Php7ArrayIterator extends AbstractArrayIterator
{
    /**
     * @param array        $array
     * @param KeyHierarchy $KeyHierarchy
     *
     * @return Generator|ArrayElementInterface[]
     */
    protected function goThroughArray(array $array, KeyHierarchy $KeyHierarchy)
    {
        foreach ($array as $key => $value) {
            $NewKeyHierarchy = $this->cloneKeyHierarchy($KeyHierarchy)->addKey($key);
            if (!is_array($value)) {
                yield $key => $this->createArrayElement(
                    $value,
                    $NewKeyHierarchy
                );
            } else {
                yield from $this->goThroughArray($value, $NewKeyHierarchy);
            }
        }
    }
}