<?php namespace AdrisonLuz\NanoCms\Models;

use Model;

/**
 * Model
 */
class Galeria extends Model
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
    
    public $attachMany = [
        'imagens' => ['System\Models\File']
    ];

    public $belongsTo = [
        'categoria' => ['AdrisonLuz\NanoCms\Models\Categoria']
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'adrisonluz_nanocms_galerias';

    // Retorna todas as categorias
    public function getCategoriaIdOptions(){
        return Categoria::lists('titulo','id');
    }
    
    public function scopeAtivos($query)
    {
      return $query->where('ativo','=',1)->get();
    }
}
