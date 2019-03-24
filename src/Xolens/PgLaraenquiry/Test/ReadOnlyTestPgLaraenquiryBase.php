<?php

namespace Xolens\PgLaraenquiry\Test;

use Xolens\PgLarautil\Test\TestCase;
use Xolens\PgLarautil\Test\RepositoryTrait\ReadOnlyRepositoryTestTrait;

abstract class ReadOnlyTestPgLaraenquiryBase extends TestCase
{
    use ReadOnlyRepositoryTestTrait;
    
    protected $repo;

    public function repository(){
        return $this->repo;
    }

    protected function getPackageProviders($app): array{
        return [
            'Xolens\PgLaraenquiry\PgLaraenquiryServiceProvider',
        ];
    }
}
