<?php
/**
 * @author  Ishwor Khadka <ishworkh@gmail.com>
 * @created 2016-12-08
 */

namespace ArrayIterator\KeyHierarchy\Exception;

/**
 * @author Ishwor Khadka <ishworkh@gmail.com>
 */
class InvalidParentLevelException extends KeyHierarchyException
{
    const MESSAGE = 'Invalid parent level: %d';

    /**
     * @param int $parentLevel
     *
     * @return InvalidParentLevelException
     */
    public static function create($parentLevel)
    {
        return new self(sprintf(self::MESSAGE, $parentLevel));
    }
}