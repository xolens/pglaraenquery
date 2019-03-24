<?php

namespace Xolens\PgLaraenquiry\App\Util;

use Illuminate\Support\Facades\DB;

abstract class PgLaraenquiryMigration extends AbstractPgLaraenquiryMigration
{
    public static function tablePrefix(){
        return config('xolens-pglaraenquiry.pglaraenquiry-database_table_prefix');
    }

    public static function triggerPrefix(){
        return config('xolens-pglaraenquiry.pglaraenquiry-database_trigger_prefix');
    }

    public static function logEnabled(){
        return config('xolens-pglaraenquiry.pglaraenquiry-enable_database_log');
    }
}
