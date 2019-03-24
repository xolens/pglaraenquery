<?php

use Illuminate\Support\Facades\DB;
use Xolens\PgLaraenquiry\App\Util\PgLaraenquiryMigration;

class PgLaraenquiryCreateViewGroupParticipant extends PgLaraenquiryMigration
{
    /**
     * Return table name
     *
     * @return string
     */
    public static function tableName(){
        return 'group_participant_view';
    }    

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $mainTable = PgLaraenquiryCreateTableGroupParticipant::table();
        $groupTable = PgLaraenquiryCreateTableGroup::table();
        DB::statement("
            CREATE VIEW ".self::table()." AS(
                SELECT 
                    ".$mainTable.".*,
                    ".$groupTable.".name as group_name
                FROM ".$mainTable." 
                    LEFT JOIN ".$groupTable." ON ".$groupTable.".id = ".$mainTable.".group_id
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

