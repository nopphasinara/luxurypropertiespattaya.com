<?php

namespace App\Admin\Controllers;

use App\Admin\Controllers\BaseController;
use App\Models\Category;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Tree;

use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Request;

class CategoryController extends BaseController
{
    use ModelForm;
    
    protected $model;
    protected $mixed;
    
    public function __construct()
    {
        $this->model = new Category;
    }

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {
            $content->header('All categories');
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
            $content->header('Edit category');
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
            $content->header('Create new category');
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
        return Category::tree(function (Tree $tree) {
            $tree->branch(function ($branch) {
                return "{$branch['id']} - {$branch['name']}";
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
        return Category::form(function (Form $form) {

            parent::boot($form);
            
            // Displays the record id
            $form->hidden('id');
            
            $form->select('parent_id')->options(Category::selectOptions());
            
            // Add an input box of type text
            $form->text('name', 'Name')->rules('required');
            
            // Add an input box of type text
            $form->text('slug', 'Slug')->rules(function ($form) {
              // If it is not an edit state, add field unique verification
              $rule = 'nullable';
              if (!$id = $form->model()->id) {
                  return $rule . '|unique:news_categories,slug';
              }
            });
            
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
