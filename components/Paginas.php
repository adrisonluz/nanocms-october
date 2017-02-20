<?php namespace AdrisonLuz\NanoCms\Components;

use Cms\Classes\ComponentBase;
use Cms\Classes\Page;
use AdrisonLuz\NanoCms\Models\Pagina;

class Paginas extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'Paginas',
            'description' => 'Lista todas as páginas cadastradas.'
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
                'title' => 'Página do October',
                'description' => 'Define se é uma página do October CMS ',
                'type' => 'dropdown',
            ],
          ];
      }

    public function getPageOptions()
    {
        $paginas = Page::sortBy('baseFileName')->lists('baseFileName', 'url');
        $paginas[0] = 'Nenhuma';
        
        return $paginas;
    }
    
      public function onRun()
      {
          $paginas = Pagina::all();
          
          $this->page['page_slug'] = $this->property('page');
          $this->page['paginas'] = $paginas;

          // Debug
          if($this->property('debug') == 1){
              dd(Pagina::all()->toArray());
          }
      }

}
