<?php
/**
 * @author  Ishwor Khadka <ishworkh@gmail.com>
 * @created 2016-12-07
 */

declare(strict_types = 1);

namespace ArrayIterator\ArrayElement;

use ArrayIterator\KeyHierarchy\KeyHierarchyInterface;

/**
 * @author Ishwor Khadka <ishworkh@gmail.com>
 */
interface ArrayElementInterface
{
    /**
     * @return mixed
     */
    public function getValue();

    /**
     * @return KeyHierarchyInterface
     */
    public function getKeysHierarchy():KeyHierarchyInterface;
}