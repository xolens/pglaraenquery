<?php

use Illuminate\Support\Facades\DB;
use Xolens\PgLaraenquery\App\Util\PgLaraenqueryMigration;

class PgLaraenqueryCreateViewParticipantEnquiry extends PgLaraenqueryMigration
{
    /**
     * Return table name
     *
     * @return string
     */
    public static function tableName(){
        return 'participant_enquiry_view';
    }    

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $mainTable = PgLaraenqueryCreateTableParticipantEnquiry::table();
        $participantTable = PgLaraenqueryCreateTableParticipant::table();
        $enquiryTable = PgLaraenqueryCreateTableEnquiry::table();
        DB::statement("
            CREATE VIEW ".self::table()." AS(
                SELECT 
                    ".$mainTable.".*,
                    ".$participantTable.".name as participant_name,
                    ".$enquiryTable.".name as enquiry_name,
                    ".$enquiryTable.".title as enquiry_title
                FROM ".$mainTable." 
                    LEFT JOIN ".$participantTable." ON ".$participantTable.".id = ".$mainTable.".participant_id
                    LEFT JOIN ".$enquiryTable." ON ".$enquiryTable.".id = ".$mainTable.".enquiry_id
            )
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS ".self::table());
    }
}

