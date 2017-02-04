<?php namespace AdrisonLuz\NanoCms\Components;

use Cms\Classes\ComponentBase;
use AdrisonLuz\NanoCms\Models\Field;

class Fields extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'Fields',
            'description' => 'Lista todos os fields cadastrados.'
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
          $fields = Field::with('pai')->ativos();

          $this->page['fields'] = $fields;

          // Debug
          if($this->property('debug') == 1){
              dd($fields->toArray());
          }
      }

}
