<?php

namespace Xolens\PgLaraenquiry\App\Model;
use Illuminate\Database\Eloquent\Model;

use PgLaraenquiryCreateTableParticipantEnquiry;


class ParticipantEnquiry extends Model
{
    public const PARTICIPANT_PROPERTY = 'participant_id';
    public const ENQUIRY_PROPERTY = 'enquiry_id';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'participant_id', 'enquiry_id', 'state', 'create_time', 'update_time', 'validation_time', 
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table;
    
    function __construct(array $attributes = []) {
        $this->table = PgLaraenquiryCreateTableParticipantEnquiry::table();
        parent::__construct($attributes);
    }

    public function participant(){
        return $this->belongsTo('Participant','participant_id');
    } 

    public function enquiry(){
        return $this->belongsTo('Enquiry','enquiry_id');
    } 
}
