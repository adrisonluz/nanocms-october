<?php namespace AdrisonLuz\NanoCms\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAdrisonluzNanocmsGalerias extends Migration
{
    public function up()
    {
        Schema::table('adrisonluz_nanocms_galerias', function($table)
        {
            $table->text('imagens')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('adrisonluz_nanocms_galerias', function($table)
        {
            $table->dropColumn('imagens');
        });
    }
}
