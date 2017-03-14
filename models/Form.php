<?php namespace AdrisonLuz\NanoCms\Models;

use Model;

/**
 * Model
 */
class Form extends Model
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

    public $belongsToMany = [
        'paginas' => [
            'AdrisonLuz\NanoCms\Models\Pagina',
            'table' => 'adrisonluz_nanocms_form_pagina',
            'key' => 'pagina_id',
            'otherKey' => 'form_id',
        ],
        'fields' => [
            'AdrisonLuz\NanoCms\Models\Field',
            'table' => 'adrisonluz_nanocms_form_field',
            'key' => 'form_id',
            'otherKey' => 'field_id',
            'order' => 'ordem asc'
        ]
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'adrisonluz_nanocms_forms';

    // Retorna todas as páginas
    public function getPaginasOptions(){
        $paginas = Pagina::lists('titulo','id');
        return $paginas;
    }

    // Retorna todos os fields
    public function getFieldsOptions(){
        return Field::lists('nome','id');
    }

    public function scopeAtivos($query)
    {
      return $query->where('ativo','=',1)->get();
    }
}
