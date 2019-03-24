<?php

use Illuminate\Support\Facades\DB;
use Xolens\PgLaraenquiry\App\Util\PgLaraenquiryMigration;

class PgLaraenquiryCreateViewTableColumn extends PgLaraenquiryMigration
{
    /**
     * Return table name
     *
     * @return string
     */
    public static function tableName(){
        return 'table_column_view';
    }    

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $mainTable = PgLaraenquiryCreateTableTableColumn::table();
        $fieldTable = PgLaraenquiryCreateTableField::table();
        $tableFieldTable = PgLaraenquiryCreateTableTableField::table();
        DB::statement("
            CREATE VIEW ".self::table()." AS(
                SELECT 
                    ".$mainTable.".*,
                    ".$fieldTable.".name as field_name,
                    ".$tableFieldTable.".name as table_field_name
                FROM ".$mainTable." 
                    LEFT JOIN ".$fieldTable." ON ".$fieldTable.".id = ".$mainTable.".field_id
                    LEFT JOIN ".$tableFieldTable." ON ".$tableFieldTable.".id = ".$mainTable.".table_field_id
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

