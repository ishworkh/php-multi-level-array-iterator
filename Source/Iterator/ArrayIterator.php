<?php
/**
 * @author  Ishwor Khadka <ishworkh@gmail.com>
 * @created 2016-12-08
 */

namespace ArrayIterator\Iterator;

use ArrayIterator\ArrayElement\ArrayElementInterface;
use ArrayIterator\KeyHierarchy\KeyHierarchy;
use Generator;

/**
 * @author Ishwor Khadka <ishworkh@gmail.com>
 * @see    Unittest\ArrayIteratorTest
 * @see    Test\ArrayIteratorTest
 */
class ArrayIterator extends AbstractArrayIterator
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
                yield $this->createArrayElement(
                    $value,
                    $NewKeyHierarchy
                );
            } else {
                foreach ($this->goThroughArray($value, $NewKeyHierarchy) as $ArrayElement) {
                    yield $ArrayElement;
                }
            }
        }
    }
}