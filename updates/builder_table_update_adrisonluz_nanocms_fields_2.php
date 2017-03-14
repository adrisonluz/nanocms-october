<?php namespace AdrisonLuz\NanoCms\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAdrisonluzNanocmsFields2 extends Migration
{
    public function up()
    {
        Schema::table('adrisonluz_nanocms_fields', function($table)
        {
            $table->string('label', 255);
        });
    }
    
    public function down()
    {
        Schema::table('adrisonluz_nanocms_fields', function($table)
        {
            $table->dropColumn('label');
        });
    }
}
