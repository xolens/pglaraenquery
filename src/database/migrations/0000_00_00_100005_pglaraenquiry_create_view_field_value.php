<?php

use Illuminate\Support\Facades\DB;
use Xolens\PgLaraenquiry\App\Util\PgLaraenquiryMigration;

class PgLaraenquiryCreateViewFieldValue extends PgLaraenquiryMigration
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
        $mainTable = PgLaraenquiryCreateTableFieldValue::table();
        $enquiryTable = PgLaraenquiryCreateTableEnquiry::table();
        $sectionFieldTable = PgLaraenquiryCreateTableSectionField::table();
        DB::statement("
            CREATE VIEW ".self::table()." AS(
                SELECT 
                    ".$mainTable.".*,
                    ".$enquiryTable.".name as enquiry_name,
                    ".$enquiryTable.".title as enquiry_title
                FROM ".$mainTable." 
                    LEFT JOIN ".$enquiryTable." ON ".$enquiryTable.".id = ".$mainTable.".enquiry_id
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

