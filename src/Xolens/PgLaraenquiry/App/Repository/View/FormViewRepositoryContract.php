<?php

namespace Xolens\PgLaraenquiry\App\Repository\View;

use Xolens\PgLarautil\App\Repository\ReadableRepositoryContract;
use Xolens\PgLarautil\App\Util\Model\Filterer;
use Xolens\PgLarautil\App\Util\Model\Sorter;

interface FormViewRepositoryContract extends ReadableRepositoryContract
{

     public function paginateByPrimarySection($parentId, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page');

     public function paginateByPrimarySectionSorted($parentId, Sorter $sorter, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page');

     public function paginateByPrimarySectionFiltered($parentId, Filterer $filterer, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page');

     public function paginateByPrimarySectionSortedFiltered($parentId, Sorter $sorter, Filterer $filterer, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page');

}
