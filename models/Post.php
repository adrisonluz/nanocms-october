<?php namespace AdrisonLuz\NanoCms\Models;

use Model;

/**
 * Model
 */
class Post extends Model
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
        'categoria' => ['AdrisonLuz\NanoCms\Models\Categoria'],
        'galeria' => ['AdrisonLuz\NanoCms\Models\Galeria']
    ];

    public $hasMany = [
      'comentarios' => [
          'AdrisonLuz\NanoCms\Models\Comentario',
          'key' => 'id',
          'otherKey' => 'post_id',
      ],
    ];
    
    /**
     * @var string The database table used by the model.
     */
    public $table = 'adrisonluz_nanocms_posts';

    // Retorna todas as categorias
    public function getCategoriaIdOptions(){
        return Categoria::lists('titulo','id');
    }
    
    // Retorna todas as galerias
    public function getGaleriaIdOptions(){
        $galerias = Galeria::lists('titulo','id');
        $galerias[0] = 'Nenhuma';

        return $galerias;
    }

    public function scopeAtivos($query)
    {
      return $query->where('ativo','=',1);
    }
}
