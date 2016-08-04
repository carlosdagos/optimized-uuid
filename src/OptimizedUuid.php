<?php

namespace Charlydagos\OptimizedUuid;

use Ramsey\Uuid\Uuid;

/**
 * Creates a UUID optimized for storage in mysql (innodb) databases.
 *
 * All credit goes to Karthik Appigatla
 *
 * Read:
 *
 * https://www.percona.com/blog/2014/12/19/store-uuid-optimized-way/
 *
 * @author Carlos D'Agostino <m@cdagostino.io>
 */
class OptimizedUuid
{
    /**
     * @var Ramsey\Uuid\Uuid
     */
    protected $uuid = null;

    /**
     * @param Ramsey\Uuid\Uuid $uuid
     */
    public function __construct(Uuid $uuid)
    {
        $this->uuid = $uuid;
    }

    /**
     * @return string
     */
    public function toString()
    {
        return static::toOrderedUuid($this->uuid->toString());
    }

    /**
     * Get a uuid string in ordered format
     * @param string $uuidString
     * @return string
     */
    public static function toOrderedUuid($uuidString)
    {
        $uuidStringParts = explode('-', $uuidString);

        if (count($uuidStringParts) != 5) {
            throw new InvalidUuidFormatException('Uuid is not 5 parts');
        }

        return sprintf('%s%s%s%s%s',
            $uuidStringParts[2],
            $uuidStringParts[1],
            $uuidStringParts[0],
            $uuidStringParts[3],
            $uuidStringParts[4]
        );
    }
}
