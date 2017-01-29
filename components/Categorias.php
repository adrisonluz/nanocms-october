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
        return [];
    }

    public function onRun()
    {
        $categorias = Categoria::all();

        $this->page['categorias'] = $categorias;
    }

}
