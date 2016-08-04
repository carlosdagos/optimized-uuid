# Optimized Uuids

Small and simple package implementing an efficient way of storing UUIDs
in a MySQL (InnoDB) database.

Credit for the actual research goes to Karthik Appigatla, and his blog
post for Percona

https://www.percona.com/blog/2014/12/19/store-uuid-optimized-way/

## Usage

This library depends on [`ramsey/uuid`](https://github.com/ramsey/uuid).

To use it you could do

```php
<?php
use Charlydagos\OptimizedUuid\OptimizedUuid;

$uuid = ...; // exisitng uuid string
$optimizedUuid = OptimizedUuid::toOrderedUuid($uuid);
```

Or create an object with an exisitng `Uuid` object

```php
<?php
use Ramsey\Uuid\Uuid;
use Charlydagos\OptimizedUuid\OptimizedUuid;

$uuid = Uuid::uuid1();
$optimizedUuid = new OptimizedUuid($uuid);
```

## License

Please see the [LICENSE](LICENSE) file in this repo.
