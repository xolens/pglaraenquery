<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;

use Xolens\PgLaraenquiry\App\Util\PgLaraenquiryMigration;

class PgLaraenquiryCreateTableParticipantEnquiry extends PgLaraenquiryMigration
{
    /**
     * Return table name
     *
     * @return string
     */
    public static function tableName(){
        return 'participant_enquiry';
    }    

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::table(), function (Blueprint $table) {
            $table->increments('id');
            $table->integer('participant_id')->index();
            $table->integer('enquiry_id')->index();
            $table->enum('state',['CREATED', 'UPDATED', 'VALIDATED'])->nullable();
            $table->timestamp('create_time');
            $table->timestamp('update_time')->nullable();
            $table->timestamp('validation_time')->nullable();
        });
        if(self::logEnabled()){
            self::registerForLog();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(self::logEnabled()){
            self::unregisterFromLog();
        }
        Schema::dropIfExists(self::table());

    }
}
