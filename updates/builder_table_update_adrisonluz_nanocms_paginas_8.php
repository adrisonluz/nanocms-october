<?php namespace AdrisonLuz\NanoCms\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAdrisonluzNanocmsPaginas8 extends Migration
{
    public function up()
    {
        Schema::table('adrisonluz_nanocms_paginas', function($table)
        {
            $table->integer('ordem')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('adrisonluz_nanocms_paginas', function($table)
        {
            $table->dropColumn('ordem');
        });
    }
}
