<?php

namespace Xolens\PgLaraenquiry\Test\Repository;

use Xolens\PgLaraenquiry\App\Model\ParticipantEnquiry;
use Xolens\PgLaraenquiry\App\Repository\ParticipantEnquiryRepository;
use Xolens\PgLaraenquiry\App\Repository\ParticipantRepository;
use Xolens\PgLaraenquiry\App\Repository\EnquiryRepository;
use Xolens\PgLarautil\App\Util\Model\Sorter;
use Xolens\PgLarautil\App\Util\Model\Filterer;
use Xolens\PgLaraenquiry\Test\WritableTestPgLaraenquiryBase;

final class ParticipantEnquiryRepositoryTest extends WritableTestPgLaraenquiryBase
{
    protected $participantRepo;
    protected $enquiryRepo;
    /**
     * Setup the test environment.
     */
    protected function setUp(): void{
        parent::setUp();
        $this->artisan('migrate');
        $repo = new ParticipantEnquiryRepository();
        $this->participantRepo = new ParticipantRepository();
        $this->enquiryRepo = new EnquiryRepository();
        $this->repo = $repo;
    }

    /**
     * @test
     */
    public function test_make(){
        $participantId = $this->participantRepo->model()::inRandomOrder()->first()->id;
        $enquiryId = $this->enquiryRepo->model()::inRandomOrder()->first()->id;
        $item = factory(ParticipantEnquiry::class)->make([
            'participant_id' => $participantId,
            'enquiry_id' => $enquiryId,
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
            $data = factory(ParticipantEnquiry::class)->make([
                'participant_id' => $participantId,
                'enquiry_id' => $enquiryId,
            ]);
            $item = $this->repository()->create($data);
            $generatedItemsId[] = $item->response()->id;
        }
        $this->assertEquals(count($generatedItemsId), $toGenerateCount);
        return $generatedItemsId;
    }
}   

