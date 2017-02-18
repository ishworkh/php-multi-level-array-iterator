<?php
/**
 * @author  Ishwor Khadka <ishworkh@gmail.com>
 * @created 2016-12-08
 */

declare(strict_types = 1);

namespace ArrayIterator\KeyHierarchy\Exception;

/**
 * @author Ishwor Khadka <ishworkh@gmail.com>
 */
class InvalidParentLevelException extends KeyHierarchyException
{
    private const _MESSAGE = 'Invalid parent level: %d';

    /**
     * @param int $parentLevel
     *
     * @return InvalidParentLevelException
     */
    public static function create(int $parentLevel):InvalidParentLevelException
    {
        return new self(sprintf(self::_MESSAGE, $parentLevel));
    }
}