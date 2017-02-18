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
 * @see    \Unittest\KeyHierarchy\KeyHierarchyTest\KeyHierarchyTest
 */
class KeyHierarchy implements KeyHierarchyInterface
{
    /**
     * @var array
     *
     * Indexed array with self key at 0, and gradual parent keys sequentially after that
     */
    private $_keys = [];

    /**
     * @param string|int $key
     *
     * @return KeyHierarchy
     */
    public function addKey($key):self
    {
        $this->_keys[] = $key;

        return $this;
    }

    /**
     * @return int
     *
     * Level relative to root i.e. 0 for elements in base root array
     */
    public function getHierarchyLevel():int
    {
        return $this->_getLevel();
    }

    /**
     * @return int
     */
    private function _getLevel():int
    {
        return count($this->_keys) - 1;
    }

    /**
     * @param int $parentLevel
     * Parent level 1, immediate parent
     * Parent level 0, self
     *
     * @return string|int
     * @throws InvalidParentLevelException
     */
    public function getParentKey(int $parentLevel = 1)
    {
        $levelRelativeToRoot = $this->_convertParentLevelToHierarchyLevel($parentLevel);
        if (!array_key_exists($levelRelativeToRoot, $this->_keys)) {
            throw InvalidParentLevelException::create($parentLevel);
        }

        return $this->_keys[$levelRelativeToRoot];
    }

    /**
     * @param int $parentLevel
     *
     * @return int
     */
    private function _convertParentLevelToHierarchyLevel(int $parentLevel):int
    {
        return $this->_getLevel() - $parentLevel;
    }

    /**
     * @return string
     *
     * For debugging purpose
     */
    public function __toString():string
    {
        return implode('-', $this->_keys);
    }
}