<?php namespace AdrisonLuz\NanoCms\Components;

use Cms\Classes\ComponentBase;
use AdrisonLuz\NanoCms\Models\Categoria;

class Categorias extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'Categorias',
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
        $categorias = Categoria::with('pai')->ativos();

        $this->page['categorias'] = $categorias;

        // Debug
        if($this->property('debug') == 1){
            dd($categorias->toArray());
        }
    }

}
