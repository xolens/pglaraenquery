<?php

namespace Xolens\PgLaraenquery\App\Repository;

use Xolens\PgLaraenquery\App\Model\Section;
use Xolens\PgLarautil\App\Repository\AbstractWritableRepository;
use Illuminate\Validation\Rule;
use PgLaraenqueryCreateTableSection;

class SectionRepository extends AbstractWritableRepository implements SectionRepositoryContract
{
    public function model(){
        return Section::class;
    }
    /*
    public function validationRules(array $data){
        $id = self::get($data,'id');
        return [
            'id' => ['required',Rule::unique(PgLaraenqueryCreateTableSection::table())->where(function ($query) use($id) {
                return $query->where('id','!=', $id);
            })],
        ];
    }
    //*/
    
}
