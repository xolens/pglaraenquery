<?php

namespace Xolens\PgLaraenquery\App\Repository;

use Xolens\PgLaraenquery\App\Model\Field;
use Xolens\PgLarautil\App\Repository\AbstractWritableRepository;
use Illuminate\Validation\Rule;
use PgLaraenqueryCreateTableField;

class FieldRepository extends AbstractWritableRepository implements FieldRepositoryContract
{
    public function model(){
        return Field::class;
    }
    /*
    public function validationRules(array $data){
        $id = self::get($data,'id');
        return [
            'id' => ['required',Rule::unique(PgLaraenqueryCreateTableField::table())->where(function ($query) use($id) {
                return $query->where('id','!=', $id);
            })],
        ];
    }
    //*/
    
}
