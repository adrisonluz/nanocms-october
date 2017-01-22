<?php namespace AdrisonLuz\NanoCms\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateAdrisonluzNanocmsBanners extends Migration
{
    public function up()
    {
        Schema::create('adrisonluz_nanocms_banners', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('tipo');
            $table->integer('pagina_id')->unsigned();
            $table->string('titulo');
            $table->text('conteudo');
            $table->string('video');
            $table->dateTime('data_ini');
            $table->dateTime('data_fim');
            $table->string('link');
            $table->integer('ordem');
            $table->boolean('ativo');
            $table->dateTime('lixeira');
            $table->integer('agent_id')->unsigned();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('adrisonluz_nanocms_banners');
    }
}
