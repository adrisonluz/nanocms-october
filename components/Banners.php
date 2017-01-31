<?php namespace AdrisonLuz\NanoCms\Components;

use Cms\Classes\ComponentBase;
use AdrisonLuz\NanoCms\Models\Banner;

class Banners extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'Banners',
            'description' => 'Lista todos os banners cadastrados.'
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
        $categorias = Banner::ativos();

        $this->page['categorias'] = $categorias;

        // Debug
        if($this->property('debug') == 1){
            dd(Banner::with('pagina')->ativos()->toArray());
        }
    }
}
