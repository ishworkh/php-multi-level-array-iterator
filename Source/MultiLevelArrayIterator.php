<?php
/**
 * @author  Ishwor Khadka <ishworkh@gmail.com>
 * @created 2016-12-09
 */

namespace ArrayIterator;

use ArrayIterator\ArrayElement\ArrayElementInterface;
use ArrayIterator\Iterator\ArrayIterator;

/**
 * @author Ishwor Khadka <ishworkh@gmail.com>
 */
class MultiLevelArrayIterator
{
    /**
     * @param array $array
     *
     * @return ArrayElementInterface[]|\Generator
     */
    public static function iterate(array $array)
    {
        $Locator       = ArrayIteratorLocator::getInstance();
        $ArrayIterator = new ArrayIterator(
            $array, $Locator->getArrayElementFactory(), $Locator->getKeyHierarchyFactory()
        );

        return $ArrayIterator->getElements();
    }

}