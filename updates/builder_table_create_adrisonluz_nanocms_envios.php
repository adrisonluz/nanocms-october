<?php namespace AdrisonLuz\NanoCms\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateAdrisonluzNanocmsEnvios extends Migration
{
    public function up()
    {
        Schema::create('adrisonluz_nanocms_envios', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('form_id')->unsigned();
            $table->text('json_campos')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('adrisonluz_nanocms_envios');
    }
}
