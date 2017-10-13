<?php namespace AdrisonLuz\NanoCms\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAdrisonluzNanocmsPosts5 extends Migration
{
    public function up()
    {
        Schema::table('adrisonluz_nanocms_posts', function($table)
        {
            $table->integer('ordem')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('adrisonluz_nanocms_posts', function($table)
        {
            $table->integer('ordem')->nullable(false)->change();
        });
    }
}
