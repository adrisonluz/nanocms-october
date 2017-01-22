<?php namespace AdrisonLuz\NanoCms\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateAdrisonluzNanocmsBlocos extends Migration
{
    public function up()
    {
        Schema::create('adrisonluz_nanocms_blocos', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('titulo');
            $table->text('conteudo')->nullable();
            $table->string('posicao')->nullable();
            $table->boolean('ativo');
            $table->dateTime('lixeira');
            $table->integer('agent_id')->unsigned();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('adrisonluz_nanocms_blocos');
    }
}
