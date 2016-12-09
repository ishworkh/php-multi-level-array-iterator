<?php
/**
 * @author  Ishwor Khadka <ishworkh@gmail.com>
 * @created 2016-12-08
 */

namespace ArrayIterator\KeyHierarchy;

/**
 * @author Ishwor Khadka <ishworkh@gmail.com>
 * @see    Unittest\KeyHierarchy\KeyHierarchyTest\KeyHierarchyFactoryTest
 */
class KeyHierarchyFactory
{
    /**
     * @return KeyHierarchy
     */
    public function create()
    {
        return new KeyHierarchy();
    }

    /**
     * @param KeyHierarchy $KeyHierarchy
     *
     * @return KeyHierarchy
     */
    public function createFromAnotherKeyHierarchy(KeyHierarchy $KeyHierarchy){
        return clone $KeyHierarchy;
    }
}