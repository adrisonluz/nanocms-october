<?php namespace AdrisonLuz\NanoCms\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateAdrisonluzNanocmsComentarios extends Migration
{
    public function up()
    {
        Schema::create('adrisonluz_nanocms_comentarios', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('post_id')->unsigned();
            $table->integer('comentario_id')->unsigned()->nullable();
            $table->integer('form_id')->unsigned();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('adrisonluz_nanocms_comentarios');
    }
}

