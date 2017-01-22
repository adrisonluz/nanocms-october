<?php namespace AdrisonLuz\NanoCms\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateAdrisonluzNanocmsMenus extends Migration
{
    public function up()
    {
        Schema::create('adrisonluz_nanocms_menus', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('titulo');
            $table->string('tipo');
            $table->boolean('ativo');
            $table->dateTime('lixeira')->nullable();
            $table->integer('agent_id')->unsigned();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('adrisonluz_nanocms_menus');
    }
}
