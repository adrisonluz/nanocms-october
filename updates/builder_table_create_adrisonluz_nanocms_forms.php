<?php namespace AdrisonLuz\NanoCms\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateAdrisonluzNanocmsForms extends Migration
{
    public function up()
    {
        Schema::create('adrisonluz_nanocms_forms', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('pagina_id')->unsigned();
            $table->string('titulo');
            $table->string('classe')->nullable();
            $table->string('origem')->nullable();
            $table->string('tipo');
            $table->integer('ordem');
            $table->string('envio_email');
            $table->string('resposta');
            $table->boolean('ativo');
            $table->dateTime('lixeira')->nullable();
            $table->integer('agent_id')->unsigned();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('adrisonluz_nanocms_forms');
    }
}
