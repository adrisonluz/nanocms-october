<?php namespace AdrisonLuz\NanoCms\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateAdrisonluzNanocmsViews extends Migration
{
    public function up()
    {
        Schema::create('adrisonluz_nanocms_views', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('mes');
            $table->string('ano');
            $table->string('pageviews')->nullable();
            $table->string('visitantes')->nullable();
            $table->string('visitas')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('adrisonluz_nanocms_views');
    }
}
