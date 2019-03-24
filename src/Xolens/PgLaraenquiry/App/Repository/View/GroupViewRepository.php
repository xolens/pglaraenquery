<?php

namespace Xolens\PgLaraenquiry\App\Repository\View;

use Xolens\PgLaraenquiry\App\Model\Group;
use Xolens\PgLaraenquiry\App\Model\View\GroupView;
use Xolens\PgLaraenquiry\App\Repository\GroupRepository;
use Xolens\PgLarautil\App\Repository\AbstractReadableRepository;
use Xolens\PgLarautil\App\Util\Model\Filterer;
use Xolens\PgLarautil\App\Util\Model\Sorter;

class GroupViewRepository extends AbstractReadableRepository implements GroupViewRepositoryContract
{
    public function model(){
        return GroupView::class;
    }
}
