<?php namespace AdrisonLuz\NanoCms\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateAdrisonluzNanocmsEnviosValores extends Migration
{
    public function up()
    {
        Schema::create('adrisonluz_nanocms_envios_valores', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('form_id')->unsigned();
            $table->integer('envio_campo_id')->unsigned();
            $table->text('json_valores')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('adrisonluz_nanocms_envios_valores');
    }
}
