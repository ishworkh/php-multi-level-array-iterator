<?php
/**
 * @author  Ishwor Khadka <ishworkh@gmail.com>
 * @created 2016-12-09
 */

declare(strict_types = 1);

namespace ArrayIterator;

use ArrayIterator\ArrayElement\ArrayElementInterface;
use Generator;

/**
 * @author Ishwor Khadka <ishworkh@gmail.com>
 * @see \Test\ArrayIteratorFacadeTest
 */
class ArrayIteratorFacade
{
    /**
     * @param array $array
     *
     * @return ArrayElementInterface[]|Generator
     */
    public static function iterate(array $array):Generator
    {
        $Locator = ArrayIteratorLocator::getInstance();
        $ArrayIterator = $Locator->getArrayIteratorFactory()->createIterator($array);

        yield from $ArrayIterator->getElements();
    }

}