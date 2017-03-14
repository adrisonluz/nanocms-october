<?php namespace AdrisonLuz\NanoCms\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAdrisonluzNanocmsMenusitens2 extends Migration
{
    public function up()
    {
        Schema::table('adrisonluz_nanocms_menusitens', function($table)
        {
            $table->boolean('externo')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('adrisonluz_nanocms_menusitens', function($table)
        {
            $table->dropColumn('externo');
        });
    }
}
