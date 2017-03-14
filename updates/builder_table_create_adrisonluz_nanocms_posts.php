<?php namespace AdrisonLuz\NanoCms\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateAdrisonluzNanocmsPosts extends Migration
{
    public function up()
    {
        Schema::create('adrisonluz_nanocms_posts', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('categoria_id');
            $table->string('titulo');
            $table->text('conteudo')->nullable();
            $table->dateTime('data');
            $table->string('slug');
            $table->boolean('destaque');
            $table->integer('ordem');
            $table->boolean('ativo');
            $table->dateTime('lixeira')->nullable();
            $table->integer('agent_id')->unsigned();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('adrisonluz_nanocms_posts');
    }
}
