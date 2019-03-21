<?php

namespace Xolens\PgLaraenquery\App\Repository;

use Xolens\PgLaraenquery\App\Model\FormSection;
use Xolens\PgLarautil\App\Repository\AbstractWritableRepository;
use Illuminate\Validation\Rule;
use PgLaraenqueryCreateTableFormSection;

class FormSectionRepository extends AbstractWritableRepository implements FormSectionRepositoryContract
{
    public function model(){
        return FormSection::class;
    }
    /*
    public function validationRules(array $data){
        $id = self::get($data,'id');
        $sectionId = self::get($data,'section_id');
        $formId = self::get($data,'form_id');
        return [
            'id' => ['required',Rule::unique(PgLaraenqueryCreateTableFormSection::table())->where(function ($query) use($id, $sectionId, $formId) {
                return $query->where('id','!=', $id)->where('section_id', $sectionId)->where('form_id', $formId);
            })],
        ];
    }
    //*/
    
}
