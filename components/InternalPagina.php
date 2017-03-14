<?php namespace AdrisonLuz\NanoCms\Components;

use Cms\Classes\ComponentBase;
use AdrisonLuz\NanoCms\Models\Pagina;

class InternalPagina extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'Internal Pagina',
            'description' => 'Lista informações sobre a página selecionada.'
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
          $paginas = Pagina::lists('titulo', 'slug');
          $paginas[0] = 'Nenhuma';
          
          return $paginas;
      }

      public function onRun()
      {
          $slug = $this->param('slug');
          $page = $this->property('page');

          if($page)
            $slug = $page;

          $pagina = Pagina::with('galeria','forms.fields.pai')->where('slug','=',$slug)->first();
          
          $this->page['pagina'] = $pagina;
          
          // Debug
          if($this->property('debug') == 1){
              dd($pagina->toArray());
          }
      }
}
