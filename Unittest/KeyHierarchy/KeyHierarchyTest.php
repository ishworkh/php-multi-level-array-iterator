<?php
/**
 * @author  Ishwor Khadka <ishworkh@gmail.com>
 * @created 2016-12-08
 */

namespace Unittest\KeyHierarchy\KeyHierarchyTest;

require_once __DIR__ . '/../BaseUnittest.php';

use ArrayIterator\KeyHierarchy\Exception\InvalidParentLevelException;
use ArrayIterator\KeyHierarchy\KeyHierarchy;
use ArrayIterator\KeyHierarchy\KeyHierarchyInterface;
use Unittest\BaseUnittest;

/**
 * @author Ishwor Khadka <ishworkh@gmail.com>
 * @see    KeyHierarchy
 */
class KeyHierarchyTest extends BaseUnittest
{
    public function testInterface()
    {
        $KeyHierarchy = new KeyHierarchy();
        self::assertInstanceOf(KeyHierarchyInterface::class, $KeyHierarchy);
    }

    public function testGetParentKey()
    {
        $keys = ['root', 1, 2, 4, 'self'];

        $KeyHierarchy = new KeyHierarchy();
        foreach ($keys as $key) {
            $KeyHierarchy->addKey($key);
        }

        self::assertSame($keys[4], $KeyHierarchy->getParentKey(0));
        self::assertSame($keys[3], $KeyHierarchy->getParentKey(1));
        self::assertSame($keys[2], $KeyHierarchy->getParentKey(2));
        self::assertSame($keys[1], $KeyHierarchy->getParentKey(3));
        self::assertSame($keys[0], $KeyHierarchy->getParentKey(4));
    }

    public function testToString()
    {
        $keys = ['root', 1, 2, 4, 'sdfds', 'self'];

        $KeyHierarchy = new KeyHierarchy();
        foreach ($keys as $key) {
            $KeyHierarchy->addKey($key);
        }

        self::assertSame('root-1-2-4-sdfds-self', $KeyHierarchy->__toString());
    }

    public function testGetParentKeyThrowsForInvalidParentLevel()
    {
        $keys               = [1, 2, 4, 'sdfds', 'root'];
        $invalidParentLevel = count($keys);

        $KeyHierarchy = new KeyHierarchy($keys);
        try {
            $KeyHierarchy->getParentKey($invalidParentLevel);
        } catch (InvalidParentLevelException $Ex) {
            self::assertContains(strval($invalidParentLevel), $Ex->getMessage());
        }
    }

    public function testGetLevel()
    {
        $keys = ['root', 1, 2, 4, 'sdfds', 'self'];

        $KeyHierarchy = new KeyHierarchy();
        foreach ($keys as $key) {
            $KeyHierarchy->addKey($key);
        }

        self::assertEquals(5, $KeyHierarchy->getHierarchyLevel());
    }
}