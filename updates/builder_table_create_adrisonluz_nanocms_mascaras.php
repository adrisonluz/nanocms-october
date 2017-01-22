<?php namespace AdrisonLuz\NanoCms\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateAdrisonluzNanocmsMascaras extends Migration
{
    public function up()
    {
        Schema::create('adrisonluz_nanocms_mascaras', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nome');
            $table->string('mask');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('adrisonluz_nanocms_mascaras');
    }
}
