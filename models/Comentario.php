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

    public $hasMany = [
      'respostas' => [
          'AdrisonLuz\NanoCms\Models\Comentario',
          'key' => 'comentario_id',
          'otherKey' => 'id',
          'scope' => 'ativos'
      ],
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'adrisonluz_nanocms_comentarios';

    public function scopeAtivos($query)
    {
      return $query->where('ativo','=',1)->get();
    }
}