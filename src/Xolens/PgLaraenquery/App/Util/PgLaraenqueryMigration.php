<?php

namespace Xolens\PgLaraenquery\App\Util;

use Illuminate\Support\Facades\DB;

abstract class PgLaraenqueryMigration extends AbstractPgLaraenqueryMigration
{
    public static function tablePrefix(){
        return config('xolens-pglaraenquery.pglaraenquery-database_table_prefix');
    }

    public static function triggerPrefix(){
        return config('xolens-pglaraenquery.pglaraenquery-database_trigger_prefix');
    }

    public static function logEnabled(){
        return config('xolens-pglaraenquery.pglaraenquery-enable_database_log');
    }
}
