<?php namespace AdrisonLuz\NanoCms\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAdrisonluzNanocmsComentarios5 extends Migration
{
    public function up()
    {
        Schema::table('adrisonluz_nanocms_comentarios', function($table)
        {
            $table->integer('comentario_id')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('adrisonluz_nanocms_comentarios', function($table)
        {
            $table->integer('comentario_id')->nullable(false)->change();
        });
    }
}
