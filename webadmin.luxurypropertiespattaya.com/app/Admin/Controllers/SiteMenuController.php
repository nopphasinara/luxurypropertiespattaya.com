<?php

namespace App\Admin\Controllers;

use App\Models\SiteMenu;
use App\Admin\Controllers\BaseController;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Tree;

use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Request;

class SiteMenuController extends BaseController
{
    use ModelForm;

    protected $model;
    protected $mixed;

    public function __construct()
    {
        $this->model = new SiteMenu;
    }

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('Site Menus');
            $content->body($this->tree());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('Site Menus');
            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('Site Menus');
            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function tree()
    {
        return SiteMenu::tree(function (Tree $tree) {
            $tree->branch(function ($branch) {
                $icon = ($branch['icon']) ? ' <i class="fa fa-fw '. $branch['icon'] .'">&nbsp;</i> ' : '';
                $branch_name = ($branch['icon_position'] === 'right') ? $branch['name'] . $icon : $icon . $branch['name'];
                return $branch['id'] . " - " . trim($branch_name);
            });
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(SiteMenu::class, function (Form $form) {

            parent::boot($form);

            // Displays the record id
            $form->hidden('id');

            $form->select('parent_id')->options(SiteMenu::selectOptions());
            
            // Add an input box of type text
            $form->text('name', 'Name')->rules('required');

            // Add an input box of type text
            $form->text('slug', 'Slug')->rules(function ($form) {
              // If it is not an edit state, add field unique verification
              $rule = 'nullable';
              // if (!$id = $form->model()->id) {
              //     return $rule . '|unique:site_menus,slug';
              // }
            });
            
            $form->text('url', 'URL')->rules('nullable');
            $form->icon('icon', 'Icon')->rules('nullable');
            $form->switch('icon_position', 'Icon Position')->rules('nullable')->default('left')->states([
              'on' => ['value' => 'left', 'text' => 'Left', 'color' => 'info'],
              'off' => ['value' => 'right', 'text' => 'Right', 'color' => 'info'],
            ]);

            $form->divide();

            // Add a switch field
            $form->switch('web_visible', 'Visible')->default(1);

            $form->tools(function (Form\Tools $tools) {
              // Disable back btn.
              $tools->disableBackButton();
              // Disable list btn
              // $tools->disableListButton();
            });

            // $form->ignore('column1', 'column2', 'column3');
            $form->setWidth(10, 2);
            $form->disableReset();

            // redirect back with an error message
            $form->saving(function ($form) {

            });

            // redirect back with an error message
            $form->saved(function ($form) {

            });
        });
    }
    
    public function updateOrder($tree = [], $parent_id = 0)
    {
      foreach ($tree as $index => $value) {
        $max = $this->model->max('order');
        if ($max > 10000) $max = 0;
        $order = $max + 1;
        
        $category = $this->model->find($value['id']);
        if ($category && $category->count()) {
          $category['parent_id'] = $parent_id;
          $category['order'] = $order;
          
          $category->save();
        }
        
        if (isset($value['children'])) {
          $this->updateOrder($value['children'], $value['id']);
        }
      }
    }
    
    public function bootUpdateOrder()
    {
      if (Request::has('_order')) {
        $tree = Request::get('_order');
        $tree = json_decode($tree, true);
        
        $this->updateOrder($tree);
      }
      
      return json_encode([
        'status' => true,
      ]);
    }
}
