<?php

namespace App\Admin\Extensions\Form;

use Encore\Admin\Form\Field;

class CKEditor extends Field
{
    public static $js = [
        // '/packages/ckeditor/ckeditor.js',
        // '/packages/ckeditor/ckeditor.js',
        // '/packages/ckeditor/adapters/jquery.js',
    ];

    protected $view = 'admin.ckeditor';

    public function render()
    {
        // $this->script = "$('textarea.{$this->getElementClassString()}').ckeditor().replace('textarea.{$this->getElementClassString()}', {
        //   customConfig : '". asset('packages/ckeditor/standard-config.js') ."',
        //   filebrowserBrowseUrl : '". asset('packages/ckfinder/ckfinder.html') ."',
        //   filebrowserImageBrowseUrl : '". asset('packages/ckfinder/ckfinder.html?type=Images') ."',
        //   // filebrowserFlashBrowseUrl : '". asset('packages/ckfinder/ckfinder.html?type=Flash') ."',
        //   filebrowserUploadUrl : '". asset('packages/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') ."',
        //   filebrowserImageUploadUrl : '". asset('packages/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') ."',
        //   // filebrowserFlashUploadUrl : '". asset('packages/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') ."',
        //   width: '540px',
        //   height: '220px',
        // });";
        // $this->script = "$('textarea.{$this->getElementClassString()}').ckeditor();";

        return parent::render();
    }
}
