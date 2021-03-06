<?php

namespace Xolens\PgLaraenquiry\Test\Repository\View;

use Xolens\PgLaraenquiry\App\Repository\View\EnquiryViewRepository;
use Xolens\PgLarautil\App\Util\Model\Sorter;
use Xolens\PgLarautil\App\Util\Model\Filterer;
use Xolens\PgLaraenquiry\Test\WritableTestPgLaraenquiryBase;

final class EnquiryViewRepositoryTest extends WritableTestPgLaraenquiryBase
{
    /**
     * Setup the test environment.
     */
    protected function setUp(): void{
        parent::setUp();
        $this->artisan('migrate');
        $this->repo = new EnquiryViewRepository();
    }

    /**
     * @test
     */
    public function test_make(){
        $i = rand(0, 10000);
        $formId = $this->formRepo->model()::inRandomOrder()->first()->id;
        $item = $this->repository()->make([
            'name' => 'name'.$i,
            'title' => 'title'.$i,
            'description' => 'description'.$i,
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
            $formId = $this->formRepo->model()::inRandomOrder()->first()->id;
            $item = $this->repository()->create([
                'name' => 'name'.$i,
                'title' => 'title'.$i,
                'description' => 'description'.$i,
                'form_id' => $formId,
            ]);
            $generatedItemsId[] = $item->response()->id;
        }
        $this->assertEquals(count($generatedItemsId), $toGenerateCount);
        return $generatedItemsId;
    }
}   

