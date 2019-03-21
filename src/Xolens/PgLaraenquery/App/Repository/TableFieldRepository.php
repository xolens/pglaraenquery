<?php

namespace Xolens\PgLaraenquery\App\Repository;

use Xolens\PgLaraenquery\App\Model\TableField;
use Xolens\PgLarautil\App\Repository\AbstractWritableRepository;
use Illuminate\Validation\Rule;
use PgLaraenqueryCreateTableTableField;

class TableFieldRepository extends AbstractWritableRepository implements TableFieldRepositoryContract
{
    public function model(){
        return TableField::class;
    }
    /*
    public function validationRules(array $data){
        $id = self::get($data,'id');
        $fieldId = self::get($data,'field_id');
        return [
            'id' => ['required',Rule::unique(PgLaraenqueryCreateTableTableField::table())->where(function ($query) use($id, $fieldId) {
                return $query->where('id','!=', $id)->where('field_id', $fieldId);
            })],
        ];
    }
    //*/
    
}
