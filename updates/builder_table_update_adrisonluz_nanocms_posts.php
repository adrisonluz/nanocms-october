<?php namespace AdrisonLuz\NanoCms\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAdrisonluzNanocmsPosts extends Migration
{
    public function up()
    {
        Schema::table('adrisonluz_nanocms_posts', function($table)
        {
            $table->string('imagem')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('adrisonluz_nanocms_posts', function($table)
        {
            $table->dropColumn('imagem');
        });
    }
}
