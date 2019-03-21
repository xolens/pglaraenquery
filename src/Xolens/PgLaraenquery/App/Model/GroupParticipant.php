<?php

namespace Xolens\PgLaraenquery\App\Model;
use Illuminate\Database\Eloquent\Model;

use PgLaraenqueryCreateTableGroupParticipant;


class GroupParticipant extends Model
{
    public const GROUP_PROPERTY = 'group_id';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'group_id', 
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table;
    
    function __construct(array $attributes = []) {
        $this->table = PgLaraenqueryCreateTableGroupParticipant::table();
        parent::__construct($attributes);
    }

    public function group(){
        return $this->belongsTo('Group','group_id');
    } 
}
