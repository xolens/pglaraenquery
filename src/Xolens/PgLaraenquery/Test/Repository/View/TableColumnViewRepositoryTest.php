<?php

namespace Xolens\PgLaraenquery\Test\Repository\View;

use Xolens\PgLaraenquery\App\Repository\View\TableColumnViewRepository;
use Xolens\PgLarautil\App\Util\Model\Sorter;
use Xolens\PgLarautil\App\Util\Model\Filterer;
use Xolens\PgLaraenquery\Test\WritableTestPgLaraenqueryBase;

final class TableColumnViewRepositoryTest extends WritableTestPgLaraenqueryBase
{
    /**
     * Setup the test environment.
     */
    protected function setUp(): void{
        parent::setUp();
        $this->artisan('migrate');
        $this->repo = new TableColumnViewRepository();
    }

    /**
     * @test
     */
    public function test_make(){
        $i = rand(0, 10000);
        $tableFieldId = $this->tableFieldRepo->model()::inRandomOrder()->first()->id;
        $fieldId = $this->fieldRepo->model()::inRandomOrder()->first()->id;
        $item = $this->repository()->make([
            'position' => 'position'.$i,
            'table_field_id' => $tableFieldId,
            'field_id' => $fieldId,
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
            $tableFieldId = $this->tableFieldRepo->model()::inRandomOrder()->first()->id;
            $fieldId = $this->fieldRepo->model()::inRandomOrder()->first()->id;
            $item = $this->repository()->create([
                'position' => random_int(0,400000),
                'table_field_id' => $tableFieldId,
                'field_id' => $fieldId,
            ]);
            $generatedItemsId[] = $item->response()->id;
        }
        $this->assertEquals(count($generatedItemsId), $toGenerateCount);
        return $generatedItemsId;
    }
}   

