<?php namespace AdrisonLuz\NanoCms\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAdrisonluzNanocmsFields9 extends Migration
{
    public function up()
    {
        Schema::table('adrisonluz_nanocms_fields', function($table)
        {
            $table->dateTime('lixeira')->default(null)->change();
            $table->integer('field_id')->default(null)->change();
            $table->dropColumn('conditional');
        });
    }
    
    public function down()
    {
        Schema::table('adrisonluz_nanocms_fields', function($table)
        {
            $table->dateTime('lixeira')->default('NULL')->change();
            $table->integer('field_id')->default(NULL)->change();
            $table->text('conditional')->nullable()->default('NULL');
        });
    }
}

