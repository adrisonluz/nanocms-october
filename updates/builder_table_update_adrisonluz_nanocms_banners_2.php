<?php namespace AdrisonLuz\NanoCms\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAdrisonluzNanocmsBanners2 extends Migration
{
    public function up()
    {
        Schema::table('adrisonluz_nanocms_banners', function($table)
        {
            $table->increments('id')->unsigned()->change();
        });
    }
    
    public function down()
    {
        Schema::table('adrisonluz_nanocms_banners', function($table)
        {
            $table->increments('id')->unsigned(false)->change();
        });
    }
}
