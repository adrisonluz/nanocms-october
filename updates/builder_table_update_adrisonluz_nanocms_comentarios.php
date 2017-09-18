<?php namespace AdrisonLuz\NanoCms\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAdrisonluzNanocmsComentarios extends Migration
{
    public function up()
    {
        Schema::table('adrisonluz_nanocms_comentarios', function($table)
        {
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
            $table->boolean('status');
        });
    }
    
    public function down()
    {
        Schema::table('adrisonluz_nanocms_comentarios', function($table)
        {
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
            $table->dropColumn('status');
        });
    }
}
