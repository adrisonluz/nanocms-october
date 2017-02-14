<?php namespace AdrisonLuz\NanoCms\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAdrisonluzNanocmsBanners4 extends Migration
{
    public function up()
    {
        Schema::table('adrisonluz_nanocms_banners', function($table)
        {
            $table->dateTime('data_ini')->nullable()->change();
            $table->dateTime('data_fim')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('adrisonluz_nanocms_banners', function($table)
        {
            $table->dateTime('data_ini')->nullable(false)->change();
            $table->dateTime('data_fim')->nullable(false)->change();
        });
    }
}
