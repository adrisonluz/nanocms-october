<?php namespace AdrisonLuz\NanoCms\Components;

use Cms\Classes\ComponentBase;
use Cms\Classes\Page;
use AdrisonLuz\NanoCms\Models\Galeria;
use AdrisonLuz\NanoCms\Models\Categoria;

class Galerias extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'Galerias',
            'description' => 'Lista todas as galerias cadastradas.'
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
          'page' => [
                'title' => 'Página interna',
                'description' => 'Define a página de interna de galerias',
                'type' => 'dropdown',
          ],
	  'categoriaId' => [
                'title' => 'Categoria',
                'description' => 'Define categoria das galerias exibidas.',
                'type' => 'dropdown',
                'default' => 0
          ]
 	];
      }

    public function getPageOptions()
    {
        $paginas = Page::sortBy('baseFileName')->lists('baseFileName', 'baseFileName');
        $paginas[0] = 'Nenhuma';
        
        return $paginas;
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
        $galerias = Galeria::where('ativo','=',1);
	$categoriaId = $this->property('categoriaId');

        $this->page['page_galeria'] = $this->property('page');

	// Se categoria escolhida, busca somente os posts da mesma
        if($categoriaId and ($categoriaId == 'din' and !empty($this->param('categoria')) or $categoriaId !== 'din')){
          $categoria = Categoria::where('slug','=',$this->param('categoria'))->first();

          if($categoria){
            $categoriaId = $categoria->id;
          }    

          $galerias->where('categoria_id','=',$categoriaId);
        }

	$this->page["{$this->alias}"] = $galerias->get();

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
