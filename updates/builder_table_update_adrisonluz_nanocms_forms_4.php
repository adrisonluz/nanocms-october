<?php namespace AdrisonLuz\NanoCms\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAdrisonluzNanocmsForms4 extends Migration
{
    public function up()
    {
        Schema::table('adrisonluz_nanocms_forms', function($table)
        {
            $table->dropColumn('fields');
        });
    }
    
    public function down()
    {
        Schema::table('adrisonluz_nanocms_forms', function($table)
        {
            $table->string('fields', 255);
        });
    }
}
