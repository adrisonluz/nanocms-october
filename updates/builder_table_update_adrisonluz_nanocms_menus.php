<?php namespace AdrisonLuz\NanoCms\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAdrisonluzNanocmsMenus extends Migration
{
    public function up()
    {
        Schema::table('adrisonluz_nanocms_menus', function($table)
        {
            $table->string('itens')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('adrisonluz_nanocms_menus', function($table)
        {
            $table->dropColumn('itens');
        });
    }
}
