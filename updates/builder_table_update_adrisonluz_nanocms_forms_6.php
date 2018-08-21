<?php namespace AdrisonLuz\NanoCms\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAdrisonluzNanocmsForms6 extends Migration
{
    public function up()
    {
        Schema::table('adrisonluz_nanocms_forms', function($table)
        {
            $table->text('condicional')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('adrisonluz_nanocms_forms', function($table)
        {
            $table->dropColumn('condicional');
        });
    }
}
