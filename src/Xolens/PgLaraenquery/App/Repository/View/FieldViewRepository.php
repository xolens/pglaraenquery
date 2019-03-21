<?php

namespace Xolens\PgLaraenquery\App\Repository;

use Xolens\PgLaraenquery\App\Model\Field;
use Xolens\PgLaraenquery\App\Model\View\FieldView;
use Xolens\PgLaraenquery\App\Repository\FieldRepository;
use Xolens\PgLarautil\App\Repository\AbstractReadableRepository;
use Xolens\PgLarautil\App\Util\Model\Filterer;
use Xolens\PgLarautil\App\Util\Model\Sorter;

class FieldViewRepository extends AbstractReadableRepository implements FieldViewRepositoryContract
{
    public function model(){
        return FieldView::class;
    }
}
