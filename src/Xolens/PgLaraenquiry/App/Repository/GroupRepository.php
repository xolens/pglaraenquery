<?php

namespace Xolens\PgLaraenquiry\App\Repository;

use Xolens\PgLaraenquiry\App\Model\Group;
use Xolens\PgLarautil\App\Repository\AbstractWritableRepository;
use Illuminate\Validation\Rule;
use PgLaraenquiryCreateTableGroup;

class GroupRepository extends AbstractWritableRepository implements GroupRepositoryContract
{
    public function model(){
        return Group::class;
    }
    /*
    public function validationRules(array $data){
        $id = self::get($data,'id');
        return [
            'id' => ['required',Rule::unique(PgLaraenquiryCreateTableGroup::table())->where(function ($query) use($id) {
                return $query->where('id','!=', $id);
            })],
        ];
    }
    //*/
    
}
