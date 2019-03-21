<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;

use Xolens\PgLaraenquery\App\Util\PgLaraenqueryMigration;

class PgLaraenqueryCreateTableField extends PgLaraenqueryMigration
{
    /**
     * Return table name
     *
     * @return string
     */
    public static function tableName(){
        return 'field';
    }    

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::table(), function (Blueprint $table) {
            $table->increments('id');
            $table->enum('type',['CHECKBOX', 'COMBOBOX', 'DATEPICKER', 'NUMBERFIELD', 'RADIOGROUP', 'SPINNER', 'TABLE', 'TEXTFIELD', 'TEXTAREA', 'TIMEFIELD']);
            $table->string('name');
            $table->string('display_text');
            $table->boolean('required');
            $table->json('value_list')->nullable();
            $table->string('description')->nullable();
        });
        if(self::logEnabled()){
            self::registerForLog();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(self::logEnabled()){
            self::unregisterFromLog();
        }
        Schema::dropIfExists(self::table());

    }
}
