<?php namespace AdrisonLuz\NanoCms\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAdrisonluzNanocmsOnlineviews extends Migration
{
    public function up()
    {
        Schema::table('adrisonluz_nanocms_onlineviews', function($table)
        {
            $table->string('sessao', 255)->nullable()->change();
            $table->string('time_end', 255)->nullable()->change();
            $table->string('url', 255)->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('adrisonluz_nanocms_onlineviews', function($table)
        {
            $table->string('sessao', 255)->nullable(false)->change();
            $table->string('time_end', 255)->nullable(false)->change();
            $table->string('url', 255)->nullable(false)->change();
        });
    }
}
