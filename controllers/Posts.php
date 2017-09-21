<?php namespace AdrisonLuz\NanoCms\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use AdrisonLuz\NanoCms\Models\Comentario;

class Posts extends Controller
{
    public $implement = ['Backend\Behaviors\ListController','Backend\Behaviors\FormController','Backend\Behaviors\ReorderController'];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    public $requiredPermissions = [
        'nanocms_posts' 
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('AdrisonLuz.NanoCms', 'geral', 'posts');
        $this->addJs("/plugins/adrisonluz/nanocms/assets/js/post.js");
    }

    public function onComAtivo(){
        $comentario_id = post('comentario_id');

        $comentario = Comentario::find($comentario_id);
        $comentario->ativo = ($comentario->ativo == 1 ? 0 : 1);

        $comentario->save();
    }

    public function onComDelete(){
        $comentario_id = post('comentario_id');

        $comentario = Comentario::find($comentario_id);
        $comentario->delete();
    }
}