<?php

namespace Xolens\PgLaraenquiry\App\Repository;

use Xolens\PgLaraenquiry\App\Model\Participant;
use Xolens\PgLarautil\App\Repository\AbstractWritableRepository;
use Illuminate\Validation\Rule;
use PgLaraenquiryCreateTableParticipant;

class ParticipantRepository extends AbstractWritableRepository implements ParticipantRepositoryContract
{
    public function model(){
        return Participant::class;
    }
    /*
    public function validationRules(array $data){
        $id = self::get($data,'id');
        return [
            'id' => ['required',Rule::unique(PgLaraenquiryCreateTableParticipant::table())->where(function ($query) use($id) {
                return $query->where('id','!=', $id);
            })],
        ];
    }
    //*/
    
}
