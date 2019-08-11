<?php namespace AdrisonLuz\NanoCms\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAdrisonluzNanocmsForms2 extends Migration
{
    public function up()
    {
        Schema::table('adrisonluz_nanocms_forms', function($table)
        {
            $table->integer('ordem')->nullable()->change();
          	$table->text('resposta')->nullable(false)->unsigned(false)->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('adrisonluz_nanocms_forms', function($table)
        {
            $table->integer('ordem')->nullable(false)->change();
            $table->string('resposta', 255)->nullable(false)->unsigned(false)->default(null)->change();
        });
    }
}

