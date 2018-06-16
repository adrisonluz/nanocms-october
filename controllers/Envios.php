<?php namespace AdrisonLuz\NanoCms\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Envios extends Controller
{
    public $implement = [    ];
    
    public $requiredPermissions = [
        'nanocms_envios' 
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('AdrisonLuz.NanoCms', 'geral', 'envios');
    }
}
