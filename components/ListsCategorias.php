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
        $categorias = Categoria::with('posts','pai')->ativos();

        $this->page['categorias'] = $categorias;

        // Debug
        if($this->property('debug') == 1){
            dd($categorias->toArray());
        }
    }

}
