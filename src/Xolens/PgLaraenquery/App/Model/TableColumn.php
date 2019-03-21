<?php

namespace Xolens\PgLaraenquery\App\Model;
use Illuminate\Database\Eloquent\Model;

use PgLaraenqueryCreateTableTableColumn;


class TableColumn extends Model
{
    public const TABLE_FIELD_PROPERTY = 'table_field_id';
    public const FIELD_PROPERTY = 'field_id';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'position', 'table_field_id', 'field_id', 
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table;
    
    function __construct(array $attributes = []) {
        $this->table = PgLaraenqueryCreateTableTableColumn::table();
        parent::__construct($attributes);
    }

    public function tableField(){
        return $this->belongsTo('TableField','table_field_id');
    } 

    public function field(){
        return $this->belongsTo('Field','field_id');
    } 
}
