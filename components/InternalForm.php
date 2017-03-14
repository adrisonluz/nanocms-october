<?php namespace AdrisonLuz\NanoCms\Components;

use Cms\Classes\ComponentBase;
use AdrisonLuz\NanoCms\Models\Form;
use AdrisonLuz\NanoCms\Models\Field;
use AdrisonLuz\NanoCms\Models\Pagina;

use File;
use Schema;
use Mail;
use System\Models\MailTemplate;

class InternalForm extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'Form',
            'description' => 'Formulário da página em questão.'
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
        // Página
        $slug = $this->param('slug');
        if($slug){
          $pagina = Pagina::with('galeria','forms.fields.pai')->where('slug','=',$slug)->first();
          $this->page['pagina'] = $pagina;

          $form = $pagina->forms->first();
          $this->page['form'] = $form;
        }

        // Debug
        if($this->property('debug') == 1){
            dd($form->toArray());
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
      }else{
      	$form = Form::where('origem','=',post('origem'))->first();
      }

      if ($form->envio_email !== '') {
          $file = (isset($_FILES['arquivo']) ? $_FILES['arquivo'] : '');
          $checkTemplate = MailTemplate::where('code', '=', $form->tipo)->get();
          if (count($checkTemplate) > 0) {
              $templete = $checkTemplate->first()->code;
              $subject = $checkTemplate->first()->subject;
          } else {
              $templete = 'default';
              $subject = 'Site | ' . $form->titulo;
          }

          foreach (post() as $key => $value) {
              if ($key !== 'form_tipo' and $key !== 'form_id' and $key !== 'origem') {
                  $val = (is_array($value) ? implode(', ', $value) : $value);

                  $labelMail = Field::where('nome', '=', $key)->get();
                  if (count($labelMail) > 0)
                      $key = $labelMail->first()->label;
                  
                  $vars[] = ['key' => $key, 'val' => $val];
              }
          }

          $checkTemplate = MailTemplate::where('code', '=', $form->type)->get();
          if (count($checkTemplate) > 0) {
              $templete = $checkTemplate->first()->code;
              $subject = $checkTemplate->first()->subject;
          } else {
              $templete = 'default';
              $subject = 'Site | ' . $form->label;
          }

          Mail::send($templete, ['vars' => $vars], function ($m) use ($vars, $form, $file, $subject) {
              $m->to($form->envio_email)->subject($subject);
              if ($file !== '')
                  $m->attach($file);
          });

          die('Enviado com sucesso para ' . $form->envio_email . '!');
      }
    }
}
