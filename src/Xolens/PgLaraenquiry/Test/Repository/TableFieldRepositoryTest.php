<?php

namespace Xolens\PgLaraenquiry\Test\Repository;

use Xolens\PgLaraenquiry\App\Model\TableField;
use Xolens\PgLaraenquiry\App\Repository\TableFieldRepository;
use Xolens\PgLaraenquiry\App\Repository\FieldRepository;
use Xolens\PgLarautil\App\Util\Model\Sorter;
use Xolens\PgLarautil\App\Util\Model\Filterer;
use Xolens\PgLaraenquiry\Test\WritableTestPgLaraenquiryBase;

final class TableFieldRepositoryTest extends WritableTestPgLaraenquiryBase
{
    protected $fieldRepo;
    /**
     * Setup the test environment.
     */
    protected function setUp(): void{
        parent::setUp();
        $this->artisan('migrate');
        $repo = new TableFieldRepository();
        $this->fieldRepo = new FieldRepository();
        $this->repo = $repo;
    }

    /**
     * @test
     */
    public function test_make(){
        $fieldId = $this->fieldRepo->model()::inRandomOrder()->first()->id;
        $item = factory(TableField::class)->make([
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
            $fieldId = $this->fieldRepo->model()::inRandomOrder()->first()->id;
            $data = factory(TableField::class)->make([
                'field_id' => $fieldId,
            ]);
            $item = $this->repository()->create($data);
            $generatedItemsId[] = $item->response()->id;
        }
        $this->assertEquals(count($generatedItemsId), $toGenerateCount);
        return $generatedItemsId;
    }
}   

