<?php namespace AdrisonLuz\NanoCms\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAdrisonluzNanocmsGalerias4 extends Migration
{
    public function up()
    {
        Schema::table('adrisonluz_nanocms_galerias', function($table)
        {
            $table->integer('categoria_id')->unsigned();
        });
    }
    
    public function down()
    {
        Schema::table('adrisonluz_nanocms_galerias', function($table)
        {
            $table->dropColumn('categoria_id');
        });
    }
}
