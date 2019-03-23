<?php

namespace Xolens\PgLaraenquery\App\Repository\View;

use Xolens\PgLaraenquery\App\Model\Section;
use Xolens\PgLaraenquery\App\Model\View\SectionView;
use Xolens\PgLaraenquery\App\Repository\SectionRepository;
use Xolens\PgLarautil\App\Repository\AbstractReadableRepository;
use Xolens\PgLarautil\App\Util\Model\Filterer;
use Xolens\PgLarautil\App\Util\Model\Sorter;

class SectionViewRepository extends AbstractReadableRepository implements SectionViewRepositoryContract
{
    public function model(){
        return SectionView::class;
    }
}
