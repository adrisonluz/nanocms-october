<?php namespace AdrisonLuz\NanoCms\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAdrisonluzNanocmsEnviosCampos extends Migration
{
    public function up()
    {
        Schema::rename('adrisonluz_nanocms_envios', 'adrisonluz_nanocms_envios_campos');
    }
    
    public function down()
    {
        Schema::rename('adrisonluz_nanocms_envios_campos', 'adrisonluz_nanocms_envios');
    }
}
