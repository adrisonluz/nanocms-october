<?php namespace AdrisonLuz\NanoCms\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAdrisonluzNanocmsGalerias3 extends Migration
{
    public function up()
    {
        Schema::table('adrisonluz_nanocms_galerias', function($table)
        {
            $table->dropColumn('imagens');
        });
    }
    
    public function down()
    {
        Schema::table('adrisonluz_nanocms_galerias', function($table)
        {
            $table->text('imagens')->nullable();
        });
    }
}
