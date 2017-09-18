<?php namespace AdrisonLuz\NanoCms\Models;

use Model;

/**
 * Model
 */
class Comentario extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    /*
     * Validation
     */
    public $rules = [
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'adrisonluz_nanocms_comentarios';
}