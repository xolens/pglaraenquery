<?php

namespace Xolens\PgLaraenquery\App\Repository\View;

use Xolens\PgLaraenquery\App\Model\Participant;
use Xolens\PgLaraenquery\App\Model\View\ParticipantView;
use Xolens\PgLaraenquery\App\Repository\ParticipantRepository;
use Xolens\PgLarautil\App\Repository\AbstractReadableRepository;
use Xolens\PgLarautil\App\Util\Model\Filterer;
use Xolens\PgLarautil\App\Util\Model\Sorter;

class ParticipantViewRepository extends AbstractReadableRepository implements ParticipantViewRepositoryContract
{
    public function model(){
        return ParticipantView::class;
    }
}
