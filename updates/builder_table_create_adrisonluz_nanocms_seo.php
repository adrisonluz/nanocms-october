<?php namespace AdrisonLuz\NanoCms\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateAdrisonluzNanocmsSeo extends Migration
{
    public function up()
    {
        Schema::create('adrisonluz_nanocms_seo', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('url_old');
            $table->string('url_new')->nullable();
            $table->string('title')->nullable();
            $table->string('h1')->nullable();
            $table->text('alt')->nullable();
            $table->text('span')->nullable();
            //$table->integer('agent_id')->unsigned();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('adrisonluz_nanocms_seo');
    }
}

