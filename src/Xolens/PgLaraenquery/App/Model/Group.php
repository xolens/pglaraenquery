<?php

namespace Xolens\PgLaraenquery\App\Model;
use Illuminate\Database\Eloquent\Model;

use PgLaraenqueryCreateTableGroup;


class Group extends Model
{

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'description', 
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table;
    
    function __construct(array $attributes = []) {
        $this->table = PgLaraenqueryCreateTableGroup::table();
        parent::__construct($attributes);
    }
}
