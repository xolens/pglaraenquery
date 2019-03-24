<?php

namespace Xolens\PgLaraenquiry\App\Repository;

use Xolens\PgLaraenquiry\App\Model\ParticipantEnquiry;
use Xolens\PgLarautil\App\Repository\AbstractWritableRepository;
use Illuminate\Validation\Rule;
use PgLaraenquiryCreateTableParticipantEnquiry;

class ParticipantEnquiryRepository extends AbstractWritableRepository implements ParticipantEnquiryRepositoryContract
{
    public function model(){
        return ParticipantEnquiry::class;
    }
    /*
    public function validationRules(array $data){
        $id = self::get($data,'id');
        $participantId = self::get($data,'participant_id');
        $enquiryId = self::get($data,'enquiry_id');
        return [
            'id' => ['required',Rule::unique(PgLaraenquiryCreateTableParticipantEnquiry::table())->where(function ($query) use($id, $participantId, $enquiryId) {
                return $query->where('id','!=', $id)->where('participant_id', $participantId)->where('enquiry_id', $enquiryId);
            })],
        ];
    }
    //*/
    
}
