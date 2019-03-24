<?php

use Illuminate\Support\Facades\DB;
use Xolens\PgLaraenquiry\App\Util\PgLaraenquiryMigration;

class PgLaraenquiryCreateViewFormSection extends PgLaraenquiryMigration
{
    /**
     * Return table name
     *
     * @return string
     */
    public static function tableName(){
        return 'form_section_view';
    }    

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $mainTable = PgLaraenquiryCreateTableFormSection::table();
        $formTable = PgLaraenquiryCreateTableForm::table();
        $sectionTable = PgLaraenquiryCreateTableSection::table();
        DB::statement("
            CREATE VIEW ".self::table()." AS(
                SELECT 
                    ".$mainTable.".*,
                    ".$formTable.".name as form_name,
                    ".$sectionTable.".name as section_name
                FROM ".$mainTable." 
                    LEFT JOIN ".$formTable." ON ".$formTable.".id = ".$mainTable.".form_id
                    LEFT JOIN ".$sectionTable." ON ".$sectionTable.".id = ".$mainTable.".section_id
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

