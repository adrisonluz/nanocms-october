<?php namespace AdrisonLuz\NanoCms\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateAdrisonluzNanocmsFormField extends Migration
{
    public function up()
    {
        Schema::create('adrisonluz_nanocms_form_field', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('form_id')->unsigned();
            $table->integer('field_id')->unsigned();
            $table->primary(['form_id','field_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('adrisonluz_nanocms_form_field');
    }
}
