<?php namespace AdrisonLuz\NanoCms\Components;

use Cms\Classes\ComponentBase;
use AdrisonLuz\NanoCms\Models\Form;

class Forms extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'Forms',
            'description' => 'Lista todos os formulários cadastrados.'
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
        $forms = Form::with('pagina')->ativos();

        $this->page['forms'] = $forms;

        // Debug
        if($this->property('debug') == 1){
            dd($forms->toArray());
        }
    }

}
