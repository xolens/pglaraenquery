<?php

namespace Xolens\PgLaraenquiry\App\Repository;

use Xolens\PgLaraenquiry\App\Model\SectionField;
use Xolens\PgLarautil\App\Repository\AbstractWritableRepository;
use Illuminate\Validation\Rule;
use PgLaraenquiryCreateTableSectionField;

class SectionFieldRepository extends AbstractWritableRepository implements SectionFieldRepositoryContract
{
    public function model(){
        return SectionField::class;
    }
    /*
    public function validationRules(array $data){
        $id = self::get($data,'id');
        $fieldId = self::get($data,'field_id');
        $sectionId = self::get($data,'section_id');
        return [
            'id' => ['required',Rule::unique(PgLaraenquiryCreateTableSectionField::table())->where(function ($query) use($id, $fieldId, $sectionId) {
                return $query->where('id','!=', $id)->where('field_id', $fieldId)->where('section_id', $sectionId);
            })],
        ];
    }
    //*/
    
}
