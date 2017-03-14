<?php namespace AdrisonLuz\NanoCms\Components;

use Cms\Classes\ComponentBase;
use AdrisonLuz\NanoCms\Models\Post;

class InternalPost extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'Internal Post',
            'description' => 'Lista informações sobre o post selecionado.'
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
          ];
      }
    
      public function onRun()
      {
          $slug = $this->param('slug');
          $post = Post::with('categoria','galeria')->where('slug','=',$slug)->first();
          
          $this->page['post'] = $post;
          
          // Debug
          if($this->property('debug') == 1){
              dd($post->toArray());
          }
      }
}
