<?php

namespace Xolens\PgLaraenquery\App\Repository\View;

use Xolens\PgLaraenquery\App\Model\Group;
use Xolens\PgLaraenquery\App\Model\View\GroupView;
use Xolens\PgLaraenquery\App\Repository\GroupRepository;
use Xolens\PgLarautil\App\Repository\AbstractReadableRepository;
use Xolens\PgLarautil\App\Util\Model\Filterer;
use Xolens\PgLarautil\App\Util\Model\Sorter;

class GroupViewRepository extends AbstractReadableRepository implements GroupViewRepositoryContract
{
    public function model(){
        return GroupView::class;
    }
}
