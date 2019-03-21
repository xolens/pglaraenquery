<?php

use Illuminate\Support\Facades\DB;
use Xolens\PgLaraenquery\App\Util\PgLaraenqueryMigration;

class PgLaraenqueryCreateViewFieldValue extends PgLaraenqueryMigration
{
    /**
     * Return table name
     *
     * @return string
     */
    public static function tableName(){
        return 'field_value_view';
    }    

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $mainTable = PgLaraenqueryCreateTableFieldValue::table();
        $sectionFieldTable = PgLaraenqueryCreateTableSectionField::table();
        DB::statement("
            CREATE VIEW ".self::table()." AS(
                SELECT 
                    ".$mainTable.".*
                FROM ".$mainTable." 
                    LEFT JOIN ".$sectionFieldTable." ON ".$sectionFieldTable.".id = ".$mainTable.".section_field_id
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

