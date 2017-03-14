<?php namespace AdrisonLuz\NanoCms\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateAdrisonluzNanocmsFormPagina extends Migration
{
    public function up()
    {
        Schema::create('adrisonluz_nanocms_form_pagina', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('form_id')->unsigned();
            $table->integer('pagina_id')->unsigned();
            $table->primary(['form_id','pagina_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('adrisonluz_nanocms_form_pagina');
    }
}
