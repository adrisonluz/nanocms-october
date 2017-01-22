<?php namespace AdrisonLuz\NanoCms\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAdrisonluzNanocmsAgendas2 extends Migration
{
    public function up()
    {
        Schema::table('adrisonluz_nanocms_agendas', function($table)
        {
            $table->dateTime('lixeira')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('adrisonluz_nanocms_agendas', function($table)
        {
            $table->dateTime('lixeira')->nullable(false)->change();
        });
    }
}
