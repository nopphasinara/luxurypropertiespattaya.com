<?php

namespace App\Admin\Controllers;

use App\Models\SiteSetting;
use App\Admin\Controllers\BaseController;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use Encore\Admin\Controllers\ModelForm;

use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Request;

class SiteSettingController extends BaseController
{
    use ModelForm;

    protected $model;
    protected $mixed;

    public function __construct()
    {
        $this->model = new SiteSetting;
    }

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('Site Settings');
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

            $content->header('Site Settings');
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

            $content->header('Site Settings');
            // $content->description('description');

            $content->body($this->form());
        });
    }
    
    /**
     * Create interface.
     *
     * @return Content
     */
    public function show()
    {
        return Admin::content(function (Content $content) {

            $content->header('Site Settings');
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
        return Admin::grid(SiteSetting::class, function (Grid $grid) {

            // $grid->paginate(20);
            $grid->model()->orderBy('id', 'desc');

            $grid->id('ID')->sortable();

            $grid->column('name', 'Name')->sortable();
            $grid->column('description', 'Description');
            // $grid->column('email', 'Email')->sortable();
            // $grid->column('message', 'Message')->limit(80);

            // $grid->column('featured', 'Featured')->switch(attribute('attribute_response', true));
            // $grid->column('web_visible', 'Visible')->switch(attribute('attribute_response', true));

            $grid->created_at()->sortable();

            $grid->disableExport();
            // $grid->perPages([10, 20, 30, 40, 50]);

            $grid->actions(function ($actions) {

            });

            $grid->filter(function($filter){
              $filter->disableIdFilter();

              $filter->where(function ($query) {
                $query->where('name', 'like', "%{$this->input}%");
              }, 'Name');

              // $filter->equal('web_visible', 'Visible')->checkbox(attribute('attribute_response'));

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
        return Admin::form(SiteSetting::class, function (Form $form) {

            $this->siteSettings = SiteSetting::get();
            $configs = [];
            foreach ($this->siteSettings as $index => $setting) {
              $configs[snake_case($setting->name)] = $setting;
            }
            
            $this->model = $configs;
            
            parent::boot($form);

            // attribute_response
            $form->tags('attribute_response')->value(json_decode($configs['attribute_response']->value, true));
            // phone_number
            $form->custom('phone_number')->setVariables([
              'columnSize' => '3',
              'type' => 'tel',
            ])->value($configs['phone_number']->value);
            // primary_email
            $form->custom('primary_email')->setVariables([
              'columnSize' => '3',
              'type' => 'email',
            ])->value($configs['primary_email']->value);
            // open_hours
            $form->custom('open_hours')->setVariables([
              'columnSize' => '3',
              'type' => 'text',
            ])->value($configs['open_hours']->value);
            // office_address
            $form->custom('office_address')->setVariables([
              'columnSize' => '3',
              'type' => 'text',
            ])->value($configs['office_address']->value);
            // office_location
            $form->custom('office_location')->setVariables([
              'columnSize' => '3',
              'type' => 'text',
            ])->value($configs['office_location']->value);
            // site_name
            // tagline
            // meta_title
            // meta_description
            // meta_keywords
            // facebook
            // twitter
            // line
            // instagram
            // youtube
            // linkedin
            // attribute_ownership
            // homepage_form_bg
            // homepage_fixed_bg
            // homepage_services_bg
            // homepage_search_tags
            // address
            // logo

            // Add an input box of type text
            // $form->text('slug', 'Slug')->rules(function ($form) {
            //   // If it is not an edit state, add field unique verification
            //   $rule = 'nullable';
            //   if (!$id = $form->model()->id) {
            //       return $rule . '|unique:directories,slug';
            //   }
            // });

            $form->divide();

            // Add a switch field
            // $form->switch('featured', 'Featured')->default(0);
            // $form->switch('web_visible', 'Visible')->default(1);

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
