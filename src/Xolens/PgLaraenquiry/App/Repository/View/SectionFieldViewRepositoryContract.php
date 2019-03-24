<?php

namespace Xolens\PgLaraenquiry\App\Repository\View;

use Xolens\PgLarautil\App\Repository\ReadableRepositoryContract;
use Xolens\PgLarautil\App\Util\Model\Filterer;
use Xolens\PgLarautil\App\Util\Model\Sorter;

interface SectionFieldViewRepositoryContract extends ReadableRepositoryContract
{

     public function paginateByField($parentId, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page');

     public function paginateByFieldSorted($parentId, Sorter $sorter, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page');

     public function paginateByFieldFiltered($parentId, Filterer $filterer, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page');

     public function paginateByFieldSortedFiltered($parentId, Sorter $sorter, Filterer $filterer, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page');

     public function paginateBySection($parentId, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page');

     public function paginateBySectionSorted($parentId, Sorter $sorter, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page');

     public function paginateBySectionFiltered($parentId, Filterer $filterer, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page');

     public function paginateBySectionSortedFiltered($parentId, Sorter $sorter, Filterer $filterer, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page');

}
