<?php namespace AdrisonLuz\NanoCms\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAdrisonluzNanocmsComentarios6 extends Migration
{
    public function up()
    {
        Schema::table('adrisonluz_nanocms_comentarios', function($table)
        {
            $table->text('dados')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('adrisonluz_nanocms_comentarios', function($table)
        {
            $table->dropColumn('dados');
        });
    }
}
