<?php namespace AdrisonLuz\NanoCms\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateAdrisonluzNanocmsOnlineviews extends Migration
{
    public function up()
    {
        Schema::create('adrisonluz_nanocms_onlineviews', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('ip');
            $table->string('sessao');
            $table->string('time_end');
            $table->string('url');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('adrisonluz_nanocms_onlineviews');
    }
}
