<?php

namespace Xolens\PgLaraenquiry\App\Model;
use Illuminate\Database\Eloquent\Model;

use PgLaraenquiryCreateTableFormSection;


class FormSection extends Model
{
    public const SECTION_PROPERTY = 'section_id';
    public const FORM_PROPERTY = 'form_id';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'position', 'section_id', 'form_id', 
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table;
    
    function __construct(array $attributes = []) {
        $this->table = PgLaraenquiryCreateTableFormSection::table();
        parent::__construct($attributes);
    }

    public function section(){
        return $this->belongsTo('Section','section_id');
    } 

    public function form(){
        return $this->belongsTo('Form','form_id');
    } 
}
