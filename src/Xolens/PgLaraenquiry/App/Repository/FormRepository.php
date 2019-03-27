<?php

namespace Xolens\PgLaraenquiry\App\Repository;

use Xolens\PgLaraenquiry\App\Model\Form;
use Xolens\PgLarautil\App\Repository\AbstractWritableRepository;
use Illuminate\Validation\Rule;
use PgLaraenquiryCreateTableForm;

class FormRepository extends AbstractWritableRepository implements FormRepositoryContract
{
    public function model(){
        return Form::class;
    }
    /*
    public function validationRules(array $data){
        $id = self::get($data,'id');
        $primarySectionId = self::get($data,'primary_section_id');
        return [
            'id' => ['required',Rule::unique(PgLaraenquiryCreateTableForm::table())->where(function ($query) use($id, $primarySectionId) {
                return $query->where('id','!=', $id)->where('primary_section_id', $primarySectionId);
            })],
        ];
    }
    //*/
    
}
