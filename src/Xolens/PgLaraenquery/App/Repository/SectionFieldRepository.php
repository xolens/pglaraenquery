<?php

namespace Xolens\PgLaraenquery\App\Repository;

use Xolens\PgLaraenquery\App\Model\SectionField;
use Xolens\PgLarautil\App\Repository\AbstractWritableRepository;
use Illuminate\Validation\Rule;
use PgLaraenqueryCreateTableSectionField;

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
            'id' => ['required',Rule::unique(PgLaraenqueryCreateTableSectionField::table())->where(function ($query) use($id, $fieldId, $sectionId) {
                return $query->where('id','!=', $id)->where('field_id', $fieldId)->where('section_id', $sectionId);
            })],
        ];
    }
    //*/
    
}
