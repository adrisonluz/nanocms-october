<?php namespace AdrisonLuz\NanoCms\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAdrisonluzNanocmsFields extends Migration
{
    public function up()
    {
        Schema::table('adrisonluz_nanocms_fields', function($table)
        {
            $table->dropColumn('form_id');
        });
    }
    
    public function down()
    {
        Schema::table('adrisonluz_nanocms_fields', function($table)
        {
            $table->integer('form_id')->unsigned();
        });
    }
}
