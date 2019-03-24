<?php

namespace Xolens\PgLaraenquiry\App\Repository\View;

use Xolens\PgLaraenquiry\App\Model\Field;
use Xolens\PgLaraenquiry\App\Model\View\FieldView;
use Xolens\PgLaraenquiry\App\Repository\FieldRepository;
use Xolens\PgLarautil\App\Repository\AbstractReadableRepository;
use Xolens\PgLarautil\App\Util\Model\Filterer;
use Xolens\PgLarautil\App\Util\Model\Sorter;

class FieldViewRepository extends AbstractReadableRepository implements FieldViewRepositoryContract
{
    public function model(){
        return FieldView::class;
    }
}
