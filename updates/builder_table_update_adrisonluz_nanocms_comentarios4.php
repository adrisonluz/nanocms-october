<?php namespace AdrisonLuz\NanoCms\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAdrisonluzNanocmsComentarios4 extends Migration
{
    public function up()

    {

        Schema::table('adrisonluz_nanocms_comentarios', function($table)

        {

            $table->boolean('ativo')->nullable();

            $table->timestamp('created_at')->nullable();

            $table->timestamp('updated_at')->nullable();

            $table->integer('comentario_id')->nullable()->change();

            $table->text('dados')->nullable();

        });

    }

    

    public function down()

    {

        Schema::table('adrisonluz_nanocms_comentarios', function($table)

        {

            $table->dropColumn('ativo');

            $table->dropColumn('created_at');

            $table->dropColumn('updated_at');

            $table->integer('comentario_id')->nullable(false)->change();

            $table->dropColumn('dados');
        });

    }
}