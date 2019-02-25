<?php namespace AdrisonLuz\NanoCms\Components;

use Cms\Classes\ComponentBase;
use AdrisonLuz\NanoCms\Models\Form;
use AdrisonLuz\NanoCms\Models\Field;
use AdrisonLuz\NanoCms\Models\Pagina;

use File;
use Schema;
use Mail;
use System\Models\MailTemplate;

class Forms extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'Forms',
            'description' => 'Lista todos os formulários cadastrados.'
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
        $forms = Form::with('paginas')->ativos();

        $this->page['forms'] = $forms;

        // Página
        $slug = $this->param('slug');
        if($slug)
          $this->page['pagina'] = Pagina::with('galeria','forms.fields.pai')->where('slug','=',$slug)->first();

        // Debug
        if($this->property('debug') == 1){
            dd($forms->toArray());
        }
    }

    // Enviar dados por email
    public function onSendForm(){
      $form_id = post('form_id');
      $form_tipo = post('form_tipo');
      
      if($form_id){
        $form = Form::find($form_id);
      }elseif($form_tipo){
        $form = Form::where('tipo','=',$form_tipo)->first();
      }

      if (isset($form->envio_email)) {
          $file = (isset($_FILES['arquivo']) ? $_FILES['arquivo'] : '');
          $checkTemplate = MailTemplate::where('code', '=', $form->tipo)->get();
          if (count($checkTemplate) > 0) {
              $templete = $checkTemplate->first()->code;
              $subject = $checkTemplate->first()->subject;
          } 
          elseif (!empty(post('subject')) || !empty(post('assunto'))) {
              $templete = 'default';
              $subject = (!empty(post('subject')) ? post('subject') : post('assunto'));
          }else {
              $templete = 'default';
              $subject = 'Site | ' . $form->titulo;
          }

          foreach (post() as $key => $value) {
              if ($key !== 'tipo' and $key !== 'form_id') {
                  $val = (is_array($value) ? implode(', ', $value) : $value);
                  $send->$key = $val;

                  $labelMail = Field::where('name', '=', $key)->get();
                  if (count($labelMail) > 0)
                      $key = $labelMail->first()->label;
                  
                  $vars[] = ['key' => $key, 'val' => $val];
              }
          }

          Mail::send($templete, ['vars' => $vars], function ($m) use ($vars, $form, $file, $subject) {
              $m->to($form->mailto)->subject($subject);
              if ($file !== '')
                  $m->attach($file);
          });
      }
    }
}
