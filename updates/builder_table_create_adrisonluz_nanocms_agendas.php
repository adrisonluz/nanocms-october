<?php namespace AdrisonLuz\NanoCms\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateAdrisonluzNanocmsAgendas extends Migration
{
    public function up()
    {
        Schema::create('adrisonluz_nanocms_agendas', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->text('conteudo')->nullable();
            $table->dateTime('data_ini')->nullable();
            $table->dateTime('data_fim')->nullable();
            $table->string('titulo');
            $table->string('slug');
            $table->boolean('ativo');
            $table->dateTime('lixeira');
            //$table->integer('agent_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('adrisonluz_nanocms_agendas');
    }
}

