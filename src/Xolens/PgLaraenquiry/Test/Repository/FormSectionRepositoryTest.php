<?php

namespace Xolens\PgLaraenquiry\Test\Repository;

use Xolens\PgLaraenquiry\App\Model\FormSection;
use Xolens\PgLaraenquiry\App\Repository\FormSectionRepository;
use Xolens\PgLaraenquiry\App\Repository\SectionRepository;
use Xolens\PgLaraenquiry\App\Repository\FormRepository;
use Xolens\PgLarautil\App\Util\Model\Sorter;
use Xolens\PgLarautil\App\Util\Model\Filterer;
use Xolens\PgLaraenquiry\Test\WritableTestPgLaraenquiryBase;

final class FormSectionRepositoryTest extends WritableTestPgLaraenquiryBase
{
    protected $sectionRepo;
    protected $formRepo;
    /**
     * Setup the test environment.
     */
    protected function setUp(): void{
        parent::setUp();
        $this->artisan('migrate');
        $repo = new FormSectionRepository();
        $this->sectionRepo = new SectionRepository();
        $this->formRepo = new FormRepository();
        $this->repo = $repo;
    }

    /**
     * @test
     */
    public function test_make(){
        $sectionId = $this->sectionRepo->model()::inRandomOrder()->first()->id;
        $formId = $this->formRepo->model()::inRandomOrder()->first()->id;
        $item = factory(FormSection::class)->make([
            'section_id' => $sectionId,
            'form_id' => $formId,
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
            $sectionId = $this->sectionRepo->model()::inRandomOrder()->first()->id;
            $formId = $this->formRepo->model()::inRandomOrder()->first()->id;
            $data = factory(FormSection::class)->make([
                'section_id' => $sectionId,
                'form_id' => $formId,
            ]);
            $item = $this->repository()->create($data);
            $generatedItemsId[] = $item->response()->id;
        }
        $this->assertEquals(count($generatedItemsId), $toGenerateCount);
        return $generatedItemsId;
    }
}   

