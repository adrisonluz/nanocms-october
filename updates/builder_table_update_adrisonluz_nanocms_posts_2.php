<?php namespace AdrisonLuz\NanoCms\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAdrisonluzNanocmsPosts2 extends Migration
{
    public function up()
    {
        Schema::table('adrisonluz_nanocms_posts', function($table)
        {
            $table->integer('galeria_id')->nullable()->unsigned();
        });
    }
    
    public function down()
    {
        Schema::table('adrisonluz_nanocms_posts', function($table)
        {
            $table->dropColumn('galeria_id');
        });
    }
}
