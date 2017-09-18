<?php namespace AdrisonLuz\NanoCms\Models;

use Model;

/**
 * Model
 */
class Categoria extends Model
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

    public $belongsTo = [
        'pai' => ['AdrisonLuz\NanoCms\Models\Categoria', 'key' => 'categoriapai_id', 'otherKey' => 'id']
    ];
    
    public $hasMany = [
        'posts' => ['AdrisonLuz\NanoCms\Models\Post']
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'adrisonluz_nanocms_categorias';

    // Retorna todas as categorias
    public function getCategoriapaiIdOptions(){
        $categorias = Categoria::lists('titulo','id');
        $categorias[0] = 'Nenhuma';

        return $categorias;
    }

    public function scopeAtivos($query)
    {
      return $query->where('ativo','=',1);
    }
}
