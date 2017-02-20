<?php namespace AdrisonLuz\NanoCms\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAdrisonluzNanocmsMenusMenuitens extends Migration
{
    public function up()
    {
        Schema::table('adrisonluz_nanocms_menus_menuitens', function($table)
        {
            $table->dropColumn('id');
            $table->primary(['menu_id']);
        });
    }
    
    public function down()
    {
        Schema::table('adrisonluz_nanocms_menus_menuitens', function($table)
        {
            $table->dropPrimary(['menu_id']);
            $table->increments('id')->unsigned();
        });
    }
}
