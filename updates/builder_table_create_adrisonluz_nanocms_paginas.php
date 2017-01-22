<?php namespace AdrisonLuz\NanoCms\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateAdrisonluzNanocmsPaginas extends Migration
{
    public function up()
    {
        Schema::create('adrisonluz_nanocms_paginas', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('titulo');
            $table->text('conteudo')->nullable();
            $table->text('resumo')->nullable();
            $table->string('slug');
            $table->boolean('ativo');
            $table->dateTime('lixeira');
            $table->integer('agent_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('adrisonluz_nanocms_paginas');
    }
}
