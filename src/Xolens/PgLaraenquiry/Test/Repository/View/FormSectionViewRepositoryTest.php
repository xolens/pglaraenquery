<?php

namespace Xolens\PgLaraenquiry\Test\Repository\View;

use Xolens\PgLaraenquiry\App\Repository\View\FormSectionViewRepository;
use Xolens\PgLarautil\App\Util\Model\Sorter;
use Xolens\PgLarautil\App\Util\Model\Filterer;
use Xolens\PgLaraenquiry\Test\WritableTestPgLaraenquiryBase;

final class FormSectionViewRepositoryTest extends WritableTestPgLaraenquiryBase
{
    /**
     * Setup the test environment.
     */
    protected function setUp(): void{
        parent::setUp();
        $this->artisan('migrate');
        $this->repo = new FormSectionViewRepository();
    }

    /**
     * @test
     */
    public function test_make(){
        $i = rand(0, 10000);
        $sectionId = $this->sectionRepo->model()::inRandomOrder()->first()->id;
        $formId = $this->formRepo->model()::inRandomOrder()->first()->id;
        $item = $this->repository()->make([
            'position' => 'position'.$i,
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
            $item = $this->repository()->create([
                'position' => random_int(0,400000),
                'section_id' => $sectionId,
                'form_id' => $formId,
            ]);
            $generatedItemsId[] = $item->response()->id;
        }
        $this->assertEquals(count($generatedItemsId), $toGenerateCount);
        return $generatedItemsId;
    }
}   

