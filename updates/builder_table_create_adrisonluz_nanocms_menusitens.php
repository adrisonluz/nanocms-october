<?php namespace AdrisonLuz\NanoCms\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateAdrisonluzNanocmsMenusitens extends Migration
{
    public function up()
    {
        Schema::create('adrisonluz_nanocms_menusitens', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('menu_id')->unsigned();
            $table->integer('menupai_id')->nullable()->unsigned();
            $table->string('titulo');
            $table->string('link')->nullable();
            $table->integer('pagina_id')->nullable()->unsigned();
            $table->boolean('ativo');
            $table->dateTime('lixeira')->nullable();
            $table->integer('agent_id')->unsigned();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('adrisonluz_nanocms_menusitens');
    }
}
