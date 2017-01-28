<?php namespace AdrisonLuz\NanoCms\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAdrisonluzNanocmsPaginas extends Migration
{
    public function up()
    {
        Schema::table('adrisonluz_nanocms_paginas', function($table)
        {
            $table->increments('id')->unsigned(false)->change();
            $table->integer('agent_id')->unsigned()->change();
        });
    }
    
    public function down()
    {
        Schema::table('adrisonluz_nanocms_paginas', function($table)
        {
            $table->increments('id')->unsigned()->change();
            $table->integer('agent_id')->unsigned(false)->change();
        });
    }
}