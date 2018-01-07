<?php namespace AdrisonLuz\NanoCms\Components;

use Cms\Classes\ComponentBase;
use AdrisonLuz\NanoCms\Models\Banner;

class Banners extends ComponentBase
{
    public $banners = [];
    public $modals = [];
    public $slides = [];

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

        $this->addCss('/plugins/adrisonluz/nanocms/assets/css/slick.css');
        $this->addCss('/plugins/adrisonluz/nanocms/assets/css/slick-theme.css');
        $this->addJs('/plugins/adrisonluz/nanocms/assets/js/slick.min.js');
        $this->addJs('/plugins/adrisonluz/nanocms/assets/js/banner.js');
        
        foreach($bannersList as $banner){
            switch($banner->tipo){
                case 'slide':
                    $this->slides[] = $banner;
                break;
                case 'modal':
                    $this->modals[] = $banner;
                break;
            default:
                $this->banners[] = $banner;
            }
        }

        $this->page["{$this->alias}"] = [
            'slides' => $this->slides,
            'modals' => $this->modals,
            'banners' => $this->banners
        ];

        // Debug
        if($this->property('debug') == 1){
            echo '[Alias: ' . $this->alias . ']' . "\n";
            dd($this->page["{$this->alias}"]->toArray());
        }
    }
}

