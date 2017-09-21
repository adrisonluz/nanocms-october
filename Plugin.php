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
        'AdrisonLuz\NanoCms\Components\ListsCategorias' => 'categorias',
        'AdrisonLuz\NanoCms\Components\Fields' => 'fields',
        'AdrisonLuz\NanoCms\Components\Forms' => 'form_list',
        'AdrisonLuz\NanoCms\Components\InternalForm' => 'form',
        'AdrisonLuz\NanoCms\Components\Galerias' => 'galerias',
        'AdrisonLuz\NanoCms\Components\InternalGaleria' => 'galeria',
        //'AdrisonLuz\NanoCms\Components\Mascara' => 'mascaras',
        'AdrisonLuz\NanoCms\Components\Menus' => 'menus',
        //'AdrisonLuz\NanoCms\Components\MenuItem' => 'menuItens',
        //'AdrisonLuz\NanoCms\Components\OnlineViews' => 'onlineViews',
        'AdrisonLuz\NanoCms\Components\ListsPaginas' => 'paginas',
        'AdrisonLuz\NanoCms\Components\InternalPagina' => 'pagina',
        'AdrisonLuz\NanoCms\Components\InternalPost' => 'post',
        'AdrisonLuz\NanoCms\Components\ListsPosts' => 'posts',
        //'AdrisonLuz\NanoCms\Components\Seo' => 'seo',
        //'AdrisonLuz\NanoCms\Components\View' => 'views',
      ];
    }

    public function registerSettings()
    {
    }

    // Custom filters and functions to Twig
    public function registerMarkupTags()
    {
        return [
            'filters' => [
                'json_decode' => [$this, 'getJsonDecode']
            ],
            'functions' => [

            ]
        ];
    }

    public function getJsonDecode($string)
    {
        return json_decode($string);
    }
}
