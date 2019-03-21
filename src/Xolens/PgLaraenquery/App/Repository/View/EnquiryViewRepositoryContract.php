<?php

namespace Xolens\PgLaraenquery\App\Repository;

use Xolens\PgLarautil\App\Repository\ReadableRepositoryContract;
use Xolens\PgLarautil\App\Util\Model\Filterer;
use Xolens\PgLarautil\App\Util\Model\Sorter;

interface EnquiryViewRepositoryContract extends ReadableRepositoryContract
{

     public function paginateByGroup($parentId, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page');

     public function paginateByGroupSorted($parentId, Sorter $sorter, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page');

     public function paginateByGroupFiltered($parentId, Filterer $filterer, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page');

     public function paginateByGroupSortedFiltered($parentId, Sorter $sorter, Filterer $filterer, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page');

     public function paginateByForm($parentId, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page');

     public function paginateByFormSorted($parentId, Sorter $sorter, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page');

     public function paginateByFormFiltered($parentId, Filterer $filterer, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page');

     public function paginateByFormSortedFiltered($parentId, Sorter $sorter, Filterer $filterer, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page');

}
