<?php

namespace Xolens\PgLaraenquiry\Test\Repository\View;

use Xolens\PgLaraenquiry\App\Repository\View\ParticipantEnquiryViewRepository;
use Xolens\PgLarautil\App\Util\Model\Sorter;
use Xolens\PgLarautil\App\Util\Model\Filterer;
use Xolens\PgLaraenquiry\Test\WritableTestPgLaraenquiryBase;

final class ParticipantEnquiryViewRepositoryTest extends WritableTestPgLaraenquiryBase
{
    /**
     * Setup the test environment.
     */
    protected function setUp(): void{
        parent::setUp();
        $this->artisan('migrate');
        $this->repo = new ParticipantEnquiryViewRepository();
    }

    /**
     * @test
     */
    public function test_make(){
        $i = rand(0, 10000);
        $participantId = $this->participantRepo->model()::inRandomOrder()->first()->id;
        $enquiryId = $this->enquiryRepo->model()::inRandomOrder()->first()->id;
        $item = $this->repository()->make([
            'participant_id' => $participantId,
            'enquiry_id' => $enquiryId,
            'state' => 'state'.$i,
            'create_time' => 'createTime'.$i,
            'update_time' => 'updateTime'.$i,
            'validation_time' => 'validationTime'.$i,
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
            $participantId = $this->participantRepo->model()::inRandomOrder()->first()->id;
            $enquiryId = $this->enquiryRepo->model()::inRandomOrder()->first()->id;
            $item = $this->repository()->create([
                'participant_id' => $participantId,
                'enquiry_id' => $enquiryId,
                'state' => 'state'.$i,
                'create_time' => 'createTime'.$i,
                'update_time' => 'updateTime'.$i,
                'validation_time' => 'validationTime'.$i,
            ]);
            $generatedItemsId[] = $item->response()->id;
        }
        $this->assertEquals(count($generatedItemsId), $toGenerateCount);
        return $generatedItemsId;
    }
}   

