<?php namespace AdrisonLuz\NanoCms\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAdrisonluzNanocmsCategorias4 extends Migration
{
    public function up()
    {
        Schema::table('adrisonluz_nanocms_categorias', function($table)
        {
            $table->dropColumn('imagem');
        });
    }
    
    public function down()
    {
        Schema::table('adrisonluz_nanocms_categorias', function($table)
        {
            $table->string('imagem', 255)->nullable();
        });
    }
}
