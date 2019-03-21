<?php

use Illuminate\Support\Facades\DB;
use Xolens\PgLaraenquery\App\Util\PgLaraenqueryMigration;

class PgLaraenqueryCreateViewEnquiry extends PgLaraenqueryMigration
{
    /**
     * Return table name
     *
     * @return string
     */
    public static function tableName(){
        return 'enquiry_view';
    }    

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $mainTable = PgLaraenqueryCreateTableEnquiry::table();
        $groupTable = PgLaraenqueryCreateTableGroup::table();
        $formTable = PgLaraenqueryCreateTableForm::table();
        DB::statement("
            CREATE VIEW ".self::table()." AS(
                SELECT 
                    ".$mainTable.".*,
                    ".$groupTable.".name as group_name,
                    ".$formTable.".name as form_name
                FROM ".$mainTable." 
                    LEFT JOIN ".$groupTable." ON ".$groupTable.".id = ".$mainTable.".group_id
                    LEFT JOIN ".$formTable." ON ".$formTable.".id = ".$mainTable.".form_id
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

