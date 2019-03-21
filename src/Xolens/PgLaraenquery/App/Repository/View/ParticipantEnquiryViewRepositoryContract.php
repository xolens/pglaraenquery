<?php

namespace Xolens\PgLaraenquery\App\Repository;

use Xolens\PgLarautil\App\Repository\ReadableRepositoryContract;
use Xolens\PgLarautil\App\Util\Model\Filterer;
use Xolens\PgLarautil\App\Util\Model\Sorter;

interface ParticipantEnquiryViewRepositoryContract extends ReadableRepositoryContract
{

     public function paginateByParticipant($parentId, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page');

     public function paginateByParticipantSorted($parentId, Sorter $sorter, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page');

     public function paginateByParticipantFiltered($parentId, Filterer $filterer, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page');

     public function paginateByParticipantSortedFiltered($parentId, Sorter $sorter, Filterer $filterer, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page');

     public function paginateByEnquiry($parentId, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page');

     public function paginateByEnquirySorted($parentId, Sorter $sorter, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page');

     public function paginateByEnquiryFiltered($parentId, Filterer $filterer, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page');

     public function paginateByEnquirySortedFiltered($parentId, Sorter $sorter, Filterer $filterer, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page');

}
