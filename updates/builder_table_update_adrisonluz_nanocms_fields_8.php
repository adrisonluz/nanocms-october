<?php namespace AdrisonLuz\NanoCms\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAdrisonluzNanocmsFields8 extends Migration
{
    public function up()
    {
        Schema::table('adrisonluz_nanocms_fields', function($table)
        {
            $table->integer('agent_id')->default(null)->change();
            $table->integer('field_id')->default(null)->change();
            $table->text('conditional')->nullable()->unsigned(false)->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('adrisonluz_nanocms_fields', function($table)
        {
            $table->integer('agent_id')->default(NULL)->change();
            $table->integer('field_id')->default(NULL)->change();
            $table->string('conditional', 255)->nullable()->unsigned(false)->default('NULL')->change();
        });
    }
}
