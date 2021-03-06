<?php namespace AdrisonLuz\NanoCms\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAdrisonluzNanocmsCategorias extends Migration
{
    public function up()
    {
        Schema::table('adrisonluz_nanocms_categorias', function($table)
        {
            $table->increments('id')->unsigned(false)->change();
            $table->dateTime('lixeira')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('adrisonluz_nanocms_categorias', function($table)
        {
            $table->increments('id')->unsigned()->change();
            $table->dateTime('lixeira')->nullable(false)->change();
        });
    }
}

