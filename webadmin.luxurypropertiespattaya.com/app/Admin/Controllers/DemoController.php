<?php

// namespace App\Admin\Controllers;
//
// use App\Models\Demo;
// use App\Admin\Controllers\BaseController;
//
// use Encore\Admin\Form;
// use Encore\Admin\Grid;
// use Encore\Admin\Facades\Admin;
// use Encore\Admin\Layout\Content;
// use App\Http\Controllers\Controller;
// use Encore\Admin\Controllers\ModelForm;
//
// use Illuminate\Support\MessageBag;
//
// class DemoController extends BaseController
// {
//     use ModelForm;
//
//     protected $model;
//     protected $mixed;
//
//     public function __construct()
//     {
//         $this->model = new Demo;
//     }
//
//     /**
//      * Index interface.
//      *
//      * @return Content
//      */
//     public function index()
//     {
//         return Admin::content(function (Content $content) {
//
//             $content->header('Demo');
//             // $content->description('description');
//
//             $content->body($this->grid());
//         });
//     }
//
//     /**
//      * Edit interface.
//      *
//      * @param $id
//      * @return Content
//      */
//     public function edit($id)
//     {
//         return Admin::content(function (Content $content) use ($id) {
//
//             $content->header('Demo');
//             // $content->description('description');
//
//             $content->body($this->form()->edit($id));
//         });
//     }
//
//     /**
//      * Create interface.
//      *
//      * @return Content
//      */
//     public function create()
//     {
//         return Admin::content(function (Content $content) {
//
//             $content->header('Demo');
//             // $content->description('description');
//
//             $content->body($this->form());
//         });
//     }
//
//     /**
//      * Make a grid builder.
//      *
//      * @return Grid
//      */
//     protected function grid()
//     {
//         return Admin::grid(Demo::class, function (Grid $grid) {
//
//             $grid->paginate(20);
//             $grid->model()->orderBy('id', 'desc');
//             // $grid->model()->take(100);
//
//             $grid->id('ID')->sortable();
//
//             $grid->image()->display(function ($value) {
//                 if (!$value) return asset('img/placeholder.png');
//                 return asset('uploads/' . $value);
//             })->image('', 100, 100);
//
//             $grid->name('Name')->sortable();
//
//             // $grid->column('name')->display(function ($name) {
//             //     return "<span style='color:blue'>$name</span>";
//             // });
//
//             // $grid->column('full_name')->display(function () {
//             //     return $this->name . ' ' . $this->name;
//             // });
//
//             // The sixth column shows the released field, formatting the display output through the display($callback) method
//             // $grid->featured('Featured')->display(function ($value) {
//             //     return ($value == 1) ? 'YES' : 'NO';
//             // });
//
//             // $grid->web_visible('Visible')->display(function ($value) {
//             //     return ($value == 1) ? 'YES' : 'NO';
//             // });
//
//             // $grid->featured()->editable('select', [1 => 'YES', 0 => 'NO']);
//
//             $states = [
//               'on'  => ['value' => 1, 'text' => 'YES'],
//               'off' => ['value' => 0, 'text' => 'NO'],
//             ];
//             $grid->column('featured', 'Featured')->switch($states);
//             $grid->column('web_visible', 'Visible')->switch($states);
//
//             // chain method calls to display multiple images
//             // $grid->images()->display(function ($images) {
//             //     return json_decode($images, true);
//             // })->map(function ($path) {
//             //     return 'http://localhost/images/'. $path;
//             // })->image();
//
//             // $grid->column('featured')->switchGroup([
//             //   'featured'       => 'Featured',
//             //   'web_visible'       => 'Visible'
//             // ], $states);
//
//             // $grid->featured()->select([
//             //   1 => 'Sed ut perspiciatis unde omni',
//             //   0 => 'voluptatem accusantium doloremque'
//             // ]);
//
//             // $grid->featured()->radio([
//             //   1 => 'Sed ut perspiciatis unde omni',
//             //   0 => 'voluptatem accusantium doloremque'
//             // ]);
//
//             // $grid->featured()->checkbox([
//             //   1 => 'Sed ut perspiciatis unde omni',
//             //   0 => 'voluptatem accusantium doloremque'
//             // ]);
//
//             //Set host, width and height
//
//             // $grid->column('name', 'Name')->limit(30)->ucfirst()->substr(1, 10);
//
//             // $grid->name()->label('danger');
//             // $grid->keywords()->label();
//
//             // display multiple images
//             // $grid->images()->display(function ($images) {
//             //     return json_decode($images, true);
//             // })->image('', 100, 100);
//
//             // $grid->comments('Comments count')->display(function ($comments) {
//             //     $count = count($comments);
//             //     return "<span class='label label-warning'>{$count}</span>";
//             // });
//
//             // $grid->roles()->display(function ($roles) {
//             //     $roles = [['name' => 1], ['name' =>  2], ['name' =>  3], ['name' =>  4], ['name' =>  5], ['name' =>  6], ['name' =>  7], ['name' =>  8], ['name' =>  9]];
//             //     $roles = array_map(function ($role) {
//             //         return "<span class='label label-success'>{$role['name']}</span>";
//             //     }, $roles);
//             //
//             //     return join('&nbsp;', $roles);
//             // });
//
//             $grid->created_at()->sortable();
//
//             // $grid->disableCreateButton();
//             // $grid->disablePagination();
//             // $grid->disableFilter();
//             $grid->disableExport();
//             // $grid->disableRowSelector();
//             // $grid->disableActions();
//             // $grid->orderable('featured');
//             $grid->perPages([10, 20, 30, 40, 50]);
//
//             $grid->actions(function ($actions) {
//                 // $actions->disableDelete();
//                 // $actions->disableEdit();
//
//                 // the array of data for the current row
//                 $actions->row;
//                 // gets the current row primary key value
//                 $actions->getKey();
//                 // append an action.
//                 // $actions->append('<a href=""><i class="fa fa-eye"></i></a>');
//                 // prepend an action.
//                 // $actions->prepend('<a href=""><i class="fa fa-paper-plane"></i></a>');
//             });
//
//             $grid->filter(function($filter){
//               // Remove the default id filter
//               $filter->disableIdFilter();
//               // Add a column filter
//               // $filter->like('name', 'Name');
//               $filter->where(function ($query) {
//                 $query->where('name', 'like', "%{$this->input}%")
//                       ->orWhere('description', 'like', "%{$this->input}%");
//               }, 'Name or Description');
//               // $filter->where(function ($query) {
//               //     $query->whereHas('profile', function ($query) {
//               //         $query->where('address', 'like', "%{$this->input}%")->orWhere('email', 'like', "%{$this->input}%");
//               //     });
//               // }, 'Address or mobile');
//               // $filter->equal('url')->url();
//               // $filter->equal('email')->email();
//               // $filter->equal('integer')->integer();
//               // $filter->equal('ip')->ip();
//               // $filter->equal('mac')->mac();
//               // $filter->equal('mobile')->mobile();
//
//               // $states = [
//               //   'on'  => ['value' => 1, 'text' => 'YES'],
//               //   'off' => ['value' => 0, 'text' => 'NO'],
//               // ];
//               // $options refer to https://github.com/RobinHerbots/Inputmask/blob/4.x/README_numeric.md
//               // $filter->equal('decimal')->decimal($options = $states);
//               // $options refer to https://github.com/RobinHerbots/Inputmask/blob/4.x/README_numeric.md
//               // $filter->equal('currency')->currency($options = $states);
//               // $options refer to https://github.com/RobinHerbots/Inputmask/blob/4.x/README_numeric.md
//               // $filter->equal('percentage')->percentage($options = $states);
//               // $options refer to https://github.com/RobinHerbots/Inputmask
//               // $filter->equal('inputmask')->inputmask($options = $states, $icon = 'pencil');
//               $filter->equal('featured', 'Featured')->radio([
//                 ''   => 'All',
//                 1    => 'YES',
//                 0    => 'NO',
//               ]);
//               $filter->equal('web_visible', 'Visible')->radio([
//                 ''   => 'All',
//                 1    => 'YES',
//                 0    => 'NO',
//               ]);
//               // $filter->in('gender')->checkbox([
//               //   'm'    => 'Male',
//               //   'f'    => 'Female',
//               // ]);
//
//               // $filter->in('featured', 'Featured')->multipleSelect(['1' => 'YES', '0' => 'NO']);
//               $filter->between('created_at', 'Created at')->datetime();
//             });
//         });
//     }
//
//     /**
//      * Make a form builder.
//      *
//      * @return Form
//      */
//     protected function form()
//     {
//         return Admin::form(Demo::class, function (Form $form) {
//
//             parent::boot($form);
//
//             // Displays the record id
//             $form->hidden('id');
//
//             // Add an input box of type text
//             $form->text('name', 'Name')->rules('required');
//
//             // Add an input box of type text
//             $form->text('slug', 'Slug')->rules(function ($form) {
//               // If it is not an edit state, add field unique verification
//               $rule = 'nullable';
//               if (!$id = $form->model()->id) {
//                   return $rule . '|unique:demo,slug';
//               }
//             });
//
//             // Add textarea for the describe field
//             $form->textarea('description', 'Description')->rows(6);
//
//             $form->divide();
//
//             // Add textarea for the describe field
//             // $form->image('image', 'Image')->move('demo')->uniqueName()->removable();
//                  // ->name(function ($file) {
//                  //    return 'test.'.$file->guessExtension();
//                  // });
//
//             // $form->select('user_id')->options(function ($id) {
//             //     $user = User::find($id);
//             //
//             //     if ($user) {
//             //         return [$user->id => $user->name];
//             //     }
//             // })->ajax('/admin/api/users');
//
//             // $form->hidden('hidden');
//
//             // $form->embeds('extra', function ($form) {
//             //     $form->text('extra1')->rules('required');
//             //     $form->email('extra2')->rules('required');
//             //     $form->mobile('extra3');
//             //     $form->datetime('extra4');
//             //     $form->dateRange('extra5', 'extra6', 'Date range')->rules('required');
//             // });
//
//             // $form->divide();
//             // $form->html('html contents');
//             // $form->tags('keywords', 'Keywords');
//
//             // $form->listbox('list', 'List')->options([1 => 'foo',2 => 'bar','val' => 'Option name']);
//
//             // $form->radio('radio', 'Radio')->options(['m' => 'Female','f'=> 'Male',])->default('m')->stacked();
//             // $form->checkbox('checkbox', 'Checkbox')->options([1 => 'foo', 2 => 'bar', 'val' => 'Option name'])->stacked();
//
//             // $directors = ['John' => 1,'Smith' => 2,'Kate'  => 3];
//             // $form->select('director', 'Director')->options($directors);
//
//             // $form->email('email', 'Email');
//             // $form->password('password', 'Password');
//             // $form->url('url', 'URL');
//
//             // Number input
//             // $form->number('rate', 'Rate');
//
//             $form->divide();
//
//             // Add a switch field
//             $form->switch('featured', 'Featured')->default(0);
//             $form->switch('web_visible', 'Visible')->default(1);
//
//             // Display two time column
//             // $form->display('created_at', 'Created time');
//             // $form->display('updated_at', 'Updated time');
//
//
//             $form->tools(function (Form\Tools $tools) {
//               // Disable back btn.
//               $tools->disableBackButton();
//               // Disable list btn
//               $tools->disableListButton();
//               // Add a button, the argument can be a string, or an instance of the object that implements the Renderable or Htmlable interface
//               // $tools->add('<a class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>&nbsp;&nbsp;delete</a>');
//             });
//
//             // $form->ignore('column1', 'column2', 'column3');
//             $form->setWidth(10, 2);
//             $form->disableReset();
//
//
//             // $exists = Demo::where('slug', $form->mixed['data']->slug)->get();
//             // echo '<pre>'; print_r($exists); echo '</pre>';
//             // echo '<pre>'; print_r($form->mixed['data']->slug); echo '</pre>';
//
//             // redirect back with an error message
//             $form->saving(function ($form) {
//                 // $error = new MessageBag([
//                 //     'title'   => 'title...',
//                 //     'message' => 'message....',
//                 // ]);
//                 // return back()->with(compact('error'));
//             });
//
//             // redirect back with an error message
//             $form->saved(function ($form) {
//                 // $error = new MessageBag([
//                 //     'title'   => 'title...',
//                 //     'message' => 'message....',
//                 // ]);
//                 // return back()->with(compact('error'));
//             });
//         });
//     }
// }
