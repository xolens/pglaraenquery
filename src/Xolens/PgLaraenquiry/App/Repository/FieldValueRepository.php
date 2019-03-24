<?php

namespace Xolens\PgLaraenquiry\App\Repository;

use Xolens\PgLaraenquiry\App\Model\FieldValue;
use Xolens\PgLarautil\App\Repository\AbstractWritableRepository;
use Illuminate\Validation\Rule;
use PgLaraenquiryCreateTableFieldValue;

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
            'id' => ['required',Rule::unique(PgLaraenquiryCreateTableFieldValue::table())->where(function ($query) use($id, $sectionFieldId) {
                return $query->where('id','!=', $id)->where('section_field_id', $sectionFieldId);
            })],
        ];
    }
    //*/
    
}
