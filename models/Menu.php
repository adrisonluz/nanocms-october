<?php namespace AdrisonLuz\NanoCms\Models;

use Model;

/**
 * Model
 */
class Menu extends Model
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

    // Permite JSON em itens
    protected $jsonable = ['itens'];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'adrisonluz_nanocms_menus';

    public $belongsToMany = [
        'itens' => [
            'AdrisonLuz\NanoCms\Models\MenuItem', 
            'table' => 'adrisonluz_nanocms_menu_menuitem',
            'key' => 'menu_id',
            'otherKey' => 'menuitem_id',
        ]
    ];
    
    // Retorna todas as páginas
    public function getPaginaIdOptions(){
        $paginas = Pagina::lists('titulo','id');
        $paginas[0] = 'Todas';
        return $paginas;
    }

    // Retorna todos os itens de menu
    public function getItensOptions(){
        return MenuItem::lists('titulo','id');
    }
    
    public function scopeAtivos($query)
    {
      return $query->where('ativo','=',1)->get();
    }
}
