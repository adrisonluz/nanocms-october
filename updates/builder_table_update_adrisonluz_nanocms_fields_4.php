<?php namespace AdrisonLuz\NanoCms\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAdrisonluzNanocmsFields4 extends Migration
{
    public function up()
    {
        Schema::table('adrisonluz_nanocms_fields', function($table)
        {
            $table->integer('field_id')->nullable()->unsigned();
        });
    }
    
    public function down()
    {
        Schema::table('adrisonluz_nanocms_fields', function($table)
        {
            $table->dropColumn('field_id');
        });
    }
}
