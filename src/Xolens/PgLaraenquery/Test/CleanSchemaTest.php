<?php

namespace Xolens\PgLaraenquery\Test;

use DB;
use Xolens\PgLarautil\Test\CleanSchemaBase;

final class CleanSchemaTest extends CleanSchemaBase
{
    protected function getPackageProviders($app): array{
        return [
            'Xolens\PgLarautil\PgLarautilServiceProvider',
            'Xolens\PgLaraenquery\PgLaraenqueryServiceProvider',
        ];
    }
}
