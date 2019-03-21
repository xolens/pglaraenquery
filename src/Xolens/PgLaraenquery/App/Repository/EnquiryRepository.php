<?php

namespace Xolens\PgLaraenquery\App\Repository;

use Xolens\PgLaraenquery\App\Model\Enquiry;
use Xolens\PgLarautil\App\Repository\AbstractWritableRepository;
use Illuminate\Validation\Rule;
use PgLaraenqueryCreateTableEnquiry;

class EnquiryRepository extends AbstractWritableRepository implements EnquiryRepositoryContract
{
    public function model(){
        return Enquiry::class;
    }
    /*
    public function validationRules(array $data){
        $id = self::get($data,'id');
        $groupId = self::get($data,'group_id');
        $formId = self::get($data,'form_id');
        return [
            'id' => ['required',Rule::unique(PgLaraenqueryCreateTableEnquiry::table())->where(function ($query) use($id, $groupId, $formId) {
                return $query->where('id','!=', $id)->where('group_id', $groupId)->where('form_id', $formId);
            })],
        ];
    }
    //*/
    
}
