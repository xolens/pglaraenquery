<?php

namespace Xolens\PgLaraenquery\Test\Repository\View;

use Xolens\PgLaraenquery\App\Repository\View\SectionFieldViewRepository;
use Xolens\PgLarautil\App\Util\Model\Sorter;
use Xolens\PgLarautil\App\Util\Model\Filterer;
use Xolens\PgLaraenquery\Test\WritableTestPgLaraenqueryBase;

final class SectionFieldViewRepositoryTest extends WritableTestPgLaraenqueryBase
{
    /**
     * Setup the test environment.
     */
    protected function setUp(): void{
        parent::setUp();
        $this->artisan('migrate');
        $this->repo = new SectionFieldViewRepository();
    }

    /**
     * @test
     */
    public function test_make(){
        $i = rand(0, 10000);
        $fieldId = $this->fieldRepo->model()::inRandomOrder()->first()->id;
        $sectionId = $this->sectionRepo->model()::inRandomOrder()->first()->id;
        $item = $this->repository()->make([
            'position' => 'position'.$i,
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
            $item = $this->repository()->create([
                'position' => random_int(0,400000),
                'field_id' => $fieldId,
                'section_id' => $sectionId,
            ]);
            $generatedItemsId[] = $item->response()->id;
        }
        $this->assertEquals(count($generatedItemsId), $toGenerateCount);
        return $generatedItemsId;
    }
}   

