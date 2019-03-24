<?php

namespace Xolens\PgLaraenquiry\App\Repository;

use Xolens\PgLaraenquiry\App\Model\TableColumn;
use Xolens\PgLarautil\App\Repository\AbstractWritableRepository;
use Illuminate\Validation\Rule;
use PgLaraenquiryCreateTableTableColumn;

class TableColumnRepository extends AbstractWritableRepository implements TableColumnRepositoryContract
{
    public function model(){
        return TableColumn::class;
    }
    /*
    public function validationRules(array $data){
        $id = self::get($data,'id');
        $tableFieldId = self::get($data,'table_field_id');
        $fieldId = self::get($data,'field_id');
        return [
            'id' => ['required',Rule::unique(PgLaraenquiryCreateTableTableColumn::table())->where(function ($query) use($id, $tableFieldId, $fieldId) {
                return $query->where('id','!=', $id)->where('table_field_id', $tableFieldId)->where('field_id', $fieldId);
            })],
        ];
    }
    //*/
    
}
