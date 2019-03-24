<?php

namespace Xolens\PgLaraenquiry\App\Repository\View;

use Xolens\PgLaraenquiry\App\Model\Form;
use Xolens\PgLaraenquiry\App\Model\View\FormView;
use Xolens\PgLaraenquiry\App\Repository\FormRepository;
use Xolens\PgLarautil\App\Repository\AbstractReadableRepository;
use Xolens\PgLarautil\App\Util\Model\Filterer;
use Xolens\PgLarautil\App\Util\Model\Sorter;

class FormViewRepository extends AbstractReadableRepository implements FormViewRepositoryContract
{
    public function model(){
        return FormView::class;
    }
}
