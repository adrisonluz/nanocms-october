<?php namespace AdrisonLuz\NanoCms\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAdrisonluzNanocmsMenusitens extends Migration
{
    public function up()
    {
        Schema::table('adrisonluz_nanocms_menusitens', function($table)
        {
            $table->dropColumn('menu_id');
        });
    }
    
    public function down()
    {
        Schema::table('adrisonluz_nanocms_menusitens', function($table)
        {
            $table->integer('menu_id')->unsigned();
        });
    }
}
