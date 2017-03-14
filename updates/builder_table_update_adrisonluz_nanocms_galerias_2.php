<?php namespace AdrisonLuz\NanoCms\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAdrisonluzNanocmsGalerias2 extends Migration
{
    public function up()
    {
        Schema::table('adrisonluz_nanocms_galerias', function($table)
        {
            $table->dropColumn('pagina_id');
            $table->dropColumn('post_id');
        });
    }
    
    public function down()
    {
        Schema::table('adrisonluz_nanocms_galerias', function($table)
        {
            $table->integer('pagina_id')->unsigned();
            $table->integer('post_id')->unsigned();
        });
    }
}
