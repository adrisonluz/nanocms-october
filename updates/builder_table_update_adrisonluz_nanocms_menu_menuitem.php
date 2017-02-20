<?php namespace AdrisonLuz\NanoCms\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAdrisonluzNanocmsMenuMenuitem extends Migration
{
    public function up()
    {
        Schema::rename('adrisonluz_nanocms_menus_menuitens', 'adrisonluz_nanocms_menu_menuitem');
        Schema::table('adrisonluz_nanocms_menu_menuitem', function($table)
        {
            $table->dropPrimary(['menu_id']);
            $table->primary(['menu_id','menuitem_id']);
        });
    }
    
    public function down()
    {
        Schema::rename('adrisonluz_nanocms_menu_menuitem', 'adrisonluz_nanocms_menus_menuitens');
        Schema::table('adrisonluz_nanocms_menus_menuitens', function($table)
        {
            $table->dropPrimary(['menu_id','menuitem_id']);
            $table->primary(['menu_id']);
        });
    }
}
