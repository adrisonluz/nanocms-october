<?php namespace AdrisonLuz\NanoCms\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAdrisonluzNanocmsForms5 extends Migration
{
    public function up()
    {
        Schema::table('adrisonluz_nanocms_forms', function($table)
        {
            $table->string('callback')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('adrisonluz_nanocms_forms', function($table)
        {
            $table->dropColumn('callback');
        });
    }
}

