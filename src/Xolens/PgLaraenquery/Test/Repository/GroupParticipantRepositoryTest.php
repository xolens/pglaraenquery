<?php

namespace Xolens\PgLaraenquery\Test\Repository;

use Xolens\PgLaraenquery\App\Model\GroupParticipant;
use Xolens\PgLaraenquery\App\Repository\GroupParticipantRepository;
use Xolens\PgLaraenquery\App\Repository\GroupRepository;
use Xolens\PgLarautil\App\Util\Model\Sorter;
use Xolens\PgLarautil\App\Util\Model\Filterer;
use Xolens\PgLaraenquery\Test\WritableTestPgLaraenqueryBase;

final class GroupParticipantRepositoryTest extends WritableTestPgLaraenqueryBase
{
    protected $groupRepo;
    /**
     * Setup the test environment.
     */
    protected function setUp(): void{
        parent::setUp();
        $this->artisan('migrate');
        $repo = new GroupParticipantRepository();
        $this->groupRepo = new GroupRepository();
        $this->repo = $repo;
    }

    /**
     * @test
     */
    public function test_make(){
        $groupId = $this->groupRepo->model()::inRandomOrder()->first()->id;
        $item = factory(GroupParticipant::class)->make([
            'group_id' => $groupId,
        ]);
        $this->assertTrue(true);
    }
    
    /** HELPERS FUNCTIONS --------------------------------------------- **/

    public function generateSorter(){
        $sorter = new Sorter();
        $sorter->asc('id');
        return $sorter;
    }

    public function generateFilterer(){
        $filterer = new Filterer();
        $filterer->between('id',[0,14]);
        return $filterer;
    }

    public function generateItems($toGenerateCount){
        $count = $this->repository()->count()->response();
        $generatedItemsId = [];
        for($i=$count; $i<($toGenerateCount+$count); $i++){
            $groupId = $this->groupRepo->model()::inRandomOrder()->first()->id;
            $data = factory(GroupParticipant::class)->make([
                'group_id' => $groupId,
            ]);
            $item = $this->repository()->create($data);
            $generatedItemsId[] = $item->response()->id;
        }
        $this->assertEquals(count($generatedItemsId), $toGenerateCount);
        return $generatedItemsId;
    }
}   

