<?php namespace AdrisonLuz\NanoCms\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateAdrisonluzNanocmsMenusMenuitens extends Migration
{
    public function up()
    {
        Schema::create('adrisonluz_nanocms_menus_menuitens', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('menu_id')->unsigned();
            $table->integer('menuitem_id')->unsigned();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('adrisonluz_nanocms_menus_menuitens');
    }
}
