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

    // Permite JSON em fields
    protected $jsonable = ['fields'];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'adrisonluz_nanocms_forms';

    // Retorna todas as páginas
    public function getPaginaIdOptions(){
        return Pagina::lists('titulo','id');
    }

    // Retorna todos os fields
    public function getFieldsOptions(){
        return Field::lists('nome','id');
    }
}
