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
        //'AdrisonLuz\NanoCms\Components\Field' => 'fields',
        //'AdrisonLuz\NanoCms\Components\Form' => 'forms',
        //'AdrisonLuz\NanoCms\Components\Galeria' => 'galerias',
        //'AdrisonLuz\NanoCms\Components\Mascara' => 'mascaras',
        //'AdrisonLuz\NanoCms\Components\Menu' => 'menus',
        //'AdrisonLuz\NanoCms\Components\MenuItem' => 'menuItens',
        //'AdrisonLuz\NanoCms\Components\OnlineViews' => 'onlineViews',
        //'AdrisonLuz\NanoCms\Components\Pagina' => 'paginas',
        //'AdrisonLuz\NanoCms\Components\Post' => 'posts',
        //'AdrisonLuz\NanoCms\Components\Seo' => 'seo',
        //'AdrisonLuz\NanoCms\Components\View' => 'views',
      ];
    }

    public function registerSettings()
    {
    }
}
