<?php

namespace Xolens\PgLaraenquiry\App\Repository;

use Xolens\PgLaraenquiry\App\Model\Enquiry;
use Xolens\PgLarautil\App\Repository\AbstractWritableRepository;
use Illuminate\Validation\Rule;
use PgLaraenquiryCreateTableEnquiry;

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
            'id' => ['required',Rule::unique(PgLaraenquiryCreateTableEnquiry::table())->where(function ($query) use($id, $groupId, $formId) {
                return $query->where('id','!=', $id)->where('group_id', $groupId)->where('form_id', $formId);
            })],
        ];
    }
    //*/
    
}
