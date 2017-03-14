<?php namespace AdrisonLuz\NanoCms\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateAdrisonluzNanocmsCategorias extends Migration
{
    public function up()
    {
        Schema::create('adrisonluz_nanocms_categorias', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('categoriapai_id')->nullable()->unsigned();
            $table->string('titulo');
            $table->text('conteudo')->nullable();
            $table->string('slug');
            $table->integer('ordem');
            $table->boolean('ativo');
            $table->dateTime('lixeira');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('adrisonluz_nanocms_categorias');
    }
}
