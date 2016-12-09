<?php
/**
 * @author  Ishwor Khadka <ishworkh@gmail.com>
 * @created 2016-12-08
 */

namespace ArrayIterator\KeyHierarchy;

use ArrayIterator\KeyHierarchy\Exception\InvalidParentLevelException;

/**
 * @author Ishwor Khadka <ishworkh@gmail.com>
 */
interface KeyHierarchyInterface
{
    /**
     * @param int $parentLevel
     * Parent level 1, immediate parent
     *
     * @return string
     * @throws InvalidParentLevelException
     */
    public function getParentKey($parentLevel = 1);

    /**
     * @return int
     *
     * Level relative to root i.e. 0 for elements in base root array
     */
    public function getHierarchyLevel();

    /**
     * @return string
     */
    public function __toString();
}