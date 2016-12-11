<?php
/**
 * @author  Ishwor Khadka <ishworkh@gmail.com>
 * @created 2016-12-09
 */

namespace ArrayIterator;

use ArrayIterator\ArrayElement\ArrayElementInterface;

/**
 * @author Ishwor Khadka <ishworkh@gmail.com>
 */
class ArrayIteratorFacade
{
    /**
     * @param array $array
     *
     * @return ArrayElementInterface[]|\Generator
     */
    public static function iterate(array $array)
    {
        $Locator       = ArrayIteratorLocator::getInstance();
        $ArrayIterator = $Locator->getArrayIteratorFactory()->createIterator($array);

        return $ArrayIterator->getElements();
    }

}