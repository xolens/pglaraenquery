<?php

namespace Xolens\PgLaraenquiry\Test\Repository;

use Xolens\PgLaraenquiry\App\Model\Form;
use Xolens\PgLaraenquiry\App\Repository\FormRepository;
use Xolens\PgLaraenquiry\App\Repository\SectionRepository;
use Xolens\PgLarautil\App\Util\Model\Sorter;
use Xolens\PgLarautil\App\Util\Model\Filterer;
use Xolens\PgLaraenquiry\Test\WritableTestPgLaraenquiryBase;

final class FormRepositoryTest extends WritableTestPgLaraenquiryBase
{
    protected $primarySectionRepo;
    /**
     * Setup the test environment.
     */
    protected function setUp(): void{
        parent::setUp();
        $this->artisan('migrate');
        $repo = new FormRepository();
        $this->primarySectionRepo = new SectionRepository();
        $this->repo = $repo;
    }

    /**
     * @test
     */
    public function test_make(){
        $primarySectionId = $this->primarySectionRepo->model()::inRandomOrder()->first()->id;
        $item = factory(Form::class)->make([
            'primary_section_id' => $primarySectionId,
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
            $primarySectionId = $this->primarySectionRepo->model()::inRandomOrder()->first()->id;
            $data = factory(Form::class)->make([
                'primary_section_id' => $primarySectionId,
            ]);
            $item = $this->repository()->create($data);
            $generatedItemsId[] = $item->response()->id;
        }
        $this->assertEquals(count($generatedItemsId), $toGenerateCount);
        return $generatedItemsId;
    }
}   

