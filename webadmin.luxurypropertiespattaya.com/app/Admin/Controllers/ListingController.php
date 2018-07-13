<?php

namespace App\Admin\Controllers;

use App\Models\Listing;
use App\Models\ListingLocation;
use App\Models\ListingFeature;
use App\Models\ListingFacilities;
use App\Models\ListingType as Category;
use App\Admin\Controllers\BaseController;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use Encore\Admin\Controllers\ModelForm;

use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use Imagecow\Image;

class ListingController extends BaseController
{
    use ModelForm;

    protected $model;
    protected $mixed;

    public function __construct()
    {
        $this->model = new Listing;
    }

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('Listings');
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

            $content->header('Listings');
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

            $content->header('Listings');
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
        return Admin::grid(Listing::class, function (Grid $grid) {

            // $grid->paginate(20);
            $grid->model()->orderBy('id', 'desc');

            $grid->id('ID')->sortable();

            $grid->image()->display(function ($value) {
                if (!$value) return asset('img/placeholder.png');
                // return asset('uploads/_thumbs/Images/' . $value);
                return asset('uploads/' . $value);
            })->image('', 100, 100);

            $grid->name('Name')->sortable();
            $grid->column('listing_type_id', 'Listing Type')->display(function ($id) {
              $data = Category::where('id', $id)->get();
              if ($data->count()) {
                return $data[0]->name;
              }
            });
            
            $grid->column('location_id', 'Location')->display(function ($id) {
              $data = ListingLocation::where('id', $id)->get();
              if ($data->count()) {
                return $data[0]->name;
              }
            });

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
                      ->orWhere('refno', 'like', "%{$this->input}%")
                      ->orWhere('description', 'like', "%{$this->input}%");
              }, 'Name, Description or Ref No.');

              $filter->equal('featured', 'Featured')->radio([
                ''   => 'All',
                1    => 'YES',
                0    => 'NO',
              ]);
              $filter->equal('web_visible', 'Visible')->radio([
                ''   => 'All',
                1    => 'YES',
                0    => 'NO',
              ]);

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
        return Admin::form(Listing::class, function (Form $form) {

            parent::boot($form);

            // Displays the record id
            $form->hidden('id');
            
            $form->tab('General Info', function ($form) {
              // Add an input box of type text
              $form->text('name', 'Name')->rules('required');

              // Add an input box of type text
              $form->text('slug', 'Slug')->rules(function ($form) {
                // If it is not an edit state, add field unique verification
                $rule = 'nullable';
                if (!$id = $form->model()->id) {
                    return $rule . '|unique:listings,slug';
                }
              });
              
              $form->text('refno', 'Ref No.')->rules(function ($form) {
                // If it is not an edit state, add field unique verification
                $rule = 'nullable';
                if (!$id = $form->model()->id) {
                    return $rule . '|unique:listings,refno';
                }
              });

              // Add textarea for the describe field
              // $form->editor('content', 'Content')->rules('required');
              $form->ckeditor('content', 'Content')->rules('required');

              $form->divide();

              $form->select('listing_type_id', 'Listing Type')->options(function () {
                $result = [];
                $data = Category::get();
                foreach ($data as $key => $value) {
                  $result[$value->id] = $value->name;
                }
                return $result;
              })->rules('required');

              $form->select('location_id', 'Location')->options(function () {
                $result = [];
                $data = ListingLocation::get();
                foreach ($data as $key => $value) {
                  $result[$value->id] = $value->name;
                }
                return $result;
              })->rules('required');
              
              $form->switch('for_sale', 'For Sale')->default(1);
              $form->currency('sale_price', 'Sale Price')->symbol('THB');
              $form->switch('for_rent', 'For Rent')->default(1);
              $form->currency('rent_price', 'Rent Price')->symbol('THB');
              
              $form->custom('land_area', 'Land Area')->setVariables([
                'columnSize' => 2,
                'type' => 'text',
              ]);
              $form->custom('living_area', 'Living Area')->setVariables([
                'columnSize' => 2,
                'type' => 'text',
              ]);
              
              $form->custom('bedrooms', 'Bedrooms')->setVariables([
                'columnSize' => 2,
                'type' => 'number',
              ])->default(0)->attribute([
                'min' => 0,
                'max' => 99,
              ]);
              
              $form->custom('bathrooms', 'Bathrooms')->setVariables([
                'columnSize' => 2,
                'type' => 'number',
                ])->default(0)->attribute([
                  'min' => 0,
                  'max' => 99,
              ]);
              
              // $form->number('bedrooms', 'Bedrooms')->default(0);
              // $form->number('bathrooms', 'Bathrooms')->default(0);
              
              $form->select('ownership', 'Ownership')->options(attribute('attribute_ownership', false));
              
              $form->divide();
              
              $form->listbox('features', 'Features')->options(function () {
                $result = [];
                $data = ListingFeature::get();
                if ($data->count()) {
                  foreach ($data as $key => $value) {
                    $result[$value->id] = $value->name;
                  }
                }
                
                return $result;
              });
              
              $form->listbox('facilities', 'Facilities')->options(function () {
                $result = [];
                $data = ListingFacilities::get();
                if ($data->count()) {
                  foreach ($data as $key => $value) {
                    $result[$value->id] = $value->name;
                  }
                }
                
                return $result;
              });
              
              // $form->tags('facilities', 'Facilities');
              
              $form->divide();

              $form->text('video', 'Youtube URL')->attribute([
                'type' => 'text',
              ]);
              $form->image('image', 'Main Image')->move('listings')->uniqueName()->removable();
              $form->multipleImage('gallery', 'Gallery')->move('listings')->uniqueName()->removable();
              
              $form->divide();
              
              $form->googlemaps('lat', 'lng', 'Location Map');

              $form->divide();

              // Add a switch field
              $form->switch('featured', 'Featured')->default(0);
              $form->switch('web_visible', 'Visible')->default(1);
            })->tab('Meta Tags', function ($form) {
              $form->textarea('description', 'Description')->rows(6);
              $form->textarea('keywords', 'Keywords')->rows(6);
            });

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
              // $files = [];
              // $data = Listing::find($this->mixed['id']);
              // if (isset($data->image)) $files[] = $data->image;
              // if ($data && $data->count()) {
              //   if ($data->gallery) $files = array_merge($files, $data->gallery);
              // }
              // if ($files) {
              //   foreach ($files as $key => $file_path) {
              //     $image = crop_image($file_path, '', 'uploads');
              //   }
              // }
            });
            
            // redirect back with an error message
            $form->saved(function ($form) {
              
            });
        });
    }
}
