<?php

namespace Xolens\PgLaraenquery\App\Model;
use Illuminate\Database\Eloquent\Model;

use PgLaraenqueryCreateTableTableField;


class TableField extends Model
{
    public const FIELD_PROPERTY = 'field_id';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'max_records', 'description', 'field_id', 
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table;
    
    function __construct(array $attributes = []) {
        $this->table = PgLaraenqueryCreateTableTableField::table();
        parent::__construct($attributes);
    }

    public function field(){
        return $this->belongsTo('Field','field_id');
    } 
}
