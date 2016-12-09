<?php
/**
 * @author  Ishwor Khadka <ishworkh@gmail.com>
 * @created 2016-12-07
 */

namespace ArrayIterator\Iterator;

use ArrayIterator\ArrayElement\ArrayElementInterface;
use Generator;

/**
 * @author Ishwor Khadka <ishworkh@gmail.com>
 */
interface ArrayIteratorInterface
{
    /**
     * @return Generator|ArrayElementInterface[]
     */
    public function getElements();
}