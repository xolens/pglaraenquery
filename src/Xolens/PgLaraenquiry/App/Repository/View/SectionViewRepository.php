<?php

namespace Xolens\PgLaraenquiry\App\Repository\View;

use Xolens\PgLaraenquiry\App\Model\Section;
use Xolens\PgLaraenquiry\App\Model\View\SectionView;
use Xolens\PgLaraenquiry\App\Repository\SectionRepository;
use Xolens\PgLarautil\App\Repository\AbstractReadableRepository;
use Xolens\PgLarautil\App\Util\Model\Filterer;
use Xolens\PgLarautil\App\Util\Model\Sorter;

class SectionViewRepository extends AbstractReadableRepository implements SectionViewRepositoryContract
{
    public function model(){
        return SectionView::class;
    }
}
