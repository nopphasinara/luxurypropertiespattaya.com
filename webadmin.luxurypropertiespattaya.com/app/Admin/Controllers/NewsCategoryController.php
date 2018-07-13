<?php

namespace App\Admin\Controllers;

use App\Models\NewsCategory;
use App\Admin\Controllers\BaseController;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Tree;

use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Request;

class NewsCategoryController extends BaseController
{
    use ModelForm;

    protected $model;
    protected $mixed;

    public function __construct()
    {
        $this->model = new NewsCategory;
    }

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('News Categories');
            // $content->description('description');

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

            $content->header('News Categories');
            // $content->description('description');

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

            $content->header('News Categories');
            // $content->description('description');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    // protected function grid()
    // {
    //     return Admin::grid(NewsCategory::class, function (Grid $grid) {
    //
    //         // $grid->paginate(20);
    //         $grid->model()->orderBy('id', 'desc');
    //
    //         $grid->id('ID')->sortable();
    //
    //         $grid->name('Name')->sortable();
    //
    //         $grid->column('web_visible', 'Visible')->switch(attribute('attribute_response', true));
    //
    //         $grid->created_at()->sortable();
    //
    //         $grid->disableExport();
    //         // $grid->perPages([10, 20, 30, 40, 50]);
    //
    //         $grid->actions(function ($actions) {
    //
    //         });
    //
    //         $grid->filter(function($filter){
    //           $filter->disableIdFilter();
    //
    //           $filter->where(function ($query) {
    //             $query->where('name', 'like', "%{$this->input}%");
    //           }, 'Name');
    //
    //           $filter->equal('web_visible', 'Visible')->checkbox(attribute('attribute_response'));
    //
    //           $filter->between('created_at', 'Created at')->datetime();
    //         });
    //     });
    // }
    protected function tree()
    {
        return NewsCategory::tree(function (Tree $tree) {
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
        return Admin::form(NewsCategory::class, function (Form $form) {

            parent::boot($form);

            // Displays the record id
            $form->hidden('id');

            $form->select('parent_id')->options(NewsCategory::selectOptions());
            
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
