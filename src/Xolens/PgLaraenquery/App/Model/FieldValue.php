<?php

namespace Xolens\PgLaraenquery\App\Model;
use Illuminate\Database\Eloquent\Model;

use PgLaraenqueryCreateTableFieldValue;


class FieldValue extends Model
{
    public const SECTION_FIELD_PROPERTY = 'section_field_id';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'section_field_id', 
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table;
    
    function __construct(array $attributes = []) {
        $this->table = PgLaraenqueryCreateTableFieldValue::table();
        parent::__construct($attributes);
    }

    public function sectionField(){
        return $this->belongsTo('SectionField','section_field_id');
    } 
}
