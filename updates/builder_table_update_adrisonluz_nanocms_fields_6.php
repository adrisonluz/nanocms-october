<?php namespace AdrisonLuz\NanoCms\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAdrisonluzNanocmsFields6 extends Migration
{
    public function up()
    {
        Schema::table('adrisonluz_nanocms_fields', function($table)
        {
            $table->integer('field_id')->default(null)->change();
            $table->dropColumn('input_id');
        });
    }
    
    public function down()
    {
        Schema::table('adrisonluz_nanocms_fields', function($table)
        {
            $table->integer('field_id')->default(NULL)->change();
            $table->integer('input_id')->nullable()->default(NULL);
        });
    }
}

