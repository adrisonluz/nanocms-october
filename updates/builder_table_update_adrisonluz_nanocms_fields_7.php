<?php namespace AdrisonLuz\NanoCms\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAdrisonluzNanocmsFields7 extends Migration
{
    public function up()
    {
        Schema::table('adrisonluz_nanocms_fields', function($table)
        {
            $table->string('conditional')->nullable();
            $table->integer('agent_id')->default(null)->change();
            $table->integer('field_id')->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('adrisonluz_nanocms_fields', function($table)
        {
            $table->dropColumn('conditional');
            $table->integer('agent_id')->default(NULL)->change();
            $table->integer('field_id')->default(NULL)->change();
        });
    }
}
