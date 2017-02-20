<?php namespace AdrisonLuz\NanoCms\Components;

use Cms\Classes\ComponentBase;
use AdrisonLuz\NanoCms\Models\Banner;

class Banners extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'Banners',
            'description' => 'Lista todos os banners cadastrados.'
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
        $bannersList = Banner::with('pagina')->ativos();
        
        $banners = [];
        $modals = [];
        $slides = [];
        
        foreach($bannersList as $banner){
            switch($banner->tipo){
                case 'slide':
                    $slides[] = $banner;
                break;
                case 'modal':
                    $modals[] = $banner;
                break;
            default:
                $banners[] = $banner;
            }
        }
        
        $this->page['banners'] = $banners;
        $this->page['modals'] = $modals;
        $this->page['slides'] = $slides;
        
        // Debug
        if($this->property('debug') == 1){
            dd(Banner::with('pagina')->ativos()->toArray());
        }
    }
}
