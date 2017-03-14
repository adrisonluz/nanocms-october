<?php namespace AdrisonLuz\NanoCms\Components;

use Cms\Classes\ComponentBase;
use AdrisonLuz\NanoCms\Models\Galeria;

class InternalGaleria extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'Internal Galeria',
            'description' => 'Lista informações sobre a galeria selecionada.'
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
          $slug = $this->param('slug');
          $galeria = Galeria::where('slug','=',$slug)->first();
          
          $this->page['galeria'] = $galeria;
          
          // Debug
          if($this->property('debug') == 1){
              dd($galeria->toArray());
          }
      }
}
