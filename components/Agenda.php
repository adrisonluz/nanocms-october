<?php namespace AdrisonLuz\NanoCms\Components;

use Cms\Classes\ComponentBase;
use AdrisonLuz\NanoCms\Models\Agenda as AgendaList;

class Agenda extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'Agenda',
            'description' => 'Lista todas as categorias cadastradas.'
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
          $categorias = AgendaList::ativos();

          $this->page['categorias'] = $categorias;

          // Debug
          if($this->property('debug') == 1){
              dd(AgendaList::ativos()->toArray());
          }
      }
}
