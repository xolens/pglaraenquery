<?php

namespace Xolens\PgLaraenquiry\App\Repository\View;

use Xolens\PgLarautil\App\Repository\ReadableRepositoryContract;
use Xolens\PgLarautil\App\Util\Model\Filterer;
use Xolens\PgLarautil\App\Util\Model\Sorter;

interface EnquiryViewRepositoryContract extends ReadableRepositoryContract
{

     public function paginateByForm($parentId, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page');

     public function paginateByFormSorted($parentId, Sorter $sorter, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page');

     public function paginateByFormFiltered($parentId, Filterer $filterer, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page');

     public function paginateByFormSortedFiltered($parentId, Sorter $sorter, Filterer $filterer, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page');

}
