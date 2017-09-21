<?php namespace AdrisonLuz\NanoCms\Components;

use Cms\Classes\ComponentBase;
use AdrisonLuz\NanoCms\Models\Form;
use AdrisonLuz\NanoCms\Models\Field;
use AdrisonLuz\NanoCms\Models\Pagina;
use AdrisonLuz\NanoCms\Models\Comentario;

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
          'formId' => [
             'title'             => 'Escolher formulário',
             'description'       => 'Permite escolher um formulário específico.',
             'type'              => 'dropdown',
             'default' => 0
          ],
          'debug' => [
               'title'             => 'Debug',
               'description'       => 'Permite debugar o componente.',
               'default'           => false,
               'type'              => 'checkbox',
          ],
        ];
    }

    public function getFormIdOptions()
    {
        $forms = Form::lists('titulo', 'id');
        $forms[0] = 'Nenhum';
        
        return $forms;
    }

    public function onRun()
    {
        $formId = $this->property('formId');
        $slug = $this->param('slug');

        if($formId){
          $form = Form::find($formId);
        }elseif($slug){
          $pagina = Pagina::with('forms')->where('slug','=',$slug)->first();
          $form = $pagina->forms->first();
        }else{
          $form = null;
        }

        $this->nome = $form->titulo;
        $this->page["{$this->alias}"] = $form;

        // Debug
        if($this->property('debug') == 1){
            echo '[Alias: ' . $this->alias . ']' . "\n";
            dd($this->page["{$this->alias}"]->toArray());
        }
    }

    // Enviar dados por email
    public function onSendForm(){
      $form_id = post('form_id');
      $form_tipo = post('form_tipo');
      $origem = post('origem');
      $post_id = post('post_id');
      $comentario_id = post('comentario_id');
      $msg = '';

      if(post('comentario_id')){
        $comentario_id = post('comentario_id');
      }

      if($form_id){
        $form = Form::find($form_id);
      }elseif($form_tipo){
        $form = Form::where('tipo','=',$form_tipo)->first();
      }else{
      	$form = Form::where('origem','=',$origem)->first();
      }

      $templete = 'default';
      $subject = 'Site | ' . $form->label;
      
      // Campos que serão desconsiderados
      $keyValid = [
        'form_tipo', 
        'form_id',
        'post_id', 
        'origem', 
        'comentario_id'
      ];

      $vars = [];
      $dados = [];
      foreach (post() as $key => $value) {
          if (!in_array($key, $keyValid)) {
              $val = (is_array($value) ? implode(', ', $value) : $value);

              $labelMail = Field::where('nome', '=', $key)->get();
              if (count($labelMail) > 0)
                  $key = $labelMail->first()->label;
              
              $vars[] = ['key' => $key, 'val' => $val];
              $dados[$key] = $val;
          }
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

          // Envia notificação para email cadastrado
          Mail::send($templete, ['vars' => $vars], function ($m) use ($vars, $form, $file, $subject) {
              $m->to($form->envio_email)->subject($subject);
              if ($file !== '')
                  $m->attach($file);
          });

          $msg .= 'Enviado com sucesso para ' . $form->envio_email . '!' . "\n";
      }

      switch ($form->tipo) {
        case 'comentarios':
          $comentario = new Comentario;
          $comentario->post_id = $post_id;
          $comentario->form_id = $form->id; 
          $comentario->comentario_id = $comentario_id;
          $comentario->ativo = 0;
          $comentario->dados = json_encode($dados);      

          $comentario->save();       
        case 'envios':
          
          break;
      }

      // Envia resposta automática para email
      if ($form->resposta !== '' and !empty(post('email'))) {
        $mailTo = post('email');
        $subject = 'Obrigado por sua participação';

        try {
          Mail::send(['html' => $form->resposta,'raw' => true],[], function ($m) use ($mailTo, $subject) {
              $m->to($mailTo)->subject($subject);
          });

          $msg .= 'Resposta automática enviada com sucesso para ' . $mailTo . '!' . "\n";
        } catch (Exception $e) {
            $msg .= 'Erro ao enviar resposta automática.' . "\n";
            $msg .= 'Erro: ' . $e->getMessage() . "\n";
        }        
      }

      die($msg);
    }
}
