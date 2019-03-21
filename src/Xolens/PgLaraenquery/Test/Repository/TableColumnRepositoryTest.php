<?php

namespace Xolens\PgLaraenquery\Test\Repository;

use Xolens\PgLaraenquery\App\Model\TableColumn;
use Xolens\PgLaraenquery\App\Repository\TableColumnRepository;
use Xolens\PgLaraenquery\App\Repository\TableFieldRepository;
use Xolens\PgLaraenquery\App\Repository\FieldRepository;
use Xolens\PgLarautil\App\Util\Model\Sorter;
use Xolens\PgLarautil\App\Util\Model\Filterer;
use Xolens\PgLaraenquery\Test\WritableTestPgLaraenqueryBase;

final class TableColumnRepositoryTest extends WritableTestPgLaraenqueryBase
{
    protected $tableFieldRepo;
    protected $fieldRepo;
    /**
     * Setup the test environment.
     */
    protected function setUp(): void{
        parent::setUp();
        $this->artisan('migrate');
        $repo = new TableColumnRepository();
        $this->tableFieldRepo = new TableFieldRepository();
        $this->fieldRepo = new FieldRepository();
        $this->repo = $repo;
    }

    /**
     * @test
     */
    public function test_make(){
        $tableFieldId = $this->tableFieldRepo->model()::inRandomOrder()->first()->id;
        $fieldId = $this->fieldRepo->model()::inRandomOrder()->first()->id;
        $item = factory(TableColumn::class)->make([
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
            $data = factory(TableColumn::class)->make([
                'table_field_id' => $tableFieldId,
                'field_id' => $fieldId,
            ]);
            $item = $this->repository()->create($data);
            $generatedItemsId[] = $item->response()->id;
        }
        $this->assertEquals(count($generatedItemsId), $toGenerateCount);
        return $generatedItemsId;
    }
}   

