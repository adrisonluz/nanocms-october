<?php namespace AdrisonLuz\NanoCms;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
      return [
        'AdrisonLuz\NanoCms\Components\Agenda' => 'agenda',
        'AdrisonLuz\NanoCms\Components\Banners' => 'banners',
        //'AdrisonLuz\NanoCms\Components\Bloco' => 'blocos',
        'AdrisonLuz\NanoCms\Components\Categorias' => 'categorias',
        'AdrisonLuz\NanoCms\Components\Fields' => 'fields',
        'AdrisonLuz\NanoCms\Components\Forms' => 'forms',
        'AdrisonLuz\NanoCms\Components\Galerias' => 'galerias',
        //'AdrisonLuz\NanoCms\Components\Mascara' => 'mascaras',
        'AdrisonLuz\NanoCms\Components\Menus' => 'menus',
        //'AdrisonLuz\NanoCms\Components\MenuItem' => 'menuItens',
        //'AdrisonLuz\NanoCms\Components\OnlineViews' => 'onlineViews',
        'AdrisonLuz\NanoCms\Components\Paginas' => 'paginas',
        //'AdrisonLuz\NanoCms\Components\Post' => 'posts',
        //'AdrisonLuz\NanoCms\Components\Seo' => 'seo',
        //'AdrisonLuz\NanoCms\Components\View' => 'views',
      ];
    }

    public function registerSettings()
    {
    }
}
