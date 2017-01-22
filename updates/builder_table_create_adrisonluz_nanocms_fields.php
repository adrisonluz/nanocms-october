<?php namespace AdrisonLuz\NanoCms\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateAdrisonluzNanocmsFields extends Migration
{
    public function up()
    {
        Schema::create('adrisonluz_nanocms_fields', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('form_id')->unsigned();
            $table->integer('input_id')->nullable()->unsigned();
            $table->string('nome');
            $table->string('valor')->nullable();
            $table->string('placeholder')->nullable();
            $table->integer('mascara_id')->unsigned();
            $table->boolean('obrigatorio');
            $table->string('tipo');
            $table->integer('ordem');
            $table->boolean('ativo');
            $table->dateTime('lixeira')->nullable();
            $table->integer('agent_id')->unsigned();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('adrisonluz_nanocms_fields');
    }
}
