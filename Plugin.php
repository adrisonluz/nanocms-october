<?php namespace AdrisonLuz\NanoCms;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
      return [
        'AdrisonLuz\NanoCms\Components\Categorias' => 'categorias'
      ];
    }

    public function registerSettings()
    {
    }
}
