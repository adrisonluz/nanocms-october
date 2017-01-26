<?php namespace AdrisonLuz\NanoCms\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Paginas extends Controller
{
    public $implement = ['Backend\Behaviors\ListController','Backend\Behaviors\FormController'];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public $requiredPermissions = [
        'nanocms_paginas' 
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('AdrisonLuz.NanoCms', 'agenda', 'paginas');
    }
}