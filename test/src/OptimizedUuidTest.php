<?php

namespace Charlydagos\OptimizedUuid\Test;

use PHPUnit_Framework_TestCase;
use Ramsey\Uuid\Uuid;
use Charlydagos\OptimizedUuid\OptimizedUuid;

class OptimizedUuidTest extends PHPUnit_Framework_TestCase
{
    public function testOptimizeduuid()
    {
        $uuidString = '58e0a7d7-eebc-11d8-9669-0800200c9a66';

        $this->assertEquals(
            OptimizedUuid::toOrderedUuid($uuidString),
            '11d8eebc58e0a7d796690800200c9a66'
        );
    }

    /**
     * @expectedException TypeError
     */
    public function testOptimizedNeedsUuid()
    {
        new OptimizedUuid();
    }

    public function testInternalUuidObject()
    {
        $optimizedUuid = new OptimizedUuid(Uuid::uuid1());
        $this->assertInstanceOf(Uuid::class, $optimizedUuid->getUuid());
    }

    public function testOptimizedCanBeInstantiated()
    {
        $optimizedUuid = new OptimizedUuid(Uuid::uuid1());
        $this->assertInstanceOf(OptimizedUuid::class, $optimizedUuid);
    }
}
