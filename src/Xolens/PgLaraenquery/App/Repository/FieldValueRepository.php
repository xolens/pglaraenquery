<?php

namespace Xolens\PgLaraenquery\App\Repository;

use Xolens\PgLaraenquery\App\Model\FieldValue;
use Xolens\PgLarautil\App\Repository\AbstractWritableRepository;
use Illuminate\Validation\Rule;
use PgLaraenqueryCreateTableFieldValue;

class FieldValueRepository extends AbstractWritableRepository implements FieldValueRepositoryContract
{
    public function model(){
        return FieldValue::class;
    }
    /*
    public function validationRules(array $data){
        $id = self::get($data,'id');
        $sectionFieldId = self::get($data,'section_field_id');
        return [
            'id' => ['required',Rule::unique(PgLaraenqueryCreateTableFieldValue::table())->where(function ($query) use($id, $sectionFieldId) {
                return $query->where('id','!=', $id)->where('section_field_id', $sectionFieldId);
            })],
        ];
    }
    //*/
    
}
