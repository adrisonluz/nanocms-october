<?php namespace AdrisonLuz\NanoCms\Components;

use Cms\Classes\ComponentBase;
use AdrisonLuz\NanoCms\Models\Menu;

class Menus extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'Menus',
            'description' => 'Lista todos os menus cadastrados.'
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
        $menus = Menu::with('itens.filhos')->ativos();
          
        $this->page['menus'] = $menus;

        // Debug
        if($this->property('debug') == 1){
            dd($menus->toArray());
        }
      }

}
