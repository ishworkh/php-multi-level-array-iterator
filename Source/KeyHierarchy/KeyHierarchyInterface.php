<?php
/**
 * @author  Ishwor Khadka <ishworkh@gmail.com>
 * @created 2016-12-08
 */

declare(strict_types = 1);

namespace ArrayIterator\KeyHierarchy;

use ArrayIterator\KeyHierarchy\Exception\InvalidParentLevelException;

/**
 * @author Ishwor Khadka <ishworkh@gmail.com>
 */
interface KeyHierarchyInterface
{
    /**
     * $parentLevel Parent level 1, immediate parent
     *
     * @return string|int
     * @throws InvalidParentLevelException
     */
    public function getParentKey(int $parentLevel = 1);

    /**
     * @return int
     *
     * Level relative to root i.e. 0 for elements in base root array
     */
    public function getHierarchyLevel():int;

    /**
     * @return string
     */
    public function __toString():string;
}