<?php namespace AdrisonLuz\NanoCms\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAdrisonluzNanocmsBanners3 extends Migration
{
    public function up()
    {
        Schema::table('adrisonluz_nanocms_banners', function($table)
        {
            $table->string('imagem')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('adrisonluz_nanocms_banners', function($table)
        {
            $table->dropColumn('imagem');
        });
    }
}
