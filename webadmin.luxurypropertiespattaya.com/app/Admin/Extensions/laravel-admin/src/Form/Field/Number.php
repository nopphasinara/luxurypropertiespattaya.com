<?php

namespace Encore\Admin\Form\Field;

class Number extends Text
{
    protected static $js = [
        '/vendor/laravel-admin/number-input/bootstrap-number-input.js',
    ];

    public function render()
    {
        $this->default((int) $this->default);

        $this->script = <<<EOT

$('{$this->getElementClassSelector()}:not(.initialized)')
    .addClass('initialized')
    .attr('type', 'number')
    .bootstrapNumber({
        upClass: 'success',
        downClass: 'primary',
        center: true
    });

EOT;

        // $this->prepend('')->defaultAttribute('style', 'width: 100px');

        return parent::render();
    }

    /**
     * Set min value of number field.
     *
     * @param int $value
     *
     * @return $this
     */
    public function min($value)
    {
        $this->attribute('min', $value);

        return $this;
    }

    /**
     * Set max value of number field.
     *
     * @param int $value
     *
     * @return $this
     */
    public function max($value)
    {
        $this->attribute('max', $value);

        return $this;
    }
    
    public function setVariables($vars = [])
    {
      $vars = array_merge([
        'type' => 'number',
        'class' => 'form-control',
        'columnSize' => 6,
        'holdertext' => '',
      ], $vars);
      $this->variables = array_merge($this->variables, $vars);
      
      return $this;
    }
}
