<?php namespace AdrisonLuz\NanoCms\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateAdrisonluzNanocmsGalerias extends Migration
{
    public function up()
    {
        Schema::create('adrisonluz_nanocms_galerias', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('pagina_id')->unsigned();
            $table->integer('post_id')->unsigned();
            $table->string('titulo');
            $table->string('tipo');
            $table->boolean('ativo');
            $table->dateTime('lixeira')->nullable();
            $table->integer('agent_id')->unsigned();
            $table->string('slug');
            $table->text('conteudo')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('adrisonluz_nanocms_galerias');
    }
}
