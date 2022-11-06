<?php namespace AdrisonLuz\NanoCms\Components;

use Cms\Classes\ComponentBase;
use AdrisonLuz\NanoCms\Models\Categoria;

class InternalCategoria extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'Internal Categoria',
            'description' => 'Lista informações sobre a categoria selecionada.'
        ];
    }

    public function defineProperties()
      {
          return [
            'getBy' => [
                 'title'             => 'Buscar Por',
                 'description'       => 'Permite escolher o método de busca.',
                 'default'           => 'slug',
                 'type'              => 'dropdown',
                 'options'           => [
                    'slug'  => 'Slug',
                    'id' => 'ID'
                 ]
            ],
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
          $getBy = $this->property('getBy');
          $category = Categoria::where($getBy,'=',$this->param('categoria'))->first();

          $this->page["{$this->alias}"] = $category;

          // Debug
          if($this->property('debug') == 1){
              $debug = (!empty($category) ? $category->toArray() : 'Categoria não encontrada.');
              echo '[Alias: ' . $this->alias . ']' . "\n";
              dd($debug);
          }
      }
}
