<?php

namespace Xolens\PgLaraenquiry\App\Model\View;
use Illuminate\Database\Eloquent\Model;

use PgLaraenquiryCreateViewFieldValue;



class FieldValueView extends Model
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table;
    
    function __construct(array $attributes = []) {
        $this->table = PgLaraenquiryCreateViewFieldValue::table();
        parent::__construct($attributes);
    }
}

