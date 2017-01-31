<?php namespace AdrisonLuz\NanoCms\Models;

use Model;

/**
 * Model
 */
class Banner extends Model
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
        'pagina' => ['AdrisonLuz\NanoCms\Models\Pagina']
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'adrisonluz_nanocms_banners';

    public function getPaginaIdOptions(){
        return Pagina::lists('titulo','id');
    }

    public function scopeAtivos($query)
    {
      return $query->where('ativo','=',1)->get();
    }
}
