<?php

namespace App\Admin\Extensions\Form;

use Encore\Admin\Form\Field;

class CustomInput extends Field
{
    
    protected $view = 'admin.custom-input';
    protected static $css = [];
    protected static $js = [];

    public function render()
    {
        $this->script = <<<EOT
EOT;
        
        return parent::render();

    }
    
    public function setVariables($vars = [])
    {
      $vars = array_merge([
        'type' => 'text',
        'class' => 'form-control',
        'columnSize' => 4,
        'holdertext' => '',
      ], $vars);
      $this->variables = array_merge($this->variables, $vars);
      
      return $this;
    }
}
