<?php namespace AdrisonLuz\NanoCms\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Mascara extends Controller
{
    public $implement = ['Backend\Behaviors\ListController','Backend\Behaviors\FormController','Backend\Behaviors\ReorderController'];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    public $requiredPermissions = [
        'nanocms_fields', 
        'nanocms_forms' 
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('AdrisonLuz.NanoCms', 'geral', 'mascaras');
    }
}