<?php namespace AdrisonLuz\NanoCms\Components;

use Cms\Classes\ComponentBase;
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
            'limit' => [
                 'title'             => 'Limite',
                 'description'       => 'Quantidade de Posts exibidos',
                 'default'           => 2,
                 'type'              => 'string',
                 'validationPattern' => '^[0-9]+$',
                 'validationMessage' => 'Por favor, insira apenas números.'
            ],
            'categoriaId' => [
                'title' => 'Categoria',
                'description' => 'Define categoria dos posts exibidos.',
                'type' => 'dropdown',
                'default' => 0
            ],
	    'destaque' => [
                 'title'             => 'Destaque',
                 'description'       => 'Exibe somente os posts marcados como destaque.',
                 'default'           => false,
                 'type'              => 'checkbox',
            ],
            'orderBy' => [
                 'title'             => 'Ordenar Por',
                 'description'       => 'Permite escolher o método de ordenação.',
                 'default'           => 'data',
                 'type'              => 'dropdown',
                 'options'           => [
                    'data'  => 'Data',
                    'ordem' => 'Ordem'
                 ],
                 'group'             => 'Ordem'
            ],
            'order' => [
                 'title'             => 'Tipo',
                 'description'       => 'Permite escolher se a ordenação será ascendente ou descendente.',
                 'default'           => 'asc',
                 'type'              => 'dropdown',
                 'options'           => [
                    'asc'  => 'ASC',
                    'desc' => 'DESC'
                 ],
                 'group'             => 'Ordem'
            ],
            'debug' => [
                 'title'             => 'Debug',
                 'description'       => 'Permite debugar o componente.',
                 'default'           => false,
                 'type'              => 'checkbox',
            ],
          ];
      }

      public function getCategoriaIdOptions()
      {
          $categorias = Categoria::lists('titulo', 'id');
          $categorias[0] = 'Todas';
          $categorias['din'] = 'Dinamico';
          
          return $categorias;
      }

      public function onRun()
      {
          $posts = Post::ativos();
          $limit = $this->property('limit');
          $orderBy = $this->property('orderBy');
          $order = $this->property('order');
          $categoriaId = $this->property('categoriaId');
          $destaque = $this->property('destaque');

          // Se destaque estiver ativo, busca apenas posts destaques
          if($destaque == 1){
            $posts->where('destaque','=',1);
          }

          // Se categoria escolhida, busca somente os posts da mesma
          if($categoriaId and ($categoriaId == 'din' and !empty($this->param('categoria')) or $categoriaId !== 'din')){
            $categoria = Categoria::where('slug','=',$this->param('categoria'))->first();

            if($categoria){
              $categoriaId = $categoria->id;
            }    

            $posts->where('categoria_id','=',$categoriaId);
          }

          // Ordena posts
          $posts->orderBy($orderBy, $order);          

          // Se houver limite selecionado, busca apenas a quantidade setada
          if(count($limit) > 0){
            $posts->limit($limit);            
          }

          $this->page["{$this->alias}"] = $posts->get();

          // Debug
          if($this->property('debug') == 1){
              echo '[Alias: ' . $this->alias . ']' . "\n";

              if(isset($categoria)){
                echo '[Categoria Atual: ' . $categoria->titulo . "] \n";
              }
              dd($this->page["{$this->alias}"]->toArray());
          }
      }
}
