<?php

namespace Xolens\PgLaraenquiry\Test\Repository\View;

use Xolens\PgLaraenquiry\App\Repository\View\FieldValueViewRepository;
use Xolens\PgLarautil\App\Util\Model\Sorter;
use Xolens\PgLarautil\App\Util\Model\Filterer;
use Xolens\PgLaraenquiry\Test\WritableTestPgLaraenquiryBase;

final class FieldValueViewRepositoryTest extends WritableTestPgLaraenquiryBase
{
    /**
     * Setup the test environment.
     */
    protected function setUp(): void{
        parent::setUp();
        $this->artisan('migrate');
        $this->repo = new FieldValueViewRepository();
    }

    /**
     * @test
     */
    public function test_make(){
        $i = rand(0, 10000);
        $sectionFieldId = $this->sectionFieldRepo->model()::inRandomOrder()->first()->id;
        $enquiryId = $this->enquiryRepo->model()::inRandomOrder()->first()->id;
        $item = $this->repository()->make([
            'section_field_id' => $sectionFieldId,
            'enquiry_id' => $enquiryId,
            'value' => 'value'.$i,
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
            $sectionFieldId = $this->sectionFieldRepo->model()::inRandomOrder()->first()->id;
            $enquiryId = $this->enquiryRepo->model()::inRandomOrder()->first()->id;
            $item = $this->repository()->create([
                'section_field_id' => $sectionFieldId,
                'enquiry_id' => $enquiryId,
                'value' => 'value'.$i,
            ]);
            $generatedItemsId[] = $item->response()->id;
        }
        $this->assertEquals(count($generatedItemsId), $toGenerateCount);
        return $generatedItemsId;
    }
}   

