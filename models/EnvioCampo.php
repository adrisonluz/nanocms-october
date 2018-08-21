<?php namespace AdrisonLuz\NanoCms\Models;

use Model;

/**
 * Model
 */
class EnvioCampo extends Model
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
    public $table = 'adrisonluz_nanocms_envios_campos';

    public $belongsTo = [
        'form' => ['AdrisonLuz\NanoCms\Models\Form']
    ];

    public $hasMany = [
      'valores' => [
          'AdrisonLuz\NanoCms\Models\CampoValor',
          'key' => 'envio_campo_id',
          'otherKey' => 'id'
      ]
    ];
}
