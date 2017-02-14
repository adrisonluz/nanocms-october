<?php namespace AdrisonLuz\NanoCms\Models;

use Model;

/**
 * Model
 */
class Pagina extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /*
     * Validation
     */
    public $rules = [
    ];

    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;
    
    public $attachOne = [
        'imagem' => ['System\Models\File']
    ];
    
    public $hasOne = [
        'galeria' => ['AdrisonLuz\NanoCms\Models\Galeria']
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'adrisonluz_nanocms_paginas';

    // Retorna todas as galerias
    public function getGaleriaIdOptions(){
        $galerias = Galeria::lists('titulo','id');
        $galerias[0] = 'Nenhuma';
            
        return $galerias;
    }
}
