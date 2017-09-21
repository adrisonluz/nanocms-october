<?php namespace AdrisonLuz\NanoCms\Components;

use Cms\Classes\ComponentBase;
use AdrisonLuz\NanoCms\Models\Post;

class InternalPost extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'Internal Post',
            'description' => 'Lista informações sobre o post selecionado.'
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
          $post = Post::with('categoria','galeria','comentarios')->where($getBy,'=',$this->param($getBy))->first();

          $this->page["{$this->alias}"] = $post;

          // Debug
          if($this->property('debug') == 1){
              echo '[Alias: ' . $this->alias . ']' . "\n";
              dd($this->page["{$this->alias}"]->toArray());
          }
      }
}