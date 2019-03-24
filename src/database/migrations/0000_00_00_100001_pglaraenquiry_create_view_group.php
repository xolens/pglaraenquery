<?php

use Illuminate\Support\Facades\DB;
use Xolens\PgLaraenquiry\App\Util\PgLaraenquiryMigration;

class PgLaraenquiryCreateViewGroup extends PgLaraenquiryMigration
{
    /**
     * Return table name
     *
     * @return string
     */
    public static function tableName(){
        return 'group_view';
    }    

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $mainTable = PgLaraenquiryCreateTableGroup::table();
        DB::statement("
            CREATE VIEW ".self::table()." AS(
                SELECT 
                    ".$mainTable.".*
                FROM ".$mainTable." 
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

