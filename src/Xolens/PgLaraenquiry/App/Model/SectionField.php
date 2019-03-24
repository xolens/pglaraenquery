<?php

namespace Xolens\PgLaraenquiry\App\Model;
use Illuminate\Database\Eloquent\Model;

use PgLaraenquiryCreateTableSectionField;


class SectionField extends Model
{
    public const FIELD_PROPERTY = 'field_id';
    public const SECTION_PROPERTY = 'section_id';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'position', 'field_id', 'section_id', 
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table;
    
    function __construct(array $attributes = []) {
        $this->table = PgLaraenquiryCreateTableSectionField::table();
        parent::__construct($attributes);
    }

    public function field(){
        return $this->belongsTo('Field','field_id');
    } 

    public function section(){
        return $this->belongsTo('Section','section_id');
    } 
}
