<?php

namespace Xolens\PgLaraenquery\App\Repository;

use Xolens\PgLaraenquery\App\Model\GroupParticipant;
use Xolens\PgLarautil\App\Repository\AbstractWritableRepository;
use Illuminate\Validation\Rule;
use PgLaraenqueryCreateTableGroupParticipant;

class GroupParticipantRepository extends AbstractWritableRepository implements GroupParticipantRepositoryContract
{
    public function model(){
        return GroupParticipant::class;
    }
    /*
    public function validationRules(array $data){
        $id = self::get($data,'id');
        $groupId = self::get($data,'group_id');
        return [
            'id' => ['required',Rule::unique(PgLaraenqueryCreateTableGroupParticipant::table())->where(function ($query) use($id, $groupId) {
                return $query->where('id','!=', $id)->where('group_id', $groupId);
            })],
        ];
    }
    //*/
    
}
