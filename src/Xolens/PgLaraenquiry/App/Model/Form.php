<?php

namespace Xolens\PgLaraenquiry\App\Model;
use Illuminate\Database\Eloquent\Model;

use PgLaraenquiryCreateTableForm;


class Form extends Model
{
    public const PRIMARY_SECTION_PROPERTY = 'primary_section_id';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'description', 'primary_section_id', 
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table;
    
    function __construct(array $attributes = []) {
        $this->table = PgLaraenquiryCreateTableForm::table();
        parent::__construct($attributes);
    }

    public function primarySection(){
        return $this->belongsTo('PrimarySection','primary_section_id');
    } 
}
