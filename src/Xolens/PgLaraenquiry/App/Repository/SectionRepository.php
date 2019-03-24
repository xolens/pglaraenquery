<?php

namespace Xolens\PgLaraenquiry\App\Repository;

use Xolens\PgLaraenquiry\App\Model\Section;
use Xolens\PgLarautil\App\Repository\AbstractWritableRepository;
use Illuminate\Validation\Rule;
use PgLaraenquiryCreateTableSection;

class SectionRepository extends AbstractWritableRepository implements SectionRepositoryContract
{
    public function model(){
        return Section::class;
    }
    /*
    public function validationRules(array $data){
        $id = self::get($data,'id');
        return [
            'id' => ['required',Rule::unique(PgLaraenquiryCreateTableSection::table())->where(function ($query) use($id) {
                return $query->where('id','!=', $id);
            })],
        ];
    }
    //*/
    
}
