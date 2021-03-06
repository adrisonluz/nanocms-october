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
        $paginas = Pagina::lists('titulo','id');
        $paginas[0] = 'Todas';
        
        return $paginas;
    }

    public function scopeAtivos($query)
    {
      return $query->where('ativo','=',1)
        ->where(function($query){
           $query->whereNull('data_ini')->orWhere('data_ini','<',date('Y-m-d h:i:s'));
	})
	->where(function($query){
           $query->whereNull('data_fim')->orWhere('data_fim','>',date('Y-m-d h:i:s'));
        })
	->get();
    }
}
