<?php namespace AdrisonLuz\NanoCms\Models;

use Model;

/**
 * Model
 */
class Field extends Model
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
        'forms' => ['AdrisonLuz\NanoCms\Models\Form','fields']
    ];

    public $belongsTo = [
        'pai' => ['AdrisonLuz\NanoCms\Models\Field', 'key' => 'inputpai_id', 'otherKey' => 'id']
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'adrisonluz_nanocms_fields';

    public function getMascaraIdOptions(){
        $mascaras = Mascara::lists('nome','id');
        $mascaras[0] = 'Nenhuma';

        return $mascaras;
    }

    public function scopeAtivos($query)
    {
      return $query->where('ativo','=',1)->get();
    }
}
