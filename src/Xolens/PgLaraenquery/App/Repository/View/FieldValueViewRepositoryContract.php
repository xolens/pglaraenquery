<?php

namespace Xolens\PgLaraenquery\App\Repository;

use Xolens\PgLarautil\App\Repository\ReadableRepositoryContract;
use Xolens\PgLarautil\App\Util\Model\Filterer;
use Xolens\PgLarautil\App\Util\Model\Sorter;

interface FieldValueViewRepositoryContract extends ReadableRepositoryContract
{

     public function paginateBySectionField($parentId, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page');

     public function paginateBySectionFieldSorted($parentId, Sorter $sorter, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page');

     public function paginateBySectionFieldFiltered($parentId, Filterer $filterer, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page');

     public function paginateBySectionFieldSortedFiltered($parentId, Sorter $sorter, Filterer $filterer, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page');

}
