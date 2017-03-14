<?php namespace AdrisonLuz\NanoCms\Components;

use Cms\Classes\ComponentBase;
use Cms\Classes\Page;
use AdrisonLuz\NanoCms\Models\Post;
use AdrisonLuz\NanoCms\Models\Categoria;

class ListsPosts extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'Lists Posts',
            'description' => 'Lista todos os posts cadastrados.'
        ];
    }

    public function defineProperties()
      {
          return [
            'debug' => [
                 'title'             => 'Debug',
                 'description'       => 'Permite debugar o componente.',
                 'default'           => false,
                 'type'              => 'checkbox',
            ],
            'ordem' => [
                'title' => 'Ordem',
                'description' => 'Ordena a exibição dos posts.',
                'type' => 'dropdown',
                'options' => [
                    'ASC' => 'Crescente', 
                    'DESC' => 'Descendente',
                    'manual' => 'Manual'
                ],
                'default' => 'manual'
            ],
            'limit' => [
                'title' => 'Limite',
                'description' => 'Limita a quantidade de posts exibidos. Deixar vazio exibe todos',
                'type' => 'string',
            ],
            'categoria' => [
                 'title' => 'Categorias',
                 'type' => 'set',
                 'description' => 'Selecione as categorias à serem exibidas. Deixar vazio para todas.',
            ],
            'destaque' => [
                 'title'             => 'Destaque',
                 'description'       => 'Retorna somente os posts com destaque.',
                 'default'           => false,
                 'type'              => 'checkbox',
            ],
          ];
      }
      
      public function getCategoriaOptions(){
          return Categoria::lists('titulo','titulo');
      }
    
      public function onRun()
      {
          $ordem = $this->property('ordem');
          $limit = $this->property('limit');
          $categorias = $this->property('categoria'); 
          $destaque = $this->property('destaque');
          
          $posts = Post::with('categoria.pai');
          
          if($ordem !== 'manual'){
              $posts->orderBy('id',$ordem);
          }else{
              $posts->orderBy('ordem','ASC');
          }
          
          if($destaque !== '')
              $posts->where('destaque','=',1);
          
          if($categorias){
              foreach($categorias as $catTitulo){
                  $categoriaId = Categoria::select('id')->where('titulo',$catTitulo)->first();
                  $categoriaArray[] = $categoriaId->id;
              };
              $posts->whereIn('categoria_id',$categoriaArray);
          }
              
          if($limit !== '')
              $posts->limit($limit);              
          
          $this->page['posts'] = $posts->ativos();

          // Debug
          if($this->property('debug') == 1){
              dd($this->page['posts']->toArray());
          }
      }
}
