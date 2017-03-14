<?php namespace AdrisonLuz\NanoCms\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAdrisonluzNanocmsPosts4 extends Migration
{
    public function up()
    {
        Schema::table('adrisonluz_nanocms_posts', function($table)
        {
            $table->text('resumo')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('adrisonluz_nanocms_posts', function($table)
        {
            $table->dropColumn('resumo');
        });
    }
}
