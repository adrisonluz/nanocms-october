<?php namespace AdrisonLuz\NanoCms\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAdrisonluzNanocmsForms7 extends Migration
{
    public function up()
    {
        Schema::table('adrisonluz_nanocms_forms', function($table)
        {
            $table->integer('conditional_select_id')->nullable()->unsigned();
            $table->string('classe', 191)->default(null)->change();
            $table->string('origem', 191)->default(null)->change();
            $table->dateTime('lixeira')->default(null)->change();
            $table->string('botao', 191)->default(null)->change();
            $table->string('callback', 255)->default(null)->change();
            $table->text('condicional')->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('adrisonluz_nanocms_forms', function($table)
        {
            $table->dropColumn('conditional_select_id');
            $table->string('classe', 191)->default('NULL')->change();
            $table->string('origem', 191)->default('NULL')->change();
            $table->dateTime('lixeira')->default('NULL')->change();
            $table->string('botao', 191)->default('NULL')->change();
            $table->string('callback', 255)->default('NULL')->change();
            $table->text('condicional')->default('NULL')->change();
        });
    }
}
