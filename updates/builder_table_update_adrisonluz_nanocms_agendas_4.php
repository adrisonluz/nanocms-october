<?php namespace AdrisonLuz\NanoCms\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAdrisonluzNanocmsAgendas4 extends Migration
{
    public function up()
    {
        Schema::table('adrisonluz_nanocms_agendas', function($table)
        {
            $table->string('imagem')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('adrisonluz_nanocms_agendas', function($table)
        {
            $table->dropColumn('imagem');
        });
    }
}
