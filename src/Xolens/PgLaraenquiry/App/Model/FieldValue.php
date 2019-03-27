<?php

namespace Xolens\PgLaraenquiry\App\Model;
use Illuminate\Database\Eloquent\Model;

use PgLaraenquiryCreateTableFieldValue;


class FieldValue extends Model
{
    public const SECTION_FIELD_PROPERTY = 'section_field_id';
    public const ENQUIRY_PROPERTY = 'enquiry_id';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'section_field_id', 'enquiry_id', 'value', 
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table;
    
    function __construct(array $attributes = []) {
        $this->table = PgLaraenquiryCreateTableFieldValue::table();
        parent::__construct($attributes);
    }

    public function sectionField(){
        return $this->belongsTo('SectionField','section_field_id');
    } 

    public function enquiry(){
        return $this->belongsTo('Enquiry','enquiry_id');
    } 
}
