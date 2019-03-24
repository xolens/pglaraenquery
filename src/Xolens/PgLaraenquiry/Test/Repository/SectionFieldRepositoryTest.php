<?php

namespace Xolens\PgLaraenquiry\Test\Repository;

use Xolens\PgLaraenquiry\App\Model\SectionField;
use Xolens\PgLaraenquiry\App\Repository\SectionFieldRepository;
use Xolens\PgLaraenquiry\App\Repository\FieldRepository;
use Xolens\PgLaraenquiry\App\Repository\SectionRepository;
use Xolens\PgLarautil\App\Util\Model\Sorter;
use Xolens\PgLarautil\App\Util\Model\Filterer;
use Xolens\PgLaraenquiry\Test\WritableTestPgLaraenquiryBase;

final class SectionFieldRepositoryTest extends WritableTestPgLaraenquiryBase
{
    protected $fieldRepo;
    protected $sectionRepo;
    /**
     * Setup the test environment.
     */
    protected function setUp(): void{
        parent::setUp();
        $this->artisan('migrate');
        $repo = new SectionFieldRepository();
        $this->fieldRepo = new FieldRepository();
        $this->sectionRepo = new SectionRepository();
        $this->repo = $repo;
    }

    /**
     * @test
     */
    public function test_make(){
        $fieldId = $this->fieldRepo->model()::inRandomOrder()->first()->id;
        $sectionId = $this->sectionRepo->model()::inRandomOrder()->first()->id;
        $item = factory(SectionField::class)->make([
            'field_id' => $fieldId,
            'section_id' => $sectionId,
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
            $fieldId = $this->fieldRepo->model()::inRandomOrder()->first()->id;
            $sectionId = $this->sectionRepo->model()::inRandomOrder()->first()->id;
            $data = factory(SectionField::class)->make([
                'field_id' => $fieldId,
                'section_id' => $sectionId,
            ]);
            $item = $this->repository()->create($data);
            $generatedItemsId[] = $item->response()->id;
        }
        $this->assertEquals(count($generatedItemsId), $toGenerateCount);
        return $generatedItemsId;
    }
}   

