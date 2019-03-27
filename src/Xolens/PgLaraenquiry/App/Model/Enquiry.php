<?php

namespace Xolens\PgLaraenquiry\App\Model;
use Illuminate\Database\Eloquent\Model;

use PgLaraenquiryCreateTableEnquiry;


class Enquiry extends Model
{
    public const FORM_PROPERTY = 'form_id';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'title', 'description', 'form_id', 
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table;
    
    function __construct(array $attributes = []) {
        $this->table = PgLaraenquiryCreateTableEnquiry::table();
        parent::__construct($attributes);
    }

    public function form(){
        return $this->belongsTo('Form','form_id');
    } 
}
