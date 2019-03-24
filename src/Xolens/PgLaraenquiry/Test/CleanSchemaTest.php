<?php

namespace Xolens\PgLaraenquiry\Test;

use DB;
use Xolens\PgLarautil\Test\CleanSchemaBase;

final class CleanSchemaTest extends CleanSchemaBase
{
    protected function getPackageProviders($app): array{
        return [
            'Xolens\PgLarautil\PgLarautilServiceProvider',
            'Xolens\PgLaraenquiry\PgLaraenquiryServiceProvider',
        ];
    }
}
