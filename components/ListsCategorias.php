<?php namespace AdrisonLuz\NanoCms\Components;

use Cms\Classes\ComponentBase;
use AdrisonLuz\NanoCms\Models\Categoria;

class ListsCategorias extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'Lists Categorias',
            'description' => 'Lista todas as categorias cadastradas.'
        ];
    }

    public function defineProperties()
      {
          return [
            'order' => [
                 'title'             => 'Ordem',
                 'description'       => 'Permite escolher se a ordenação será ascendente ou descendente.',
                 'default'           => 'asc',
                 'type'              => 'dropdown',
                 'options'           => [
                    'asc'  => 'ASC',
                    'desc' => 'DESC'
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
          $categorias = Categoria::ativos();
          $order = $this->property('order');
          $categSlug = $this->page['categoria'];

          $categorias->orderBy('titulo', $order);          

          $this->page["{$this->alias}"] = $categorias->get();

          // Debug
          if($this->property('debug') == 1){
              echo '[Alias: ' . $this->alias . "] \n";
              echo '[Categoria Atual: ' . $categSlug . "] \n";
              dd($this->page["{$this->alias}"]->toArray());
          }
      }
}
