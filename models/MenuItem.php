<?php namespace AdrisonLuz\NanoCms\Models;

use Model;

/**
 * Model
 */
class MenuItem extends Model
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
        'menus' => [
            'AdrisonLuz\NanoCms\Models\Menu', 
            'table' => 'adrisonluz_nanocms_menu_menuitem',
            'key' => 'menuitem_id',
            'otherKey' => 'menu_id',
        ]
    ];

    public $belongsTo = [
        'pai' => ['AdrisonLuz\NanoCms\Models\MenuItem', 'key' => 'menuitem_id', 'otherKey' => 'id'],
        'pagina' => 'AdrisonLuz\NanoCms\Models\Pagina'
    ];
    
    public $hasMany = [
        'filhos' => ['AdrisonLuz\NanoCms\Models\MenuItem', 'key' => 'menupai_id', 'otherKey' => 'id']
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'adrisonluz_nanocms_menusitens';

    // Retorna todos os itens de menu
    public function getMenupaiIdOptions(){
        $menuItens = MenuItem::lists('titulo','id');
        $menuItens[0] = 'Nenhum';
        
        return $menuItens;
    }
    
    // Retorna todas as páginas
    public function getPaginaIdOptions(){
        $paginas = Pagina::lists('titulo','id');
        $paginas[0] = 'Nenhuma';
        return $paginas;
    }

    public function scopeAtivos($query)
    {
      return $query->where('ativo','=',1)->oderBy('ordem')->get();
    }
}
