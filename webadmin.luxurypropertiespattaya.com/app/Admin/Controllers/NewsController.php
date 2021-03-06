<?php

namespace App\Admin\Controllers;

use App\Models\NewsCategory as Category;
use App\Models\News;
use App\Admin\Controllers\BaseController;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use Encore\Admin\Controllers\ModelForm;

use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Request;

class NewsController extends BaseController
{
    use ModelForm;

    protected $model;
    protected $mixed;

    public function __construct()
    {
        $this->model = new News;
    }

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('News');
            // $content->description('description');

            $content->body($this->grid());
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

            $content->header('News');
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

            $content->header('News');
            // $content->description('description');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(News::class, function (Grid $grid) {

            // $grid->paginate(20);
            $grid->model()->orderBy('id', 'desc');

            $grid->id('ID')->sortable();

            $grid->image()->display(function ($value) {
                if (!$value) return asset('img/placeholder.png');
                return asset('uploads/' . $value);
            })->image('', 100, 100);

            $grid->name('Name')->sortable();

            $states = [
              'on'  => ['value' => 1, 'text' => 'YES'],
              'off' => ['value' => 0, 'text' => 'NO'],
            ];
            $grid->column('featured', 'Featured')->switch($states);
            $grid->column('web_visible', 'Visible')->switch($states);

            $grid->created_at()->sortable();

            $grid->disableExport();
            // $grid->perPages([10, 20, 30, 40, 50]);

            $grid->actions(function ($actions) {

            });

            $grid->filter(function($filter){
              $filter->disableIdFilter();

              $filter->where(function ($query) {
                $query->where('name', 'like', "%{$this->input}%")
                      ->orWhere('description', 'like', "%{$this->input}%");
              }, 'Name or Description');

              $filter->equal('category_id', 'Category')->multipleSelect(function () {
                $result = [];
                $data = Category::orderBy('order', 'asc')->get();
                foreach ($data as $key => $value) {
                  $result[$value->id] = $value->name;
                }

                return $result;
              });

              $filter->equal('featured', 'Featured')->checkbox(attribute('attribute_response'));
              $filter->equal('web_visible', 'Visible')->checkbox(attribute('attribute_response'));

              $filter->between('created_at', 'Created at')->datetime();
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
        return Admin::form(News::class, function (Form $form) {

            parent::boot($form);

            // Displays the record id
            $form->hidden('id');

            // Add an input box of type text
            $form->text('name', 'Name')->rules('required');

            // Add an input box of type text
            $form->text('slug', 'Slug')->rules(function ($form) {
              // If it is not an edit state, add field unique verification
              $rule = 'nullable';
              if (!$id = $form->model()->id) {
                  return $rule . '|unique:news,slug';
              }
            });

            // Add textarea for the describe field
            $form->textarea('description', 'Description')->rows(6);
            $form->ckeditor('content', 'Content');

            $form->divide();

            $form->select('category_id', 'Category')->options(function ($id) {
              $result = [];
              $data = Category::get();
              foreach ($data as $key => $value) {
                $result[$value->id] = $value->name;
              }

              return $result;
            });

            // $form->select('news_category_id', 'Category')->options(function () {
            //   $result = [];
            //   $data = NewsCategory::all();
            //   foreach ($data as $key => $value) {
            //     $result[$value->id] = $value->name;
            //   }
            //   return $result;
            // });

            $form->divide();

            // Add textarea for the describe field
            $form->image('image', 'Main Image')->move('news')->uniqueName()->removable();

            $form->divide();

            // Add a switch field
            $form->switch('featured', 'Featured')->default(0);
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
}
