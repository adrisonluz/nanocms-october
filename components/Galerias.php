<?php namespace AdrisonLuz\NanoCms\Components;

use Cms\Classes\ComponentBase;
use Cms\Classes\Page;
use AdrisonLuz\NanoCms\Models\Galeria;

class Galerias extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'Galerias',
            'description' => 'Lista todas as galerias cadastradas.'
        ];
    }

    public function defineProperties()
    {
        return [
          'debug' => [
               'title'             => 'Debug',
               'description'       => 'Permite debugar o componente.',
               'default'           => false,
               'type'              => 'checkbox',
          ],
            'page' => [
                'title' => 'Página interna',
                'description' => 'Define a página de interna de galerias',
                'type' => 'dropdown',
            ],
          ];
      }

    public function getPageOptions()
    {
        $paginas = Page::sortBy('baseFileName')->lists('baseFileName', 'baseFileName');
        $paginas[0] = 'Nenhuma';
        
        return $paginas;
    }

    public function onRun()
    {
        $galerias = Galeria::ativos();

        $this->page['galerias'] = $galerias;
        $this->page['page_slug'] = $this->property('page');

        // Debug
        if($this->property('debug') == 1){
            dd($galerias->toArray());
        }
    }

}
