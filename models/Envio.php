<?php namespace AdrisonLuz\NanoCms\Models;

use Model;

/**
 * Model
 */
class Envio extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'adrisonluz_nanocms_envios';
}
