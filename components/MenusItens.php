<?php namespace AdrisonLuz\NanoCms\Components;

use Cms\Classes\ComponentBase;

class MenusItens extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'MenusItens Component',
            'description' => 'No description provided yet...'
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
          ];
      }

      public function onRun()
      {
          $categorias = Categoria::all();

          $this->page['categorias'] = $categorias;

          // Debug
          if($this->property('debug') == 1){
              dd(Categoria::all()->toArray());
          }
      }

}
